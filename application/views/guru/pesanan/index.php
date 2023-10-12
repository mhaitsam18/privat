<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Pesanan Les Privat</h1>
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
                        <!-- <a href="<?= base_url() ?>guru/create_pesanan/" class="btn btn-primary mb-4 align-right">Create</a> -->
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Siswa</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Status Pesanan</th>
                                    <th>Status Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pesanan as $key) { ?>
                                    <tr>
                                        <td><?= $key->kode_pesanan ?></td>
                                        <td><?= $key->tanggal_pesanan ?></td>
                                        <td><?= $key->siswa ?></td>
                                        <td><?= $key->mata_pelajaran ?></td>
                                        <td>
                                            <?= $key->status_pesanan ?>
                                            <?php if ($key->status_pesanan == "Guru Belum Konfirmasi") { ?>
                                                <div class="dropdown show">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Konfirmasi
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="<?=base_url()?>guru/konfirmasi/<?=$key->id_pesanan?>/1">Terima</a>
                                                        <a class="dropdown-item" href="<?=base_url()?>guru/konfirmasi/<?=$key->id_pesanan?>/2">Tolak</a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if($key->metode_pembayaran == "Cash"){
                                                    echo $key->metode_pembayaran;
                                                }else{
                                                    if($key->foto_pembayaran != ""){
                                                        echo $key->metode_pembayaran;
                                                        ?>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                            <a href="<?= base_url('Guru/pembayaran/'.$key->id_pesanan) ?>" class="badge badge-info">Cek Pembayaran</a>
                                        </td>
                                        <!-- <td><?= $key->status_pembayaran ?></td> -->
                                        <td>
                                            <a class="btn btn-secondary btn-sm text-white" href="<?= base_url() ?>guru/pesananku/<?= $key->id_mp ?>"><i class="fa fa-eye"></i></a>
                                            <!-- <a class="btn btn-warning btn-sm text-white" href="<?= base_url() ?>guru/edit_pesanan/<?= $key->id_mp ?>"><i class="fa fa-pencil"></i></a> -->
                                            <a class="btn btn-danger btn-sm text-white" onclick="delete_pesanan(<?= $key->id_mp ?>)"><i class="fa fa-trash"></i></a>
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
    function delete_pesanan(id) {
        var conf = confirm("Apakah anda yakin menghapus mata pesanan?")
        if (conf == true) {
            window.location.href = "<?= base_url() ?>guru/delete_pesanan/" + id
        }
    }
</script>