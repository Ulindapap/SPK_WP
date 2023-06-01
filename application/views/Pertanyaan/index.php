<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Pertanyaan</h1>

    <a href="<?= base_url('Pertanyaan/create'); ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Pertanyaan</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr align="center">
                        <th width="5%">No</th>
                        <th>Pertanyaan</th>
                        <th>Alternatif</th>
                        <th>Kriteria</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						$no=1;
						foreach ($list as $data => $value) {
					?>
                    <tr align="center">
                        <td><?=$no ?></td>
                        <td><?php echo $value->pertanyaan ?></td>
                        <td><?php $alternatif = $this->Pertanyaan_model->getAlternatif($value->alternatif_id, $value->alternatif_id) ?>
                            <?=$alternatif->nama?>
                        </td>
                        <td><?php $kriteria = $this->Pertanyaan_model->getKriteria($value->kriteria_id, $value->kriteria_id) ?>
                            <?=$kriteria->keterangan?>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a data-toggle="tooltip" data-placement="bottom" title="Edit Data"
                                    href="<?=base_url('Pertanyaan/edit/'.$value->id)?>"
                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a data-toggle="tooltip" data-placement="bottom" title="Hapus Data"
                                    href="<?=base_url('Pertanyaan/destroy/'.$value->id)?>"
                                    onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')"
                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php
						$no++;
						}
					?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php $this->load->view('layouts/footer_admin'); ?>