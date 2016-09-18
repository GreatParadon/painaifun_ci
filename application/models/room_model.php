<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class room_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function roomList(){
		$room_select = $this->db->get('room');
		return $room_select->result_array();
	}

	public function insertRoom($room_insert_data){
		$this->db->insert('room', $room_insert_data);
		$room_insert = $this->db->insert_id();
		return $room_insert;
	}

	public function editRoom($id){
		$room_edit = $this->db->get_where('room', array('room_id' => $id));
		return $room_edit->row_array();
	}

	public function rateList($id){
		$this->db->select('*');
		$this->db->from('room');
		$this->db->join('rate', 'rate.room_id = room.room_id');
		$this->db->where('rate.room_id', $id);
		$rate_select = $this->db->get();
		return $rate_select->result_array();
	}

	public function updateRoom($room_update_data,$id){
		$this->db->where('room_id', $id);
		$this->db->update('room', $room_update_data);
	}

	public function deleteRoom($id){
		$this->db->where('room_id', $id);
		$this->db->delete('room');
	}

	public function showRoom($id){
		$room_show = $this->db->get_where('room', array('room_id' => $id));
		return $room_show->result_array();
	}

	public function showRoomImage($id){
		$room_image = $this->db->get_where('image', array('room_id' => $id));
		return $room_image->result_array();
	}

	public function getAddImgpath($name,$roomId)
	{
		$sql = "INSERT INTO `image`(`room_id`,`image_path`) VALUES ('".$roomId."','".$name."')";
		$query = $this->db->query($sql);
	}

	public function getImageList($roomId){
		$sql = "SELECT `image_path` FROM `image` WHERE `room_id` = '$roomId'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
?>
