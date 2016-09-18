<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reservation_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function ReservationList(){
		$sql = "SELECT * FROM reservation";
		$query = $this->db->query($sql);
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

	public function getSearchResult($searchData){
		$sql = "SELECT `subroom.room_capa_id`, `room.room_name, room.room_cost`, `room.room_type`, `room.room_capacity`, `room.room_thumbs`
				FROM subroom INNER JOIN room ON `subroom.room_id`=`room.room_id`
				WHERE '".$searchData['toDate']."' < room_checkin or '".$searchData['fromDate']."' > room_checkout ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
?>
