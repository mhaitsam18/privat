<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Profil Saya</h2>
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
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Data Siswa
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?= base_url() ?>profil/update_profil">
                                        <div class="form-group row">
                                            <label class=" form-control-label col-sm-4 font-weight-bold">Nama</label>
                                            <input type="text" class="form-control" name="nama" value="<?= $profil[0]->siswa ?>" >
                                        </div>
                                        <div class="form-group row" data-validate="Valid email is required: ex@abc.xyz">
                                            <label class=" form-control-label col-sm-4 font-weight-bold">Jenis Kelamin</label>
                                            <select id="pil-kelamin" name="jenis_kelamin" class="form-control" style="height: 60px;" required>
                                                <option value="" disabled>Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <span class="focus-input100-1"></span>
                                            <span class="focus-input100-2"></span>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" form-control-label col-sm-4 font-weight-bold">Email</label>
                                            <input disabled type="text" class="form-control" name="email" value="<?= $profil[0]->email ?>" >
                                        </div>
                                        <div class="form-group row">
                                            <label class=" form-control-label col-sm-4 font-weight-bold">No HP</label>
                                            <input type="text" class="form-control" name="no_hp" value="<?= $profil[0]->no_hp ?>" >
                                        </div>
                                        <div class="form-group row">
                                            <label class=" form-control-label col-sm-4 font-weight-bold">Kode Pos</label>
                                            <input type="text" class="form-control" name="kode_pos" value="<?= $profil[0]->kode_pos ?>" >
                                        </div>
                                        <div class="form-group row">
                                            <label class=" form-control-label col-sm-4 font-weight-bold">Tingkat</label>
                                            <select id="pil-tingkat" name="tingkat" class="form-control" style="height: 60px;" required placeholder="Tingkat Pendidikan">
                                                <option value="" disabled>Pilih Tingkat Pendidikan</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA">SMA</option>
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" form-control-label col-sm-4 font-weight-bold">Asal Sekolah</label>
                                            <input type="text" class="form-control" name="nama" value="<?= $profil[0]->asal_sekolah ?>" >
                                        </div>
                                        <div class="form-group row">
                                            <label class=" form-control-label col-sm-4 font-weight-bold">Alamat</label>
                                            <textarea class="form-control" name="alamat"><?= $profil[0]->alamat ?></textarea>
                                        </div>
                                        <div class="form-group row">
                                            <button class="btn btn-primary btn-block" type="submit">Update Profil</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Foto Profil
                                </div>
                                <div class="card-body">
                                    <img class="img img-thumbnail" src="<?=base_url()?>foto/<?=$profil[0]->foto?>">
                                    <form method="post" action="<?= base_url() ?>profil/update_foto" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class=" form-control-label col-sm-4 font-weight-bold">Foto Profil</label>
                                            <input type="file" class="form-control" name="foto">
                                        </div>
                                        <div class="form-group row">
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
                                        <div class="form-group row">
                                            <label class=" form-control-label col-sm-4 font-weight-bold">Username</label>
                                            <input type="text" class="form-control" name="new_username" value="<?= $profil[0]->username ?>" ?>
                                        </div>
                                        <div class="form-group row">
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
                                        <div class="form-group row">
                                            <label class=" form-control-label col-sm-4 font-weight-bold">Password</label>
                                            <input type="password" class="form-control" name="old_password" placeholder="old password">
                                            <input type="password" class="form-control" name="new_password" placeholder="new password">
                                        </div>
                                        <div class="form-group row">
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
    </section>
</main>

<script>
    $(document).ready(function() {
        $("#pil-kelamin").val('<?= $profil[0]->jenis_kelamin ?>')
        $("#pil-tingkat").val('<?= $profil[0]->tingkat ?>')
    })
</script>