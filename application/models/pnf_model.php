<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pnf_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function getCheckAuth($authData) {
		$sql = "SELECT * FROM user WHERE user_name='" . $authData ['pnf_username'] . "' and user_pass='" . $authData ['pnf_password'] . "'";
		$query = $this->db->query ( $sql );
		return $query->num_rows();
	}

	public function getRoomList(){
		$sql = "SELECT * FROM room";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getRoomInfo($roomId){
		$sql = "SELECT * FROM room WHERE room_id = '".$roomId."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getSubRoom($roomId){
		$sql = "SELECT `subRoom_id` FROM subroom WHERE room_id = '".$roomId."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getImage($roomId){
		$sql = "SELECT * FROM image WHERE room_id = '".$roomId."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getResvList(){
		$sql = "SELECT * FROM reservation";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getResvInfo($resvId){
		$sql = "SELECT * FROM reservation WHERE resv_id = '".$resvId."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getInsertSubRoom($InsRoomId){
		$sql = "INSERT INTO `subroom`(`room_id`) VALUES ('".$InsRoomId."')";
		$query = $this->db->query($sql);
	}

	public function getDeleteSubRoom($delRoomId){
		$sql = "DELETE FROM `subroom` WHERE `subRoom_id` = '".$delRoomId."'";
		$query = $this->db->query($sql);
	}


	public function getInsertRoom($insertData){
		$sql = "INSERT INTO `room`(`room_name`, `room_info`, `room_type`, `room_cost`,
				 `room_capacity`, `room_stat`)
				VALUES ('".$insertData['roomName']."','".$insertData['roomInfo']."','".$insertData['roomType']."','".$insertData['roomCost']."',
				'".$insertData['roomCapa']."','".$insertData['roomStat']."')";
		$query = $this->db->query($sql);
		$sql2 = "select * from room where room_name = '".$insertData['roomName']."'";
		$query2 = $this->db->query($sql2);
		return $query2->result_array();
	}

	public function getUpdateRoom($updateData){
		$sql = "UPDATE `room` SET `room_name` = '".$updateData['roomName']."', `room_info` = '".$updateData['roomInfo']."', `room_type` = '".$updateData['roomType']."', `room_cost` = '".$updateData['roomCost']."',
				 `room_capacity` = '".$updateData['roomCapa']."', `room_stat` = '".$updateData['roomStat']."' WHERE `room_id` = '".$updateData['roomId']."'";
		$query = $this->db->query($sql);
		$sql2 = "select * from room where room_name = '".$updateData['roomName']."'";
		$query2 = $this->db->query($sql2);
		return $query2->result_array();
	}

	public function getDeleteRoom($roomId){
			$sql = "DELETE FROM `room` WHERE `room_id` = '".$roomId."'";
			$query = $this->db->query($sql);
	}

	public function getAddImgpath($imgData){
		$sql = "INSERT INTO `image`(`room_id`,`image_path`) VALUES ('".$imgData['roomId']."','".$imgData['imgpath']."')";
		$query = $this->db->query($sql);
	}

	public function getImageList($roomId){
		$sql = "SELECT `image_path` FROM `image` WHERE `room_id` = '$roomId'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getSearchResult($searchData){
		$sql = "SELECT `subroom.room_capa_id`, `room.room_name, room.room_cost`, `room.room_type`, `room.room_capacity`, `room.room_thumbs`
				FROM subroom INNER JOIN room ON `subroom.room_id`=`room.room_id`
				WHERE '".$searchData['toDate']."' < room_checkin or '".$searchData['fromDate']."' > room_checkout ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

/*	public function getUpdateSelectData($selectStat,$selectData){
		$sql = "UPDATE room_capa SET room_select_stat = '".$selectStat."' where subRoom_id = '".$selectData['roomCapaId']."'";
		$query = $this->db->query($sql);
		return $query;
	}*/

/*	public function getDeleteSelectData($selectData){
		$sql = "update room_capa set room_select_stat = '' where room_capa_id = '".$selectData['roomCapaId']."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}*/

}
?>
