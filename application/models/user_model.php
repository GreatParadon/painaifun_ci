<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function getCheckAuth($authData) {
		$sql = "SELECT * FROM user WHERE user_name='" . $authData ['pnf_username'] . "' and user_pass='" . $authData ['pnf_password'] . "'";
		$query = $this->db->query ( $sql );
		return $query->num_rows();
	}
}
?>
