<?php
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
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
		$airportsArray = $this->Data_model->selectMyAirports($this->session->userdata('user_id'));

		$data = array(
			'myAirports' => $airportsArray
		);

	    $this->load->view('global/header');
        $this->load->view('admin_main', $data);
        $this->load->view('global/footer');
 	}

	public function airport()
	{
		$airportBookingArray = $this->Data_model->getAirportBookings($this->input->post('airport'));

		$this->load->view('global/header');
		$this->load->view('admin_airport');
		$this->load->view('global/footer');
	}

}
?>
