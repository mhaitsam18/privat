<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Detail siswa <h1>
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
            <div class="col-xs-6 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Data Diri</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label class=" form-control-label">Nama</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                &nbsp <?= $siswa->siswa ?>
                            </div>
                            <small class="form-text text-muted">ex. 999-99-9999</small>
                        </div>
                        <!-- <div class="form-group">
                            <label class=" form-control-label">Tanggal Lahir</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                &nbsp <?= $siswa->tanggal_lahir ?>
                            </div>
                            <small class="form-text text-muted">ex. 99/99/9999</small>
                        </div> -->
                        <div class="form-group">
                            <label class=" form-control-label">No Hp</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                &nbsp <?= $siswa->no_hp ?>
                            </div>
                            <small class="form-text text-muted">ex. (999) 999-9999</small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Email</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                &nbsp <?= $siswa->email ?>
                            </div>
                            <small class="form-text text-muted">ex. 99-9999999</small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Jenis Kelamin</label>
                            <div class="input-group">
                                &nbsp <?= $siswa->jenis_kelamin ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Alamat</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                &nbsp <?= $siswa->alamat ?>
                            </div>
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Foto</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-photo"></i></div>
                                <img class="img img-thumbnail" style="width:300px;height:auto" src="<?= base_url() ?>foto/<?= $siswa->foto ?>">
                            </div>
                            <small class="form-text text-muted"></small>
                        </div>
                        <!-- <div class="form-group">
                            <label class=" form-control-label">Bank</label>
                            <div class="input-group">
                            &nbsp <?= $siswa->bank ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Nomor Rekening</label>
                            <div class="input-group">
                                <div class="input-group-addon"></div>
                                &nbsp <?= $siswa->rekening ?>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Pendidikan</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class=" form-control-label">Tingkat</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                &nbsp <?= $siswa->tingkat ?>
                            </div>
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Nama Sekolah</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                &nbsp <?= $siswa->asal_sekolah ?>
                            </div>
                            <small class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->