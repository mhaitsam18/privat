<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Siswa</h1>
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
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tingkat</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php  foreach($siswa as $key){?>
                                <tr>
                                    <td><?=$key->siswa?></td>
                                    <td><?=$key->tingkat?></td>
                                    <td><?=$key->email?></td>
                                    <td><?=$key->no_hp?></td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm text-white" href="<?=base_url()?>admin/siswaku/<?=$key->id_siswa?>"><i class="fa fa-eye"></i></a>
                                        <!-- <a class="btn btn-danger btn-sm text-white" onclick="delete_siswa(<?=$key->id_siswa?>)"><i class="fa fa-trash"></i></a> -->
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
    function delete_siswa(id){
        var con = confirm("Yakin akan menghapus akun siswa?")
        if(con == true){
            window.location.href = '<?=base_url()?>admin/delete_siswa/'+id
        }
    }
</script>