<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <!-- <section class="breadcrumbs">
    </section> -->
    <!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <?= $this->session->flashdata('message') ?>
            <div class="d-flex justify-content-between align-items-center">
                <h2>Pembayaran</h2>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Pembayaran</h4>
                    <p class="card-text">
                        Silahkan melakukan Transfer kepada Rekening Berikut : 0123456789, Bank BNI, a/n Privat Online. Kemudian upload bukti Transfer di Form di bawah ini.
                    </p>
                    <strong>Berikut Total Tagihan Anda: Rp. <?= number_format($pesanan->harga, 2, ',', '.').' x '.$pesanan->jumlah_pertemuan. ' pertemuan = Rp. '.number_format($pesanan->harga*$pesanan->jumlah_pertemuan, 2, ',', '.'); ?></strong>
                    <form action="<?= base_url('Pesan/insert_pembayaran') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_pesanan" id="id_pesanan" value="<?= $pesanan->id_pesanan ?>">
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="number" class="form-control" name="nominal" id="nominal">
                            <?= form_error('nominal', '<small class= "text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="bukti_transfer">Upload Bukti Transfer</label>
                            <input type="file" class="form-control" name="bukti_transfer" id="bukti_transfer">
                            <?= form_error('bukti_transfer', '<small class= "text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                            <?= form_error('keterangan', '<small class= "text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Kirim</button>
                    </form>
                    <br>
                    <br>
                    <br>
                    <h4 class="card-title">Riwayat Pembayaran</h4>
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Tanggal Upload</th>
                                <th>Nominal Transfer</th>
                                <th>Keterangan</th>
                                <th>Status Pembayaran</th>
                                <th>Bukti Transfer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pembayaran as $key) { ?>
                                <tr>
                                    <td><?= cari_waktu($key->tanggal_upload) ?></td>
                                    <td>Rp. <?= number_format($key->nominal, 2, ',', '.') ?></td>
                                    <td><?= $key->keterangan ?></td>
                                    <td><?= $key->status ?></td>
                                    <td><a href="<?= base_url('asset/bukti-transfer/').$key->bukti_transfer ?>" class="badge badge-info">Bukti Transfer</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->