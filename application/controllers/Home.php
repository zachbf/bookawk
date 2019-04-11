<?php
class Home extends CI_Controller
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
        $this->load->view('home');
        $this->load->view('global/footer');
 	}

}
?>
