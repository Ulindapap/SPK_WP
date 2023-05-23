<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Kuisioner extends CI_Controller {
        public function index() {
            $data['page'] = 'Kuisioner';
            $this->load->view('penilaian-kuisioner/index', $data);
        }
    }
?>