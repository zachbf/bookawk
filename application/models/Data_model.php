<?php
class Data_model extends CI_Model {

	public function getUserBookings($userid){
        $this->db->where('uid', $userid);
        $query = $this->db->get('booking');

        return $query->result_array();
    }

	public function selectMyAirports($userid){
		$this->db->where('manager_id', $userid);
        $query = $this->db->get('airports');

        return $query->result_array();
    }

	public function getAirportBookings($icao){
		$this->db->where('arpt', $userid);
		$query = $this->db->get('booking');

		return $query->result_array();
	}
}
