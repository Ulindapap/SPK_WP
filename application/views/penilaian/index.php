<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i> Data Penilaian</h1>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-danger text-white">
                    <tr align="center">
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Kelas</th>
                        <th>Semester</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$no=1;
					?>
                    <?php foreach ($penilaian as $keys): ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$keys->nama?></td>
                        <td><?=$keys->nim?></td>
                        <td><?=$keys->kelas?></td>
                        <td><?=$keys->semester?></td>
                        <td><?=$keys->dataAnswer?></td>
                    </tr>
                    <?php $no++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php $this->load->view('layouts/footer_admin'); ?>