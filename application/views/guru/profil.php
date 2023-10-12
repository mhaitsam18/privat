<div class="breadcrumbs">
    <div class="col-sm-4 font-weight-bold">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Profil</h1>
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
            <div class="col-md-12">
                <div class="row">

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                Data Guru
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?= base_url() ?>profil/update_profil" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class=" form-control-label ">Nama</label>
                                        <input type="text" class="form-control" name="nama" value="<?= $profil[0]->guru ?>">
                                    </div>
                                    <div class="form-group" data-validate="Valid email is required: ex@abc.xyz">
                                        <label class=" form-control-label ">Jenis Kelamin</label>
                                        <select id="pil-kelamin" name="jenis_kelamin" class="form-control" style="height: 60px;" required>
                                            <option value="" disabled>Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <span class="focus-input100-1"></span>
                                        <span class="focus-input100-2"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label ">Email</label>
                                        <input disabled type="text" class="form-control" name="email" value="<?= $profil[0]->email ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label ">No HP</label>
                                        <input type="text" class="form-control" name="no_hp" value="<?= $profil[0]->no_hp ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label ">Institusi</label>

                                        <input class="form-control" name="institusi" type="text" value="<?= $profil[0]->institusi ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label ">Program Studi</label>

                                        <input class="form-control" name="prodi" type="text" value="<?= $profil[0]->program_studi ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label ">IPK</label>

                                        <input class="form-control" name="ipk" type="number" step="any" value="<?= $profil[0]->ipk ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label ">Alamat</label>
                                        <textarea class="form-control" name="alamat"><?= $profil[0]->alamat ?></textarea>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">
                                                Bidang
                                            </strong>
                                            <button id="add_bidang" class="btn btn-sm btn-warning">Tambah Bidang</button>
                                        </div>
                                        <div class="card-body bidang">
                                            <?php for ($i = 0; $i < count($bidang); $i++) { ?>
                                                <div class="form-group">
                                                    <label class="form-control-label">Bidang yang dikuasai <button class="btn btn-sm btn-danger" id="delete_bidang">hapus</button></label>
                                                    <select id="pil-bidang-1" name="bidang[]" required data-placeholder="pilih bidang..." class="form-control" tabindex="1">
                                                        <option value=""></option>
                                                        <?php foreach ($matpel as $key) { ?>
                                                            <option value="<?= $key->id_mp ?>" <?= ($bidang[$i]->id_matpel == $key->id_mp) ? 'selected' : '' ?>><?= $key->mata_pelajaran ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <img class="img img-thumbnail" src="<?= base_url() ?>foto/<?= $profil[0]->ktp ?>">
                                    <div class="form-group">
                                        <label class=" form-control-label ">Foto KTP</label>
                                        <input type="file" class="form-control" name="ktp">
                                    </div>
                                    <img class="img img-thumbnail" src="<?= base_url() ?>foto/<?= $profil[0]->ijazah ?>">
                                    <div class="form-group">
                                        <label class=" form-control-label ">Foto Ijazah</label>
                                        <input type="file" class="form-control" name="ijazah">
                                    </div>
									<div class="form-group">
										<label class=" form-control-label">Bank</label>
										<div class="input-group">
											<select name="bank" id="input-bank" required data-placeholder="Bank" class="form-control" tabindex="1">
												<option value="" selected disabled>Pilih Bank</option>
                                                <?php foreach ($bank as $b): ?>
                                                    <?php if ($b->id_bank == $profil[0]->bank): ?>
                                                        <option value="<?= $b->id_bank ?>" selected><?= $b->bank ?></option>
                                                    <?php else: ?>
                                                        <option value="<?= $b->id_bank ?>"><?= $b->bank ?></option>
                                                    <?php endif ?>
                                                <?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class=" form-control-label">Nomor Rekening</label>
										<div class="input-group">
											<div class="input-group-addon"></div>
											<input class="form-control" value="<?=$profil[0]->rekening?>" type="text" name="rekening" required>
										</div>
										<small class="form-text text-muted">ex. 999999999</small>
									</div>

                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" type="submit">Update Profil</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                Foto Profil
                            </div>
                            <div class="card-body">
                                <img class="img img-thumbnail" src="<?= base_url() ?>foto/<?= $profil[0]->foto ?>">
                                <form method="post" action="<?= base_url() ?>profil/update_foto" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class=" form-control-label ">Foto Profil</label>
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" type="submit">Update Foto Profil</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Akun
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?= base_url() ?>profil/update_username">
                                    <div class="form-group">
                                        <label class=" form-control-label ">Username</label>
                                        <input type="text" class="form-control" name="new_username" value="<?= $profil[0]->username ?>" ?>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" type="submit">Update Username</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Akun
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?= base_url() ?>profil/update_password">
                                    <div class="form-group">
                                        <label class=" form-control-label ">Password</label>
                                        <input type="password" class="form-control" name="old_password" placeholder="old password">
                                        <input type="password" class="form-control" name="new_password" placeholder="new password">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" type="submit">Update Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#pil-bank").val('<?= $profil[0]->bank ?>')
    //     $("#pil-bidang-2").val(<?= $profil[0]->bidang_yang_dikuasai_2 ?>)
    });
    $("#add_bidang").click(function() {
        // console.log("zzz");
        event.preventDefault();
        var _html = `<div class="form-group">
							<label class="form-control-label">Bidang yang dikuasai <button class="btn btn-sm btn-danger" id="delete_bidang">hapus</button></label>
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