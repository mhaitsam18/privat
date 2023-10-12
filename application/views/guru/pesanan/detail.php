<div class="breadcrumbs">
    <div class="col-sm-4 font-weight-bold">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Pesanan Les Privat</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <!-- <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div> -->
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
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

        </div>
    </div>
</div>