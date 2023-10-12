<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Jadwal Les Privat</h2>
                <!-- <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Inner Page</li>
                </ol> -->
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
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
                                        <th>Kode Pesanan</th>
                                        <th>Pertemuan</th>
                                        <!-- <th>Siswa</th> -->
                                        <th>Matpel</th>
                                        <th>Kelas</th>
                                        <th>Tanggal Belajar</th>
                                        <th>Status Jadwal</th>
                                        <th>Guru</th>
                                        <th>Status Absen</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jadwal as $key) { ?>
                                        <tr>
                                            <td><?= $key->kode_pesanan ?></td>
                                            <td><?= $key->pertemuan ?></td>
                                            <td><?= $key->mata_pelajaran ?></td>
                                            <td><?= $key->kelas ?></td>
                                            <td><?= $key->hari . ', ' . date('d M Y',strtotime($key->tanggal_belajar)) . ' ' . $key->waktu_belajar ?></td>
                                            <td><?= $key->status_jadwal ?></td>
                                            <td><?= $key->guru ?></td>
                                            <td>
                                                <?php
                                                if ($key->waktu_absen == "") {
                                                    echo "";
                                                } else {
                                                    echo "Hadir " . $key->waktu_absen;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?php if($key->waktu_absen == ""){?>
                                                <a class="btn btn-secondary btn-sm" href="<?= base_url() ?>kelas/ubah_jadwal/<?= $key->id_jadwal ?>">Ganti jadwal</a>
                                                <!-- <a class="btn btn-warning btn-sm" href="<?= base_url() ?>admin/jadwalku/<?= $key->id_jadwal ?>"><i class="fa fa-pen"></i></a>
                                                <a class="btn btn-danger btn-sm" href="<?= base_url() ?>admin/jadwalku/<?= $key->id_jadwal ?>"><i class="fa fa-trash"></i></a> -->
                                            <?php }?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
</main>