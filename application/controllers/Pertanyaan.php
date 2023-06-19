<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Pertanyaan extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Pertanyaan_model');
            $this->load->model('Alternatif_model');
            $this->load->model('Kriteria_model');
            $this->load->model('Sub_Kriteria_model');
        }
        public function index() {
            $data = [
                'page' => 'Pertanyaan',
                'list' => $this->Pertanyaan_model->tampil(),
            ];
            $this->load->view('Pertanyaan/index', $data);
        }

        public function create() {
            $data= [
                'page' => 'Pertanyaan',
                'alternatif' => $this->Alternatif_model->tampil(),
                'kriteria' => $this->Kriteria_model->tampil(),
            ];
            $this->load->view('pertanyaan/create', $data);
        }

        public function store() {
            $alternatif_id = $this->input->post('alternatif_id');
            $semester = $this->db->query("SELECT * FROM Alternatif WHERE id_alternatif = '$alternatif_id';")->row();
            $data = [
                'pertanyaan' => $this->input->post('pertanyaan'),
                'alternatif_id' => $this->input->post('alternatif_id'),
                'kriteria_id' => $this->input->post('kriteria_id'),
                'semester' => $semester->semester,
            ];
            
            $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');               
            $this->form_validation->set_rules('alternatif_id', 'Alternatif_id', 'required');               
            $this->form_validation->set_rules('kriteria_id', 'Kriteria_id', 'required');               

            if ($this->form_validation->run() != false) {
                $result = $this->Pertanyaan_model->insert($data);
                if ($result) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
                    redirect('Pertanyaan');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data gagal disimpan!</div>');
                redirect('Pertanyaan/create');
            }
        }

        public function edit($id) {
            $pertanyaan = $this->Pertanyaan_model->show($id);
            $data = [
                'page' => "Alternatif",
                'pertanyaan' => $pertanyaan,
                'alternatif' => $this->Alternatif_model->tampil(), 
                'kriteria' => $this->Kriteria_model->tampil(), 
            ];
            $this->load->view('Pertanyaan/edit', $data);
        }

        public function update()
        {
            $id = $this->input->post('id');
            $data = array(
                'pertanyaan' => $this->input->post('pertanyaan'),
                'alternatif_id' => $this->input->post('alternatif_id'),
                'semester' => $this->input->post('semester'),
                'kriteria_id' => $this->input->post('kriteria_id'),
            );

            // $this->Pertanyaan_model->update($id, $data);
            $this->db->where('id', $id);
            $this->db->update('pertanyaan', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
            redirect('Pertanyaan');
        }
        
        public function destroy($id) {
            $this->Pertanyaan_model->destroy($id);
            redirect('Pertanyaan');
        }
    }
?>