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

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Data Admin
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?= base_url() ?>profil/update_profil">
                                    <div class="form-group row">
                                        <label class=" form-control-label col-sm-4 font-weight-bold">Nama</label>
                                        <input type="text" class="form-control" name="nama" value="<?= $profil[0]->nama ?>">
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
                    </div>

                    <div class="col-md-6">
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
</div>

<script>
    $(document).ready(function() {
        $("#pil-bidang-1").val('<?= $profil[0]->bidang_yang_dikuasai ?>')
        $("#pil-bidang-2").val(<?= $profil[0]->bidang_yang_dikuasai_2 ?>)
    })
</script>