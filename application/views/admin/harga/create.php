<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Harga</h1>
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

        <form action="<?= base_url() ?>admin/save_harga/" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="col-xs-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Data Diri</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">Harga</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input class="form-control" type="number" name="harga" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Kelas</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <select name="kelas" class="form-control" required>
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        <?php foreach ($kelas as $key) { ?>
                                            <option value="<?= $key->id_kelas ?>"><?= $key->kelas ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Mata Pelajaran</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <select name="mata_pelajaran" class="form-control" required>
                                        <option value="" disabled selected>Pilih mata pelajaran</option>
                                        <?php foreach ($matpel as $key) { ?>
                                            <option value="<?= $key->id_mp ?>"><?= $key->mata_pelajaran ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Create Harga</button>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6">



                </div>
            </div>
        </form>
    </div><!-- .animated -->
</div><!-- .content -->