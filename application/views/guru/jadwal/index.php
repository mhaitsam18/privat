<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Jadwal</h1>
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
                        <!-- <a href="<?= base_url() ?>admin/create_guru/" class="btn btn-primary mb-4 align-right">Create</a> -->
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Pertemuan</th>
                                    <th>Matpel</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Belajar</th>
                                    <th>Status Jadwal</th>
                                    <th>Status Absen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jadwal as $key) { ?>
                                    <tr>
                                        <td><?= $key->pertemuan ?></td>
                                        <td><?= $key->mata_pelajaran ?></td>
                                        <td><?= $key->kelas ?></td>
                                        <td><?= $key->hari . ', ' . $key->tanggal_belajar . ' ' . $key->waktu_belajar ?></td>
                                        <td><?= $key->status_jadwal ?></td>
                                        <td>
                                            <?php
                                            if ($key->waktu_absen == "") {
                                                echo "";
                                            } else {
                                                echo "Hadir " . $key->tanggal_absen." ".$key->waktu_absen;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($key->status_jadwal == "Usulan Ganti") { ?>
                                                <div class="dropdown show">
                                                    <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Konfirmasi Ganti Jadwal
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="<?= base_url() ?>guru/konfirmasi_jadwal/<?= $key->id_absen ?>/1">Ganti</a>
                                                        <a class="dropdown-item" href="<?= base_url() ?>guru/konfirmasi_jadwal/<?= $key->id_absen ?>/2">Tidak Ganti</a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <a class="btn btn-secondary btn-sm" href="<?= base_url() ?>kelas/ubah_jadwal/<?= $key->id_jadwal ?>/guru">Ganti jadwal</a>
                                            <!-- <a class="btn btn-secondary btn-sm" href="<?= base_url() ?>admin/jadwalku/<?= $key->id_jadwal ?>"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-warning btn-sm" href="<?= base_url() ?>admin/jadwalku/<?= $key->id_jadwal ?>"><i class="fa fa-pen"></i></a>
                                            <a class="btn btn-danger btn-sm" href="<?= base_url() ?>admin/jadwalku/<?= $key->id_jadwal ?>"><i class="fa fa-trash"></i></a> -->
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