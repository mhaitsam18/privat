<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Detail Harga</h1>
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
                        <strong>Detail Harga</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label class=" form-control-label">Harga</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                &nbsp <?= $harga[0]->harga ?>
                            </div>
                            <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Kelas</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                &nbsp <?= $harga[0]->kelas ?>
                            </div>
                            <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Mata Pelajaran</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                &nbsp <?= $harga[0]->mata_pelajaran ?>
                            </div>
                            <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6">



            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<script>
    $(document).ready(function(){
        $("#pil-mp").val(<?=$harga[0]->id_mp?>)
        $("#pil-kelas").val(<?=$harga[0]->id_kelas?>)
    })
</script>