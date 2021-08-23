<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel', 'authModel');
    }

    public function register()
    {
        // print_r($this->input->post());
        // die;
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', array('is_unique' => 'The %s is exists.'));
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Password 2', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]', array('is_unique' => 'The %s is exists.'));

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/head');
            $this->load->view('layout/nav');
            $this->load->view('register');
            $this->load->view('layout/foot');
            return;
        }

        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $filename = $username . '-' . $_FILES['photo']['name'];

        $data = [
            'username' => $this->input->post('username'),
            'name' => $this->input->post('name'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'email' => $email,
            'photo' => $filename
        ];

        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => true,
            'file_name' => $filename,
            'max_size' => "2048000",
            'max_height' => "768",
            'max_width' => "1024",
        );

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            $insert = $this->authModel->insert($data);
            if ($insert) {
                $this->session->set_flashdata('success', 'Register success. Check your email address to confirm.');
                $token = random_string('alnum', 50);

                $data = [
                    'token' => $token,
                    'user_email' => $email,
                ];

                $insert_token = $this->authModel->insert_token($data);

                if ($insert_token > 0) {
                    $message = "
                        Please click this link <a href=" . base_url('confirm/' . $insert_token . '/' . $token) . ">CONFIRM</a>
                    ";
                    $this->sendMail($email, 'Confirmation Email', $message);
                }

                return redirect('', 'refresh');
            } else {
                $this->session->set_flashdata('failed', 'Register failed');
                return redirect('register', 'refresh');
            }
        } else {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/head');
            $this->load->view('layout/nav');
            $this->load->view('login');
            $this->load->view('layout/foot');
            return;
        }

        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        ];

        $user = $this->authModel->getUser($data['username']);

        if (!$user) {
            $this->session->set_flashdata('failed', 'Username is not exist.');
            return redirect('', 'refresh');
        }

        $valid = password_verify($data['password'], $user->password);
        if (!$valid) {
            $this->session->set_flashdata('failed', 'Username or password is wrong.');
            return redirect('', 'refresh');
        }

        if ($user->status != 1) {
            $this->session->set_flashdata('failed', 'Please confirm your email first.');
            return redirect('', 'refresh');
        }

        $this->session->set_userdata('username', $user->username);
        $this->session->set_userdata('user_id', $user->id);
        return redirect('/landing', 'refresh');
    }

    public function landing()
    {
        // $this->initialPokemonData();
        // print_r($this->session->has_userdata('username'));die;
        // Check user session
        if ($this->session->has_userdata('username') == FALSE) {
            $this->session->set_flashdata('failed', 'Login first.');
            return redirect('', 'refresh');
        }

        $user = $this->authModel->getUser($this->session->userdata('username'));
        // print_r($user);die;

        $this->load->view('layout/head');
        $this->load->view('layout/nav');
        $this->load->view('landing', $user);
        $this->load->view('layout/foot');
    }

    public function initialPokemonData()
    {
        for ($i = 1; $i < 50; $i++) {

            // Get cURL resource
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => "https://pokeapi.co/api/v2/pokemon/$i/",
            ));
            $result = curl_exec($curl);
            // Close request to clear up some resources
            curl_close($curl);

            $result = json_decode($result);

            $pokemon_data = [
                'name' => $result->name,
                'height' => $result->height,
                'hp' => $result->stats[0]->base_stat,
                'attack' => $result->stats[1]->base_stat,
                'defense' => $result->stats[2]->base_stat,
                'type' => $result->types[0]->type->name,
                'picture' => $result->sprites->front_default,
            ];

            $add_pokemon = $this->authModel->addPokemon($pokemon_data);
            if ($add_pokemon) {
                echo "added";
            }
            // echo "<pre>";
            // print_r($pokemon_data);
            // echo "</pre>";
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        return redirect('', 'refresh');
    }

    public function sendMail($to, $subject, $message)
    {
        $this->load->config('email');
        $this->load->library('email');

        $from = $this->config->item('smtp_user');

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            // echo 'Your Email has successfully been sent.';
            return true;
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function confirm($id, $tokens)
    {
        $token = $this->authModel->getToken($id);

        if (!$token) {
            return redirect('', 'refresh');
        }

        if ($token->token !== $tokens || $token->status == 1) {
            $this->session->set_flashdata('failed', 'Error.');
            return redirect('', 'refresh');
        }

        $update = $this->authModel->updateToken($id, $token->user_email);

        if ($update) {
            $this->session->set_flashdata('success', 'Confirmation success. Please Login');
            return redirect('', 'refresh');
        }

        $this->session->set_flashdata('failed', 'Failed.');
        return redirect('', 'refresh');
    }

    public function reset()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/head');
            $this->load->view('layout/nav');
            $this->load->view('reset');
            $this->load->view('layout/foot');
            return;
        }

        $email = $this->input->post('email');
        $user = $this->authModel->getUserbyEmail($email);

        if ($user == FALSE) {
            $this->session->set_flashdata('failed', 'Email is not exist.');
            return redirect('reset', 'refresh');
        }

        $token = random_string('alnum', 10);
        $data = array(
            'user_email' => $email,
            'token' => $token,
            'type'  => 1
        );

        $insert_token = $this->authModel->insert_token($data);

        if ($insert_token > 0) {
            $message = "
                Please click <a href=" . base_url('new/') . $insert_token . '/' . $token . "> to reset your password.</a>
            ";

            $this->sendMail($email, 'Password Reset', $message);
            $this->session->set_flashdata('success', 'Please check your email.');
            return redirect('', 'refresh');
        }

        $this->session->set_flashdata('failed', 'Failed.');
        return redirect('reset', 'refresh');
    }

    public function new_password($id, $tokens)
    {
        $this->form_validation->set_rules('password', 'Passowrd', 'required');
        $this->form_validation->set_rules('password2', 'Password 2', 'required|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/head');
            $this->load->view('layout/nav');
            $this->load->view('new_password');
            $this->load->view('layout/foot');
            return;
        }

        $token = $this->authModel->getToken($id);

        if (!$token) {
            return redirect('', 'refresh');
        }

        if ($token->token !== $tokens || $token->status == 1 || $token->type == 0) {
            $this->session->set_flashdata('failed', 'Error.');
            return redirect('', 'refresh');
        }

        $password = $this->input->post('password');
        $user = $this->authModel->getUserbyEmail($token->user_email);

        $data = [
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $updatePassword = $this->authModel->updatePassword($id, $token->user_email, $data);

        if ($updatePassword) {
            $this->sendMail($token->user_email, 'Password Changed', 'Your Password Successfuly changed');
            $this->session->set_flashdata('success', 'Password changed.');
            return redirect('', 'refresh');
        }

        $this->session->set_flashdata('failed', 'Process failed.');
        return redirect('', 'refresh');
    }
}
