<?php
class Auth extends CI_Controller
{
	public function login()
	{
		if ($this->session->userdata('logged_in')) {
	        redirect('');
	    }
	    else
	    {
	        $this->form_validation->set_rules("username", "Username", "trim|required");
	        $this->form_validation->set_rules("username", "Password", "trim|required|callback_checkUsernamePassword");

	        if ($this->form_validation->run() == TRUE)
	        {
	            redirect("");
	        }
			else {
				$this->load->view('global/header');
		        $this->load->view('login');
		        $this->load->view('global/footer');
			}
		}
 	}

 	public function checkUsernamePassword()
 	{
	 	extract($_POST);
	 	if($username != ''){
	        $result = $this->User_model->userLogin($username, $password);
	        if ($result == 3)
	        {
				$this->session->set_flashdata('login_error',TRUE);
	            $this->form_validation->set_message('checkUsernamePassword', 'Sorry, that user does not exist!');
	            return FALSE;
	        }
	        elseif ($result == 2)
	        {
	            $this->session->set_flashdata('login_error',TRUE);
	            $this->form_validation->set_message('checkUsernamePassword', 'Sorry, the password was incorrect!');
	            return FALSE;
	        }
			else
			{
	            $sess_data = array('logged_in' => TRUE, 'user_id' => $result[0]->id);
	            $this->session->set_userdata($sess_data);
				return TRUE;
			}
		}
 	}

	public function register()
	{
		if ($this->session->userdata('logged_in')) {
			redirect('');
		}
		else
		{
			$this->form_validation->set_rules("firstname", "Firstname", "trim|required");
			$this->form_validation->set_rules("lastname", "Lastname", "trim|required");
			$this->form_validation->set_rules("username", "Username", "trim|required|callback_uniqueUname");
			$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");
			$this->form_validation->set_rules("confirm-password", "Password Confirmation", "trim|required|matches[password]s");
			$this->form_validation->set_rules("email", "Password", "trim|required|valid_email|callback_uniqueEmail");
			$this->form_validation->set_rules("mobile", "Password", "trim|required");

			if ($this->form_validation->run() == TRUE)
			{
				$salt = substr(md5(uniqid(rand(), true)), 0, 9);
	            $password = hash('sha512', ($salt . hash('sha512', ($salt . hash('sha512', $this->input->post('confirm-password'))))));

				$userData = array(
					'fname'=> $this->input->post('firstname'),
		      		'lname'=> $this->input->post('lastname'),
					'username' => $this->input->post('username'),
					'password'=> $password,
					'password_salt' => $salt,
		      		'email'=> $this->input->post('email'),
		      		'mobile'=> $this->input->post('mobile'),
					'type' => '0'
		        );

				if ($this->User_model->register($userData))
				{
					$this->session->set_flashdata('registration_success',TRUE);
					$this->form_validation->set_message('register', 'Your account has been created. You may now login.');

					$this->load->view('global/header');
					$this->load->view('register_success');
					$this->load->view('global/footer');
				}
			}
			else {
				$this->load->view('global/header');
				$this->load->view('register');
				$this->load->view('global/footer');
			}
		}
	}

	public function uniqueEmail()
	{
		extract($_POST);
		if ($this->User_model->uniqueEmail($email))
		{
			return TRUE;
		}
		else {
			$this->session->set_flashdata('registration_error',TRUE);
			$this->form_validation->set_message('uniqueEmail', 'Sorry, that email is already being used! Have you forgotten your password?');
			return FALSE;
		}
	}

	public function uniqueUname()
	{
		extract($_POST);
		if ($this->User_model->uniqueUname($username))
		{
			return TRUE;
		}
		else {
			$this->session->set_flashdata('registration_error',TRUE);
			$this->form_validation->set_message('uniqueUname', 'Sorry, that username is already being used! Have you forgotten your password?');
			return FALSE;
		}
	}

	public function logout()
	{
		if (!$this->session->userdata('logged_in')) {
	        redirect('auth/login');
	    }
	    else
	    {
			$this->session->sess_destroy();
			redirect('auth/login');
		}
	}

}
?>
