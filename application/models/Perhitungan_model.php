<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Perhitungan_model extends CI_Model {
       
        public function get_kriteria()
        {
            $query = $this->db->get('kriteria');
            return $query->result();
        }
        public function get_alternatif($semester)
        {
			$this->db->where('semester', $semester);
            $query = $this->db->get('alternatif');
            return $query->result();
        }
		
		public function data_nilai($id_alternatif,$id_kriteria)
		{
			$query = $this->db->query("SELECT * FROM penilaian JOIN sub_kriteria WHERE penilaian.id_sub_kriteria=sub_kriteria.id_sub_kriteria AND penilaian.id_alternatif='$id_alternatif' AND penilaian.id_kriteria='$id_kriteria';");
			return $query->row_array();
		}
		
		public function get_total_kriteria()
		{
			$query = $this->db->query("SELECT SUM(bobot) as total_bobot FROM kriteria;");
			return $query->row_array();
		}
		
		public function total_kriteria()
		{
			$query = $this->db->query("SELECT COUNT(*) as total_kriteria FROM kriteria;");
			return $query->row_array();
		}
		
		public function get_hasil_wp()
        {
			$query = $this->db->query("SELECT * FROM hasil_wp ORDER BY id_hasil_wp DESC;");
            return $query->row();
        }
		
		public function get_hasil_alternatif($id_alternatif)
		{
			$query = $this->db->query("SELECT * FROM alternatif WHERE id_alternatif='$id_alternatif';");
			return $query->row_array();		
		}
		
		public function insert_hasil_wp($hasil_akhir = [])
        {
            $result = $this->db->insert('hasil_wp', $hasil_akhir);
            return $result;
        }

		// kode dibawah setelah direvisi 
		public function getValue($alternatif, $kriteria) {
			$this->db->order_by("id_penilaian", "desc");
			$this->db->limit(1);
			$penilaian = $this->db->get('penilaian')->row();
			$data =  json_decode($penilaian->dataAnswer);
			foreach($data as $question => $value) {
				$this->db->where('id', $question);
				$this->db->where('alternatif_id', $alternatif);
				$this->db->where('kriteria_id', $kriteria);
				$result = $this->db->get('pertanyaan')->row();
				if($result) {
					$this->db->where('id_sub_kriteria', $value);
					$vw = $this->db->get('sub_kriteria')->row();
					return $vw->nilai;
				}
			}
		}
	}