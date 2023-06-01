<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Pertanyaan</h1>

    <a href="<?= base_url('Kriteria'); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i
                class="fas fa-arrow-left"></i></span>
        <span class="text">Kembali</span>
    </a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-plus"></i> Tambah Data Pertanyaan</h6>
    </div>

    <?php echo form_open('Pertanyaan/update'); ?>
    <div class="card-body">
        <div class="row">
            <input type="text" id="id" value="<?=$pertanyaan->id?>" hidden>
            <div class="form-group col-md-6">
                <label class="font-weight-bold">Pertanyan</label>
                <input autocomplete="off" type="text" name="pertanyaan" required class="form-control"
                    value="<?=$pertanyaan->pertanyaan?>" />
            </div>
            <div class="form-group col-md-6">
                <label class="font-weight-bold">Alternatif Mata Kuliah</label>
                <select name="alternatif_id" class="form-control" required>
                    <option value="">--Pilih mata Kuliah--</option>
                    <?php foreach($alternatif as $value) : ?>
                    <option value="<?=$value->id_alternatif?>"><?=$value->nama?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label class="font-weight-bold">Kriteria</label>
                <select name="kriteria_id" class="form-control" required>
                    <option value="">--Pilih kriteria--</option>
                    <?php foreach($kriteria as $value) : ?>
                    <option value="<?=$value->id_kriteria?>"><?=$value->keterangan?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
    </div>
    <?php echo form_close() ?>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>