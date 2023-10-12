<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Kelas Les Privat</h2>
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
                <?php if(!empty($privat)){
                    foreach ($privat as $key) {?>
                    <div class="col-sm-12  m-3">
                        <div class="p-3">
                            <div class="row">
                                <div class="col-sm-4 p-3">Kelas <?=$key->kelas?> - <?=$key->mata_pelajaran?></div>
                                <div class="col-sm-3 p-3">Guru <?=$key->guru?></div>
                                <div class="col-sm-3 p-3"><?=$key->kapasitas?> Siswa</div>
                                <div class="col-sm-2 p-3"><a class="btn btn-secondary" href="<?=base_url('guru/')?>kelasku/<?=$key->id_privat?>"><i class="fa fa-eye"></i></a></div>
                            </div>
                        </div>
                    </div>
                <?php }
                }else{
                    echo "<br><br>Anda belum memiliki kelas!";
                }?>
            </div>
        </div>
    </section>
</main>