<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Kuisioner extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Kuisioner_model');
            $this->load->model('Pertanyaan_model');
            $this->load->model('Sub_Kriteria_model');
            $this->load->model('Penilaian_model');
        }
        public function index() {
            $data['page'] = 'Kuisioner';
            $this->load->view('penilaian-kuisioner/index', $data);
        }
        
        public function question() {
            $data['page'] = 'Kuisioner';
            $data['value'] = [
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'kelas' => $this->input->post('kelas'),
                'semester' => $this->input->post('semester'),
            ];
            
            $data['question'] = $this->Pertanyaan_model->getQuestion($data['value']['semester']);
            return $this->load->view('penilaian-kuisioner/question', $data);
            
        }

        public function store() {
            $data = [];
            $answer_list = [];
            $getQuestion = $this->Pertanyaan_model->getQuestion($this->input->post('semester'));
            $question_list = $this->input->post('question');
            
            foreach($getQuestion as $q) {
                array_push($answer_list, $this->input->post($q->id));
            }
            $data = array_combine($question_list, $answer_list);

            $insert = [
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'kelas' => $this->input->post('kelas'),
                'semester' => $this->input->post('semester'),
                'dataAnswer' => json_encode($data),
            ];

            $this->Penilaian_model->store($insert);
            return redirect('/Perhitungan', $penilaian);
        }
    }
?>