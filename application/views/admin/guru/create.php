<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Guru</h1>
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

        <form action="<?= base_url() ?>admin/save_guru/" method="POST" enctype="multipart/form-data">
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
                                    <input class="form-control" type="text" name="nama" required>
                                </div>
                                <small class="form-text text-muted">ex. 999-99-9999</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Lahir</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input class="form-control" type="date" name="tanggal_lahir" required>
                                </div>
                                <small class="form-text text-muted">ex. 99/99/9999</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">No Hp</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                    <input class="form-control" type="text" name="no_hp" required>
                                </div>
                                <small class="form-text text-muted">ex. (999) 999-9999</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Email</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                    <input class="form-control" type="email" name="email" required>
                                </div>
                                <small class="form-text text-muted">ex. 99-9999999</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Jenis Kelamin</label>
                                <div class="input-group">
                                    <select name="jenis_kelamin" required data-placeholder="Jenis Kelamin..." class="form-control" tabindex="1">
                                        <option value=""></option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Pendidikan Terakhir</label>
                                <div class="input-group">
                                    <select name="pendidikan_terakhir" required data-placeholder="Pendidikan Terakhir" class="form-control" tabindex="1">
                                        <option value=""></option>
                                        <option value="SMA/SMK">SMA/SMK</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Sarjana">Sarjana</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Alamat</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                    <textarea class="form-control" name="alamat" required></textarea>
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Foto</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-photo"></i></div>
                                    <input class="form-control" name="foto" type="file" required>
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Bank</label>
                                <div class="input-group">
                                    <select name="bank" required data-placeholder="Bank" class="form-control" tabindex="1">
                                        <option value=""></option>
                                        <option value="BRI">BRI</option>
                                        <option value="BNI">BNI</option>
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="BCA">BCA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Nomor Rekening</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                    <input class="form-control" type="text" name="rekening" required>
                                </div>
                                <small class="form-text text-muted">ex. 999999999</small>
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
                                    <input class="form-control" name="institusi" type="text" required>
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Program Studi</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input class="form-control" name="prodi" type="text" required>
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">IPK</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input class="form-control" name="ipk" type="number" step="any" required>
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">
                                Bidang
                            </strong>
                            <button id="add_bidang" class="btn btn-sm btn-warning">Tambah Bidang</button>
                        </div>
                        <div class="card-body bidang">
                            <div class="form-group">
                                <label>Bidang yang dikuasai</label>
                                <select name="bidang[]" required class="form-control" data-placeholder="pilih bidang..." class="standardSelect" tabindex="1">
                                    <option value=""></option>
                                    <?php foreach ($matpel as $key) { ?>
                                        <option value="<?= $key->id_mp ?>"><?= $key->mata_pelajaran ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bidang yang dikuasai</label>
                                <select name="bidang[]" required class="form-control" data-placeholder="pilih bidang..." class="standardSelect" tabindex="1">
                                    <option value=""></option>
                                    <?php foreach ($matpel as $key) { ?>
                                        <option value="<?= $key->id_mp ?>"><?= $key->mata_pelajaran ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Scan KTP</strong>
                        </div>
                        <div class="card-body">

                            <input type="file" class="form-control" required name="ktp">

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Scan Ijazah Terakhir</strong>
                        </div>
                        <div class="card-body">

                            <input type="file" class="form-control" required name="ijazah">

                        </div>
                    </div>

                    <button class="btn btn-primary btn-block" type="submit">Create Guru</button>

                </div>
            </div>
        </form>
    </div><!-- .animated -->
</div><!-- .content -->
<script>
    $("#add_bidang").click(function() {
        // console.log("zzz");
        event.preventDefault();
        var _html = `<div class="form-group">
							<label>Bidang yang dikuasai <button class="btn btn-sm btn-danger" id="delete_bidang">hapus</button></label>
							<select name="bidang[]" required class="form-control" data-placeholder="pilih bidang..." class="standardSelect" tabindex="1">
								<option value=""></option>
								<?php foreach ($matpel as $key) { ?>
									<option value="<?= $key->id_mp ?>"><?= $key->mata_pelajaran ?></option>
								<?php } ?>
							</select>
						</div>`;
        $(".bidang").append(_html);
    });
    $(document).on("click", '#delete_bidang', function() {
        event.preventDefault();
        $(this).parent().parent().remove();
    });
</script>