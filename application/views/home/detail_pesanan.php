<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Pesanan Les Privat</h2>
                <!-- <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Inner Page</li>
                </ol> -->
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Data Siswa
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Nama</label>

                                &nbsp <?= $pesanan[0]->siswa ?>

                            </div>
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Tingkat</label>

                                &nbsp <?= $pesanan[0]->tingkat ?>

                            </div>
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Asal Sekolah</label>

                                &nbsp <?= $pesanan[0]->asal_sekolah ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Data Guru
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Nama</label>

                                &nbsp <?= $pesanan[0]->guru ?>

                            </div>
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Program Studi</label>

                                &nbsp <?= $pesanan[0]->program_studi ?>

                            </div>
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Bidang yang dikuasai</label>
                                &nbsp
                                <?php foreach ($matpel as $key) {
                                    if ($pesanan[0]->bidang_yang_dikuasai == $key->id_mp) echo $key->mata_pelajaran;
                                } ?>
                            </div>
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Bidang yang dikuasai 2</label>
                                &nbsp
                                <?php foreach ($matpel as $key) {
                                    if ($pesanan[0]->bidang_yang_dikuasai_2 == $key->id_mp) {
                                        echo $key->mata_pelajaran;
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Data Pesanan
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Kode Pesanan</label>

                                &nbsp <?= $pesanan[0]->kode_pesanan ?>

                            </div>
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Tanggal Mulai Belajar</label>

                                &nbsp <?= $pesanan[0]->tanggal_mulai_belajar ?>

                            </div>
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Jumlah Siswa</label>

                                &nbsp <?= $pesanan[0]->jumlah_siswa ?>

                            </div>
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Jumlah Pertemuan</label>

                                &nbsp <?= $pesanan[0]->jumlah_pertemuan ?>

                            </div>
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Mata Pelajaran</label>

                                &nbsp <?= $pesanan[0]->mata_pelajaran ?>

                            </div>
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Hari</label>

                                &nbsp <?= $pesanan[0]->hari ?>

                            </div>
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Kelas</label>

                                &nbsp <?= $pesanan[0]->kelas ?>

                            </div>
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Deskripsi</label>

                                &nbsp <?= $pesanan[0]->deskripsi ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Data Pembayaran
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Metode Pembayaran</label>

                                &nbsp <?= $pesanan[0]->metode_pembayaran ?>

                            </div>
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Status Pembayaran</label>

                                &nbsp <?= $pesanan[0]->tanggal_mulai_belajar ?>

                            </div>
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Status Pesanan</label>

                                &nbsp <?= $pesanan[0]->status_pesanan ?>

                            </div>
                            <div class="form-group row">
                                <label class=" form-control-label col-sm-4 font-weight-bold">Harga</label>

                                &nbsp <?= $pesanan[0]->harga ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Testimoni
                        </div>
                        <div class="card-body">
                            <?php 
                                if (!empty($testi)) {?>
                                <div class="form-group row">
                                    <label class=" form-control-label col-sm-4 font-weight-bold">Rating</label>

                                    &nbsp <?= $testi[0]->rating ?>
                                    <?php for ($i = 0; $i < 5; $i++) {
                                        if ($i < $testi[0]->rating) {
                                            echo '<i class="fa fa-star" aria-hidden="true" style="color:yellow"></i>';
                                        } else {
                                            echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                        }
                                    } ?>

                                </div>
                                <div class="form-group row">
                                    <label class=" form-control-label col-sm-4 font-weight-bold">Testimoni</label>

                                    &nbsp <?= $testi[0]->testimoni ?>

                                </div>
                            <?php } else {
                                if (empty($testimoni)) {  ?>
                                <form action="<?= base_url() ?>pesan/pesananaku/<?= $pesanan[0]->id_pesanan ?>" method="post">
                                    <div class="form-group row">
                                        <label class=" form-control-label col-sm-4 font-weight-bold">Rating</label>

                                        <select required name="rating" id="rating" class="form-control">
                                            <?php for ($i = 1; $i <= 5; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            } ?>
                                        </select>

                                    </div>
                                    <div class="form-group row">
                                        <label class=" form-control-label col-sm-4 font-weight-bold">Testimoni</label>
                                        <textarea required name="testimoni" id="testimoni" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <button class="btn btn-primary btn-block" type="submit">Kirim Testimoni</button>
                                    </div>
                                </form>
                            <?php }else{
                                echo "Berikan lami Testimoni setelah anda menyelesaikan les privat";
                            }} ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>