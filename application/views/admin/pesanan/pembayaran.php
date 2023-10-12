<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Pembayaran</h1>
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
<?= $this->session->flashdata('message') ?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Riwayat Pembayaran</h4>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal Upload</th>
                                    <th>Nominal Transfer</th>
                                    <th>Keterangan</th>
                                    <th>Status Pembayaran</th>
                                    <th>Status Keuangan</th>
                                    <th>Bukti Transfer</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pembayaran as $key) { ?>
                                    <tr>
                                        <td><?= cari_waktu($key->tanggal_upload) ?></td>
                                        <td>Rp. <?= number_format($key->nominal, 2, ',', '.') ?></td>
                                        <td><?= $key->keterangan ?></td>
                                        <td><?= $key->status ?></td>
                                        <td>
                                            <?= $key->status_keuangan ?>
                                            <?php if ($key->status_keuangan == 'Belum diberikan'): ?>
                                                <a href="<?= base_url('Admin/update_status_keuangan/'.$key->id_pembayaran.'/Sudah diberikan') ?>" class="badge badge-success">Sudah diberikan</a>
                                            <?php endif ?>
                                        </td>
                                        <td><a href="<?= base_url('asset/bukti-transfer/').$key->bukti_transfer ?>" class="badge badge-info">Bukti Transfer</a></td>
                                        <td>
                                            <?php if ($key->status == 'Belum dikonfirmasi'): ?>
                                                <a href="<?= base_url('Admin/update_status_pembayaran/'.$key->id_pembayaran.'/Valid') ?>" class="badge badge-success">Valid</a>
                                                <a href="<?= base_url('Admin/update_status_pembayaran/'.$key->id_pembayaran.'/Tidak valid') ?>" class="badge badge-danger">Tidak Valid</a>
                                            <?php else: ?>
                                                <span class="badge badge-secondary">Sudah dikonfirmasi</span>
                                            <?php endif ?>
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
</div>