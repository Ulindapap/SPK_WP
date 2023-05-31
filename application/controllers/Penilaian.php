<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Penilaian extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Penilaian_model');

            if ($this->session->userdata('id_user_level') != "1") {
            ?>
<script type="text/javascript">
alert('Anda tidak berhak mengakses halaman ini!');
window.location = '<?php echo base_url("Login/home"); ?>'
</script>
<?php
			}
        }

        public function index()
        {
            $data = [
				'page' => "Penilaian",
                'penilaian'=> $this->Penilaian_model->tampil(),
            ];
            $this->load->view('penilaian/index', $data);
        }
    }
    
    