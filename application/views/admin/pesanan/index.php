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
                        <!-- <a href="<?= base_url() ?>admin/create_pesanan/" class="btn btn-primary mb-4 align-right">Create</a> -->
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-responsive text-small">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Siswa</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Guru</th>
                                    <th>Kapasitas</th>
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
                                        <td><?= $key->kelas ?></td>
                                        <td><?= $key->guru ?></td>
                                        <td><?= $key->jumlah_siswa ?></td>
                                        <td><?= $key->status_pesanan ?></td>
                                        <td>
                                            <?php 
                                                if($key->metode_pembayaran == "Cash"){
                                                    echo $key->metode_pembayaran;
                                                }else{
                                                    if($key->foto_pembayaran != ""){
                                                        echo $key->metode_pembayaran;
                                                        ?>
                                                        <!-- <a href="<?=base_url('bukti_pembayaran/'.$key->foto_pembayaran)?>" target="_blank" class="btn btn-secondary btn-sm">lihat</a> -->
                                                        <?php
                                                    }
                                                }
                                            ?>
                                            <a href="<?= base_url('Admin/pembayaran/'.$key->id_pesanan) ?>" class="badge badge-info">Cek Pembayaran</a>
                                        </td>
                                        <td>
                                            <?= $key->status_pembayaran ?>
                                            <?php if ($key->status_pembayaran != "Sudah konfimasi") { ?>
                                                <div class="dropdown show">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Konfirmasi
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="<?= base_url() ?>admin/konfirmasi/<?= $key->id_pesanan ?>/1">Sudah Konfrimasi</a>
                                                        <a class="dropdown-item" href="<?= base_url() ?>admin/konfirmasi/<?= $key->id_pesanan ?>/2">Belum Konfirmasi</a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                        <?php if ($key->is_created == 0) {?>
                                            <a class="btn btn-primary btn-sm text-white" href="<?= base_url() ?>admin/create_kelas/<?= $key->id_pesanan ?>"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-success btn-sm text-white" href="<?= base_url() ?>admin/tambah_kelasku/<?= $key->id_pesanan ?>"><i class="fa fa-plus"></i></a>
                                        <?php } ?>
                                            <a class="btn btn-secondary btn-sm text-white" href="<?= base_url() ?>admin/pesananku/<?= $key->id_pesanan ?>"><i class="fa fa-eye"></i></a>
                                            <!-- <a class="btn btn-warning btn-sm text-white" href="<?= base_url() ?>admin/edit_pesanan/<?= $key->id_pesanan ?>"><i class="fa fa-pencil"></i></a> -->
                                            <a class="btn btn-danger btn-sm text-white" onclick="delete_pesanan(<?= $key->id_pesanan ?>)"><i class="fa fa-trash"></i></a>
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
        var conf = confirm("Apakah anda yakin menghapus mata pelajaran?")
        if (conf == true) {
            window.location.href = "<?= base_url() ?>admin/delete_pesanan/" + id
        }
    }
</script>