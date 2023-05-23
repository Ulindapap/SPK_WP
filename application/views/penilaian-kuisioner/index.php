<?php
$this->load->view('layouts/header_admin');
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i>Penilaian Kuisioner</h1>
</div>

<div class="card">
    <div class="card-header">
        <h6 class="font-weight-bold mb-0 text-primary"><i class="fas fa-fw fa-edit"></i>Kuisioner</h6>
    </div>
    <div class="card-body">
        <?php echo form_open() ?>
        <div class="row mb-3">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama"
                    aria-label="Username" aria-describedby="basic-addon1" name="nama" require>
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">NIM</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="NIM"
                    aria-label="Username" aria-describedby="basic-addon1" name="nim" require>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kelas"
                    aria-label="Username" aria-describedby="basic-addon1" name="kelas" require>
            </div>
            <div class="col">
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
        <?php echo form_close() ?>
    </div>
</div>
<?php
$this->load->view('layouts/footer_admin');
?>