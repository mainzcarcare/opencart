<?php
class ModelToolUpload extends Model {	
	public function addUpload($name, $filename) {
		$code = sha1(uniqid(mt_rand(), true));
		
		$this->db->query("INSERT INTO `" . DB_PREFIX . "upload` SET `name` = '" . $this->db->escape($name) . "', `filename` = '" . $this->db->escape($filename) . "', `code` = '" . $this->db->escape($code) . "', `date_added` = NOW()");
	
		return $code;
	}
	
	public function getUploadById($upload_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "upload` WHERE upload_id = '" . (int)$upload_id . "'");
		
		return $query->row;
	}
		
	public function getUploadByCode($code) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "upload` WHERE code = '" . $this->db->escape($code) . "'");
		
		return $query->row;
	}
}