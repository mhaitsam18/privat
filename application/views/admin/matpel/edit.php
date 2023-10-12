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
                        <strong>Edit Mata Pelajaran</strong>
                    </div>
                    <div class="card-body">
                    	<div class="col-md-6">
	                        <form action="<?= base_url('Admin/update_matpel') ?>" method="post">
	                        	<input type="hidden" name="id_mp" id="id_mp" value="<?= $matpel->id_mp ?>">
	                        	<div class="form-group">
	                        		<label for="mata_pelajaran">Mata Pelajaran</label>
	                        		<input type="text" name="mata_pelajaran" id="mata_pelajaran" class="form-control" value="<?= $matpel->mata_pelajaran ?>">
	                        	</div>
	                        	<button type="submit" class="btn btn-outline-primary float-right">Simpan</button>
	                        </form>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->