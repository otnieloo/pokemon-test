<?php
class AuthModel extends CI_Model
{
    public function insert($data)
    {
        $insert = $this->db->insert('user', $data);
        if ($insert) {
            return true;
        }
        return false;
        // $this->db->last_query();
    }

    public function insert_token($data)
    {
        $insert = $this->db->insert('token', $data);
        if ($insert) {
            return $this->db->insert_id();
        }
        return false;
        // $this->db->last_query();
    }

    public function getUser($username)
    {
        $user = $this->db->get_where('user', array('username' => $username))->result();
        if ($user) {
            return $user[0];
        }
        return false;
    }

    public function getUserbyEmail($email)
    {
        $user = $this->db->get_where('user', array('email' => $email))->result();
        if ($user) {
            return $user[0];
        }
        return false;
    }

    public function getToken($id)
    {
        $token = $this->db->get_where('token', array('id' => $id))->result();
        if ($token) {
            return $token[0];
        }
        return false;
    }

    public function updateToken($id, $email)
    {
        $data = array(
            'status' => 1,
        );

        $this->db->where('id', $id);
        $update = $this->db->update('token', $data);

        $this->db->where('email', $email);
        $update2 = $this->db->update('user', $data);

        if ($update && $update2) {
            return 1;
        }
        return 0;
    }

    public function updatePassword($id, $email, $data)
    {
        $data_token = array(
            'status' => 1,
        );

        $this->db->where('id', $id);
        $update = $this->db->update('token', $data_token);

        $this->db->where('email', $email);
        $update2 = $this->db->update('user', $data);

        if ($update & $update2) {
            return 1;
        }
        return 0;
    }

    public function addPokemon($data)
    {
        $query = $this->db->insert('pokemon_data', $data);
        if ($query) {
            return TRUE;
        }

        return FALSE;
    }

    public function getAllPokemon()
    {
        $query = $this->db->get('pokemon_data')->result();
        if ($query) {
            return $query;
        }
        return false;
    }

    public function catchPokemon($pokemon_id)
    {
        $random = rand(0, 10);
        if ($random >= 6) {
            $user_id = $this->session->userdata("user_id");
            $this->db->where('id', $pokemon_id);
            $this->db->where('owner_status', NULL);
            $update = $this->db->update('pokemon_data', ['owner_status' => $user_id]);

            if ($update) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function getPokemon($pokemon_id)
    {
        $pokemon = $this->db->get_where('pokemon_data', array('id' => $pokemon_id))->row();
        if ($pokemon) {
            return $pokemon;
        }
        return false;
    }

    public function getAllOwnedPokemon()
    {
        $user_id = $this->session->userdata("user_id");
        $query = $this->db->get_where('pokemon_data', ['owner_status' => $user_id])->result();
        if ($query) {
            return $query;
        }
        return false;
    }
}
