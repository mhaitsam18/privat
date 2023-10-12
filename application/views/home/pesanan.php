<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Pesanan Les Privat</h2>
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
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Tanggal</th>
                                        <th>Guru</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Status Pesanan</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Total Tagihan</th>
                                        <!-- <th>Status Pembayaran</th> -->
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pesanan as $key) { ?>
                                        <tr>
                                            <td><?= $key->kode_pesanan ?></td>
                                            <td><?= $key->tanggal_pesanan ?></td>
                                            <td><?= $key->guru ?></td>
                                            <td><?= $key->mata_pelajaran ?></td>
                                            <td>Di <?= $key->status_pesanan ?></td>
                                            <td><?= $key->metode_pembayaran ?></td>
                                            <td>Rp. <?= number_format($key->harga, 2, ',', '.').' x '.$key->jumlah_pertemuan. ' pertemuan = Rp. '.number_format($key->harga*$key->jumlah_pertemuan, 2, ',', '.'); ?></td>
                                            <!-- <td><?php
                                                if ($key->status_pesanan == "Terima") {
                                                    if ($key->status_pembayaran == "Belum bayar") {
                                                        if ($key->metode_pembayaran == "Transfer") {
                                                ?>
                                                    <button data-id="<?=$key->id_pesanan?>" class="btn btn-primary btn-sm" id="btn_upload">Upload</button>
                                                <?php
                                                        } else {
                                                            echo $key->metode_pembayaran;
                                                        }
                                                    } else {
                                                        echo $key->status_pembayaran;
                                                    }
                                                }
                                                $key->status_pembayaran ?></td> -->
                                            <td>
                                                <div class="row">
                                                    <a class="btn btn-secondary btn-sm text-white mr-2" href="<?= base_url() ?>pesan/pesananku/<?= $key->id_pesanan ?>" title="Detail"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" href="<?= base_url() ?>pesan/pembayaran/<?= $key->id_pesanan ?>" title="Pembayaran"><i class="far fa-credit-card"></i></a>
                                                    
                                                </div>
                                                <!-- <a class="btn btn-warning btn-sm text-white" href="<?= base_url() ?>pesan/edit_pesanan/<?= $key->id_mp ?>"><i class="fa fa-pencil"></i></a> -->
                                                <!-- <a class="btn btn-danger btn-sm text-white" onclick="delete_pesanan(<?= $key->id_mp ?>)"><i class="fa fa-trash"></i></a> -->
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

</main><!-- End #main -->

<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Bukti Pembayaran Transfer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('pesan/upload_pembayaran/') ?>">
                <input type="hidden" name="id_pesanan" id="input_id_pesanan">
                    <div class="form-group">
                        <input type="file" name="file" id="input_file" required class="form-control">
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <span class="text-small text-danger">tipe file bukti pembayaran transfer yang bisa di upload png|jpg|gif|jpeg dan maksimal 5MB</span>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click','#btn_upload',function () {
            event.preventDefault();
            var _id = $(this).attr("data-id");
            $("#input_id_pesanan").val(_id);
            console.log(_id);
            $('#uploadModal').modal('show');
        })
    })
</script>