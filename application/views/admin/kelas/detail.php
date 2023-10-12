<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Detail Kelas Privat</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <!-- <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Forms</a></li>
                    <li class="active">Advanced</li>
                </ol>
            </div> -->
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Data Kelas Privat</strong>
                    </div>
                    <div class="card-body card-block row">
                        <div class="form-group col-sm-6">
                            <label class=" form-control-label font-weight-bold">Nama Guru &nbsp : </label>
                                &nbsp <?= $kelas[0]->guru ?>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class=" form-control-label font-weight-bold">Kelas &nbsp : </label>
                                &nbsp <?= $kelas[0]->kelas ?>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class=" form-control-label font-weight-bold">Mata Pelajaran &nbsp : </label>
                                &nbsp <?= $kelas[0]->mata_pelajaran ?>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class=" form-control-label font-weight-bold">Kapasitas &nbsp : </label>
                                &nbsp <?= $kelas[0]->kapasitas ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Siswa</strong>
                    </div>
                    <div class="card-body card-block">
                        <table>
                        <thead>
                            <tr>
                                <th>Nama Siswa</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($siswa as $key) {?> 
                            <tr>
                                <td><?=$key->siswa?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Absensi</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="row">
                        <?php foreach ($siswa as $kuy) {?> 
                            <div class="col-sm-12 p-3">
                            Nama Siswa : <?=$kuy->siswa?><hr>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Pertemuan</th>
                                            <th>Tanggal</th>
                                            <th>Status Jadwal</th>
                                            <th>Jam Presensi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($absen as $key) {
                                        if($kuy->id_siswa == $key->id_siswa){    
                                        ?> 
                                        <tr>
                                            <td><?=$key->pertemuan?></td>
                                            <td><?=$key->tanggal_belajar?> <?=$key->waktu_belajar?></td>
                                            <td><?=$key->status_jadwal?></td>
                                            <td>
                                             <?php   
                                                if($key->waktu_absen != ""){
                                                    echo $key->tanggal_absen." ".$key->waktu_absen;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php }
                                        }?>
                                    </tbody>
                                </table>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->