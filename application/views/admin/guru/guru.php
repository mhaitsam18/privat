<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Guru</h1>
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
                        <a href="<?= base_url() ?>admin/create_guru/" class="btn btn-primary mb-4 align-right">Create</a>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($guru as $key) { ?>
                                    <tr>
                                        <td><?= $key->guru ?></td>
                                        <td><?= $key->email ?></td>
                                        <td><?= $key->no_hp ?></td>
                                        <td><?= $key->status ?></td>
                                        <td>
                                            <?php if ($key->status == "Waiting") { ?>
                                                <a class="btn btn-success btn-sm" href="<?= base_url() ?>admin/approve_guruku/approve/<?= $key->id_guru ?>"><i class="fa fa-check"></i></a>
                                                <a class="btn btn-warning btn-sm" href="<?= base_url() ?>admin/approve_guruku/no/<?= $key->id_guru ?>"><i class="fa fa-times"></i></a>
                                            <?php } ?>
                                            <a class="btn btn-secondary btn-sm" href="<?= base_url() ?>admin/guruku/<?= $key->id_guru ?>"><i class="fa fa-eye"></i></a>
                                            <!-- <a class="btn btn-warning btn-sm" href="<?= base_url() ?>admin/guruku/<?= $key->id_guru ?>"><i class="fa fa-pencil"></i></a> -->
                                            <a class="btn btn-danger btn-sm text-white" onclick="delete_guru(<?= $key->id_guru ?>)"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<script>
    function delete_guru(id) {
        var con = confirm("Yakin akan menghapus akun guru?")
        if (con == true) {
            window.location.href = '<?= base_url() ?>admin/delete_guru/' + id
        }
    }
</script>