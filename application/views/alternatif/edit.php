<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Mata Kuliah</h1>

    <a href="<?= base_url('Alternatif'); ?>" class="btn btn-secondary btn-icon-split"><span
            class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
        <span class="text">Kembali</span>
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-fw fa-edit"></i> Edit Data Mata Kuliah</h6>
    </div>


    <div class="card-body">
        <?php echo form_open('Alternatif/update'); ?>
        <input type="hidden" name="id" value="<?=$alternatif->id_alternatif?>">
        <div class="form-group col-md-12">
            <label for="#al" class="form-label font-weight-bold">Nama Mata Kuliah</label>
            <input autocomplete="off" type="text" name="nama" value="<?php echo $alternatif->nama ?>" required
                class="form-control" id="al" />
        </div>
        <div class="form-group col-md-12">
            <label for="#select" class="form-label font-weight-bold">Semester</label>
            <select class="form-control" aria-label="Default select example" name="semester" required id="select">
                <option value="<?=$alternatif->semester?>">Semester <?=$alternatif->semester?></option>
                <option value="6">Semester 6</option>
                <option value="7">Semester 7</option>

        </div>
        <div class="form-group col-md-12">
            <label for="#des" class="form-label font-weight-bold">Deskripsi Mata Kuliah</label>
            <input autocomplete="off" type="text" name="deskripsi" value="<?php echo $alternatif->deskripsi ?>" required
                class="form-control" id="des" />
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
        <?php echo form_close() ?>
    </div>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>