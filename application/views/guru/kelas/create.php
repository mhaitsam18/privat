<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Kelas Privat</h1>
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

        <form action="<?= base_url() ?>admin/tambah_kelasku/" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="col-xs-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Data Kelas Privat</strong>
                        </div>
                        <div class="card-body card-block">
                        <input type="hidden" name="pesanan" value="<?=$id?>">
                            <div class="form-group">
                                <label class=" form-control-label">Kelas Privat</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <select name="private" class="form-control select2" required>
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        <?php foreach ($kelas as $key) { ?>
                                            <option value="<?= $key->id_privat ?>"><?= $key->id_privat ?> - <?= $key->guru ?> - Kelas <?=$key->kelas?> - <?=$key->mata_pelajaran?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Tambah ke Kelas</button>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6">



                </div>
            </div>
        </form>
    </div><!-- .animated -->
</div><!-- .content -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('select').select2();
    })
</script>