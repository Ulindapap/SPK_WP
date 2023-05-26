<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Pertanyaan_model extends CI_Model {
       
        public function tampil()
        {
            $query = $this->db->get('pertanyaan');
            return $query->result();
        }
        public function show($id)
        {
            $query = $this->db->query("SELECT * FROM pertanyaan WHERE id = '$id'; ");
            return $query->row();
        }

        public function insert($data = [])
        {
            $result = $this->db->insert('Pertanyaan', $data);
            return $result;
        }

        public function update($id, $data=[]) {
            $ubah = array(
                'pertanyaan'  => $data['pertanyaan'],
                'alternatif_id'  => $data['alternatif_id'],
                'kriteria_id'  => $data['kriteria_id'],
            );

            $this->db->where('id', $id);
            $this->db->update('pertanyaan', $ubah);
        }

        public function getAlternatif($id_alternatif, $alternatif_id) {
            $result = $this->db->query("SELECT * FROM Alternatif JOIN Pertanyaan WHERE Alternatif.id_alternatif = Pertanyaan.alternatif_id AND Alternatif.id_alternatif = '$id_alternatif' AND Pertanyaan.alternatif_id = '$alternatif_id';");
            return $result->row();
        }
        public function getKriteria($id_kriteria, $kriteria_id) {
            $result = $this->db->query("SELECT * FROM Kriteria JOIN Pertanyaan WHERE Kriteria.id_kriteria = Pertanyaan.kriteria_id AND Kriteria.id_kriteria = '$id_kriteria' AND Pertanyaan.kriteria_id = '$kriteria_id';");
            return $result->row();
        }

        public function getQuestion($data) {
            $this->db->where('semester', $data);
            $result = $this->db->get('pertanyaan')->result();
            return $result; 
        }
    }
?>