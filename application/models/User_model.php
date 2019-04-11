<?php
class User_model extends CI_Model {

	public function userLogin($uname, $pwd)
	{
		//Check if users exists with that email
		$query1 = $this->db->query(
		"SELECT password_salt FROM `users`
		WHERE username = '$uname'");
		//Get the users information
		$users = $query1->result_array();

		//check if a user exists with that id and get their salt.
		if(($query1->num_rows()) == 1)
		{
			//Get the users salt key
			$salt = $users['0']['password_salt'];
			//Hash the password attempt with the users salt key
			$pwdhash = hash('sha512', ($salt . hash('sha512', ($salt . hash('sha512', $pwd)))));

			//Query the DB with the hashed password
			$query2 = $this->db->query(
			"SELECT * FROM `users`
			WHERE username = '$uname'
			AND password = '$pwdhash'");

			//check if the password works
			if(($query2->num_rows()) == 1)
			{
				//Return success
				return $query2->result();

			}
			else
			{
				//Return password error
				return '2';
			}

		}
		else
		{
			//Return ID does not exist
			return '3';
		}
	}

	public function getInfo($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('users');

		$result = $query->result_array();

		return $result['0'];
	}

	public function isManager($id)
	{
		$this->db->where('manager_id', $id);
		$query = $this->db->get('airports');

		$result = $query->num_rows();

		if ($result > 0)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	public function uniqueEmail($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('users');

		$result = $query->num_rows();

		if ($result > 0)
		{
			return FALSE;
		}
		else {
			return TRUE;
		}
	}

	public function uniqueUname($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('users');

		$result = $query->num_rows();

		if ($result > 0)
		{
			return FALSE;
		}
		else {
			return TRUE;
		}
	}

	public function register($userData)
	{
		if ($this->db->insert('users', $userData))
		{
			return TRUE;
		}
	}
}
