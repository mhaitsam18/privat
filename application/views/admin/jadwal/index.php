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
                        <!-- <a href="<?=base_url()?>admin/create_guru/" class="btn btn-primary mb-4 align-right">Create</a> -->
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Pesanan</th>
                                    <th>Pertemuan</th>
                                    <th>Siswa</th>
                                    <th>Matpel</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Belajar</th>
                                    <th>Status Jadwal</th>
                                    <th>Guru</th>
                                    <th>Status Absen</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php  foreach($jadwal as $key){?>
                                <tr>
                                    <td><?=$key->kode_pesanan?></td>
                                    <td><?=$key->pertemuan?></td>
                                    <td><?=$key->siswa?></td>
                                    <td><?=$key->mata_pelajaran?></td>
                                    <td><?=$key->kelas?></td>
                                    <td><?=$key->hari.', '.$key->tanggal_belajar.' '.$key->waktu_belajar?></td>
                                    <td><?=$key->status_jadwal?></td>
                                    <td><?=$key->guru?></td>
                                    <td>
                                        <?php 
                                        if($key->waktu_absen == "") {
                                            echo "";
                                        }else{
                                            echo "Hadir ".$key->waktu_absen;
                                        }
                                        ?>
                                    </td>
                                    <!-- <td>
                                        <a class="btn btn-secondary btn-sm" href="<?=base_url()?>admin/jadwalku/<?=$key->id_jadwal?>"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-warning btn-sm" href="<?=base_url()?>admin/jadwalku/<?=$key->id_jadwal?>"><i class="fa fa-pen"></i></a>
                                        <a class="btn btn-danger btn-sm" href="<?=base_url()?>admin/jadwalku/<?=$key->id_jadwal?>"><i class="fa fa-trash"></i></a>
                                    </td> -->
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