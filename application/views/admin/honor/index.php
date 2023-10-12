<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Honor</h1>
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
                                    <th>Nama Guru</th>
                                    <th>Pertemuan</th>
                                    <th>Matpel</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Belajar</th>
                                    <th>Status Absen</th>
                                    <th>Honor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total=0;foreach ($honor as $key) { ?>
                                    <tr>
                                        <td><?= $key->guru ?></td>
                                        <td><?= $key->pertemuan ?></td>
                                        <td><?= $key->mata_pelajaran ?></td>
                                        <td><?= $key->kelas ?></td>
                                        <td><?= $key->hari . ', ' . $key->tanggal_belajar . ' ' . $key->waktu_belajar ?></td>
                                        <td>
                                            <?php
                                            if ($key->waktu_absen == "") {
                                                echo "";
                                            } else {
                                                $total += $key->harga;
                                                echo "Hadir " . $key->tanggal_absen." ".$key->waktu_absen;
                                            }
                                            ?>
                                        </td>
                                            <td><?= $key->harga ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <hr>
                        <div class="float-right"> Total Honor : Rp. <?=$total?></div>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->