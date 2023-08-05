<?php
$this->load->view('layouts/header_admin');
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i>Penilaian Kuisioner</h1>
</div>

<div class="card">
    <div class="card-header">
        <h6 class="font-weight-bold mb-0 text-danger mb-3"><i class="fas fa-fw fa-edit"></i>Kuisioner</h6>
        <p class="text-dark">Biodata</p>
        <small class="text-dark">Nama : <?=$value['nama']?></small><br>
        <small class="text-dark">NIM : <?=$value['nim']?></small><br>
        <small class="text-dark">Kelas : <?=$value['kelas']?></small><br>
        <small class="text-dark">Semester : <?=$value['semester']?></small>
    </div>
    <div class="card-body">
        <?php echo form_open('Kuisioner/store') ?>
        <div class="row">
            <input type="text" value="<?=$value['nama']?>" name="nama" hidden>
            <input type="text" value="<?=$value['nim']?>" name="nim" hidden>
            <input type="text" value="<?=$value['kelas']?>" name="kelas" hidden>
            <input type="text" value="<?=$value['semester']?>" name="semester" hidden>
        </div>
        <?php $n = 1 ?>
        <?php foreach($question as $q) : ?>
        <div class="question-item mb-3">
            <p class="text-dark"><?=$n?>. <?=$q->pertanyaan?></p>
            <input type="text" name="question[]" id="" hidden value="<?=$q->id?>">
            <div class="container">
                <?php 
                $subKriteria = $this->Sub_Kriteria_model->getKriterisId($q->kriteria_id);
                ?>
                <?php foreach($subKriteria as $sub) :?>
                <fieldset id="<?=$q->id?>">
                    <input class="form-check-input" type="radio" name="<?=$q->id?>" id="flexRadioDefault1"
                        value="<?=$sub->id_sub_kriteria?>" required>
                    <label class="form-check-label" for="flexRadioDefault1">
                        <?=$sub->deskripsi?>
                    </label>
                </fieldset>
                <?php endforeach ?>
            </div>
        </div>
        <?php 
        $n++ 
        
        ?>
        <?php endforeach ?>

        <a href="<?=base_url();?>Kuisioner" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-danger px-4">Kirim</button>
        <?php echo form_close() ?>
    </div>
</div>
<div id="pertanyaan">
</div>
<?php
$this->load->view('layouts/footer_admin');
?>