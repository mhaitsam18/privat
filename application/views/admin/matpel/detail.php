<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Detail Mata Pelajaran</h1>
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
    <?= $this->session->flashdata('message'); ?>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Data Mata Pelajaran</strong>
                    </div>
                    <div class="card-body card-block row">
                        <div class="form-group col-sm-6">
                            <label class=" form-control-label font-weight-bold">Nama Mata Pelajaran &nbsp : </label>
                                &nbsp <?= $matpel->mata_pelajaran ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->