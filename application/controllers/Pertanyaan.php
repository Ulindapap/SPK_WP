<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Pertanyaan extends CI_Controller {
        public function index() {
            $data['page'] = 'Pertanyaan';
            $this->load->view('Pertanyaan/index', $data);
        }
    }
?>