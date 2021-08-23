<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->view('layout/head');
		$this->load->view('layout/nav');
		$this->load->view('main');
		$this->load->view('layout/foot');
	}

	public function list()
	{
		$data["pokemon_list"] = $this->authModel->getAllPokemon();
		$this->load->view('layout/head');
		$this->load->view('layout/nav');
		$this->load->view('list', $data);
		$this->load->view('layout/foot');
	}

	public function owned_list()
	{
		$data["pokemon_list"] = $this->authModel->getAllOwnedPokemon();
		$this->load->view('layout/head');
		$this->load->view('layout/nav');
		$this->load->view('list', $data);
		$this->load->view('layout/foot');
	}

	public function catch($pokemon_id)
	{
		$catch = $this->authModel->catchPokemon($pokemon_id);
		$pokemon = $this->authModel->getPokemon($pokemon_id);
		if ($catch) {
			$this->session->set_flashdata('success', 'Success catching ' . $pokemon->name);
		} else {
			$this->session->set_flashdata('failed', 'Failed catching ' . $pokemon->name);
		}
		return redirect('/welcome/list', 'refresh');
	}

	public function register()
	{
		$this->load->view('layout/head');
		$this->load->view('layout/nav');
		$this->load->view('register');
		$this->load->view('layout/foot');
	}

	public function reset()
	{
		$this->load->view('layout/head');
		$this->load->view('layout/nav');
		$this->load->view('forgot_password');
		$this->load->view('layout/foot');
	}
}
