<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Harga</h1>
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
                <div class="card">
                    <!-- <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div> -->
                    <div class="card-body">
                        <a href="<?=base_url()?>admin/create_harga/" class="btn btn-primary mb-4 align-right">Create</a>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Mata pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  foreach($harga as $key){?>
                                <tr>
                                    <td><?=$key->mata_pelajaran?></td>
                                    <td><?=$key->kelas?></td>
                                    <td><?=$key->harga?></td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm text-white" href="<?=base_url()?>admin/hargaku/<?=$key->id_harga?>"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-warning btn-sm text-white" href="<?=base_url()?>admin/edit_harga/<?=$key->id_harga?>"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger btn-sm text-white" onclick="delete_harga(<?=$key->id_harga?>)"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<script>
    function delete_harga(id){
        var conf = confirm("Apakah anda yakin menghapus mata pelajaran?")
        if(conf == true){
            window.location.href = "<?=base_url()?>admin/delete_harga/"+id
        }
    }
</script>