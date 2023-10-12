<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Ubah Jadwal Les Privat</h2>
                <!-- <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Inner Page</li>
                </ol> -->
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
            <form action="<?=base_url("kelas/ubah_jadwal/$id/".$this->uri->segment(4))?>" method="post" role="form">
            <h5 class="text-center">Jadwal Lama</h5>
                <div class="form-row">
                    <div class="col-md-4 form-group text-center">
                        <?=$hari_lama?>
                    </div>
                    <div class="col-md-4 form-group text-center">
                        <?=$jadwal_lama?>
                    </div>
                    <div class="col-md-4 form-group text-center">
                        <?=$waktu_lama?>
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 form-group">
                        <select name="hari" id="pil-hari" class="form-control" required>
                            <option value="" disabled selected>Pilih hari</option>
                            <?php foreach ($hari as $key) { ?>
                                <option value="<?= $key->id_hari ?>"><?= $key->hari ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="date" name="tanggal" class="form-control" id="name" placeholder="Tanggal Mulai Belajar" required/>
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="time" name="waktu" class="form-control" id="name" placeholder="Waktu Mulai Belajar" required/>
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="text-center"><button class="btn btn-primary" type="submit">Ubah Jadwal Les Privat</button></div>
            </form>
        </div>
    </section>

</main><!-- End #main -->