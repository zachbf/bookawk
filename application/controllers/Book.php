<?php
class Book extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('auth/login');
		}
		else
		{
			$data = array();
			$data['userInfo'] = $this->User_model->getInfo($this->session->userdata('user_id'));
			$this->load->vars($data);
		}
	}
	public function index()
	{
	    $this->load->view('global/header');
        $this->load->view('book');
        $this->load->view('global/footer');
 	}

}
?>
