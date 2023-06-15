<?php

use Sabberworm\CSS\Value\Value;

 $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Data Hasil Akhir</h1>

    <a href="<?= base_url('Laporan'); ?>" class="btn btn-primary"> <i class="fa fa-print"></i> Cetak Data </a>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary mb-3"><i class="fa fa-table"></i> Hasil Akhir Perankingan</h6>
        <?php 
        $this->db->where('id_penilaian', $hasil_wp->id_penilaian);
        $penilaian = $this->db->get('penilaian')->row();
        ?>
        <small class="text-dark">Nama : <?=$penilaian->nama?></small><br>
        <small class="text-dark">NIM : <?=$penilaian->nim?></small><br>
        <small class="text-dark">Kelas : <?=$penilaian->kelas?></small><br>
        <small class="text-dark">Semester : <?=$penilaian->semester?></small>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr align="center">
                        <th>Nama Mata Kuliah</th>
                        <th width="50%">Deskripsi Mata Kuliah</th>
                        <th>Nilai (V)</th>
                        <th width="15%">Rank</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // logic untuk mengambil nilai dan sorting secara desc 
						$no=1;
                        $dataArray = [];
                        $data = json_decode($hasil_wp->dataAkhir);
                        foreach($data as $key => $val) {
                            array_push($dataArray, [$key => $val]);
                        }
                        arsort($dataArray);
						foreach ($dataArray as $key => $value): ?>
                    <?php foreach ($value as $index => $val) :?>
                    <tr align="center">
                        <td align="left">
                            <?php
                            $this->db->where('id_alternatif', $index);
                            $alternatif = $this->db->get('alternatif')->row();
                            echo $alternatif->nama;
							?>

                        </td>
                        <td align="left">
                            <?php
							$this->db->where('id_alternatif', $index);
                            $alternatif = $this->db->get('alternatif')->row();
                            echo $alternatif->deskripsi;
							?>

                        </td>
                        <td><?= $val ?></td>
                        <td><?= $no; ?></td>
                    </tr>
                    <?php endforeach ?>
                    <?php
						$no++;
						endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$this->load->view('layouts/footer_admin');
?>