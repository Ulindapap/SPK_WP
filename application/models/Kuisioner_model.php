<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Kuisioner_model extends CI_Model {
        public function getAlternatif($data) {
            $result = $this->db->query("SELECT * FROM Alternatif WHERE semester = '$data';");
            return $result->result();
        }
    }
?>