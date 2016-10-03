<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reservation_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function ReservationList(){
		$this->db->order_by("reservation_date", "desc");
		$query = $this->db->get('reservation');
		return $query->result_array();
	}

	public function insertReservation($reservation_insert_date){
		$this->db->insert('reservation', $reservation_insert_date);
		$reservation_id = $this->db->insert_id();
		$query = $this->db->get('room');
		// $i = 1;
		foreach ($query->result_array() as $room) {
			for($j= 1; $j <= $room['room_number']; $j++ ){
				$insert_reservation_room = array('room_id' => $room['room_id'], 'reservation_id' => $reservation_id, 'room_seq' => $j);
				$this->db->insert('reservation_room', $insert_reservation_room);
				// $i++;
			}
		}
		return $reservation_id;
	}

	public function showReservation($id){
		$this->db->select('*');
		$this->db->from('reservation_room');
		$this->db->join('room', 'room.room_id = reservation_room.room_id');
		$this->db->join('reservation', 'reservation.reservation_id = reservation_room.reservation_id');
		$this->db->where('reservation.reservation_id' , $id);
		$show_data = $this->db->get();
		return $show_data->result_array();
	}

	public function editReservation($id){
		$this->db->select('*');
		$this->db->from('reservation_room');
		$this->db->join('room', 'room.room_id = reservation_room.room_id');
		$this->db->join('reservation', 'reservation.reservation_id = reservation_room.reservation_id');
		$this->db->where('reservation_room_id' , $id);
		$show_data = $this->db->get();
		return $show_data->result_array();
	}

	public function updateReservation($reservation_update_data,$id){
		$this->db->where('reservation_room_id', $id);
		$this->db->update('reservation_room', $reservation_update_data);
	}

	public function deleteReservation($id){
		$this->db->where('reservation_id', $id);
		$this->db->delete('reservation');
	}

}
?>
