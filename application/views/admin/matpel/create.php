<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Mata Pelajaran</h1>
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

        <form action="<?= base_url() ?>admin/save_matpel/" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="col-xs-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Mata Pelajaran</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">Mata Pelajaran</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input class="form-control" type="text" name="mata_pelajaran" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 999-99-9999</small> -->
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Create Mata Pelajaran</button>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6">



                </div>
            </div>
        </form>
    </div><!-- .animated -->
</div><!-- .content -->