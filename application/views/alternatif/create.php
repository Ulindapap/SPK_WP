<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Mata Kuliah</h1>

    <a href="<?= base_url('Alternatif'); ?>" class="btn btn-secondary btn-icon-split"><span
            class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
        <span class="text">Kembali</span>
    </a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-plus"></i> Tambah Data Mata Kuliah</h6>
    </div>

    <?php echo form_open('Alternatif/store'); ?>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="form-group col-md-12">
                    <label class="font-weight-bold">Nama Mata Kuliah</label>
                    <input autocomplete="off" type="text" name="nama" required class="form-control" />
                </div>
            </div>
            <div class="col">
                <div class="form-group col-md-12">
                    <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                    <select class="form-control" aria-label="Default select example" name="semester" require>
                        <option value="">Pilih Semester</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                        <option value="7">Semester 7</option>
                        <option value="8">Semester 8</option>
                    </select>
                </div>
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