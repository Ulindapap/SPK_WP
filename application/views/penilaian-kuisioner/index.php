<?php
$this->load->view('layouts/header_admin');
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i>Penilaian Kuisioner</h1>
</div>

<div class="card">
    <div class="card-header">
        <h6 class="font-weight-bold mb-0 text-danger"><i class="fas fa-fw fa-edit"></i>Biodata</h6>
    </div>
    <div class="card-body">
        <?php echo form_open('Kuisioner/question') ?>
        <div class="row mb-3">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama"
                    aria-label="Username" aria-describedby="basic-addon1" name="nama" required>
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">NIM</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="NIM"
                    aria-label="Username" aria-describedby="basic-addon1" name="nim" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                <select class="form-control" aria-label="Default select example" name="kelas" id="kelas" required>
                    <option value="">Kelas</option>
                    <option value="DKV-03-A">DKV-03-A</option>
                    <option value="DKV-03-B">DKV-03-B</option>
                    <option value="DKV-03-C">DKV-03-C</option>
                    <option value="DKV-03-D">DKV-03-D</option>
                </select>
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Semester</label>
                <select class="form-control" aria-label="Default select example" name="semester" id="semester" required>
                    <option value="">Pilih Semester</option>
                    <option value="6">Semester 6</option>
                    <option value="7">Semester 7</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-danger px-4">Lanjut</button>
        <?php echo form_close() ?>
    </div>
</div>
<div id="pertanyaan">
</div>
<?php
$this->load->view('layouts/footer_admin');
?>