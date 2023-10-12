<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Detail Guru</h1>
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
                                &nbsp <?= $guru[0]->guru ?>
                            </div>
                            <small class="form-text text-muted">ex. 999-99-9999</small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Tanggal Lahir</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                &nbsp <?= $guru[0]->tanggal_lahir ?>
                            </div>
                            <small class="form-text text-muted">ex. 99/99/9999</small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">No Hp</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                &nbsp <?= $guru[0]->no_hp ?>
                            </div>
                            <small class="form-text text-muted">ex. (999) 999-9999</small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Email</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                &nbsp <?= $guru[0]->email ?>
                            </div>
                            <small class="form-text text-muted">ex. 99-9999999</small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Jenis Kelamin</label>
                            <div class="input-group">
                                &nbsp <?= $guru[0]->jenis_kelamin ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Alamat</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                &nbsp <?= $guru[0]->alamat ?>
                            </div>
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Foto</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-photo"></i></div>
                                <img class="img img-thumbnail" style="width:300px;height:auto" src="<?= base_url() ?>foto/<?= $guru[0]->foto ?>">
                            </div>
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Bank</label>
                            <div class="input-group">
                            &nbsp <?= $guru[0]->bank ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Nomor Rekening</label>
                            <div class="input-group">
                                <div class="input-group-addon"></div>
                                &nbsp <?= $guru[0]->rekening ?>
                            </div>
                        </div>
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
                            <label class=" form-control-label">Institusi</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                &nbsp <?= $guru[0]->institusi ?>
                            </div>
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Program Studi</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                &nbsp <?= $guru[0]->program_studi ?>
                            </div>
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">IPK</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                &nbsp <?= $guru[0]->ipk ?>
                            </div>
                            <small class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Bidang yang dikuasai 1</strong>
                    </div>
                    <div class="card-body">
                        &nbsp
                        <?php
                        foreach ($matpel as $key) {
                            if ($guru[0]->bidang_yang_dikuasai == $key->id_mp) {
                                echo $key->mata_pelajaran;
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Bidang yang dikuasai 2</strong>
                    </div>
                    <div class="card-body">
                        &nbsp
                        <?php
                        foreach ($matpel as $key) {
                            if ($guru[0]->bidang_yang_dikuasai_2 == $key->id_mp) {
                                echo $key->mata_pelajaran;
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">KTP</strong>
                    </div>
                    <div class="card-body">
                        &nbsp
                        <a href="<?= base_url() ?>foto/<?= $guru[0]->ktp ?>" target="_blank" class="btn btn-secondary">Lihat</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">IJAZAH</strong>
                    </div>
                    <div class="card-body">
                        &nbsp
                        <a href="<?= base_url() ?>foto/<?= $guru[0]->ijazah ?>" target="_blank" class="btn btn-secondary">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->