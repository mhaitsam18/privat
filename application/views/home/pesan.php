<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Pesan Les Privat</h2>
                <!-- <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Inner Page</li>
                </ol> -->
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
            <form action="<?= base_url() ?>pesan/save" method="post" role="form">
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <!-- Tanggal Mulai Belajar -->
                        <input placeholder="Tanggal Mulai Belajar" type="text" name="tanggal" class="form-control" id="name" onfocus="(this.type='date')" required />
                        <div class="validate"></div>
                    </div>
                    <div class="col-md-6 form-group">
                        <select name="jumlah_siswa" class="form-control" required>
                            <option selected value="" disabled>Pilih jumlah siswa di kelas</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="number" name="jumlah_pertemuan" class="form-control" placeholder="jumlah pertemuan">
                    <!-- <select name="jumlah_pertemuan" class="form-control" required>
                        <option selected value="" disabled>Pilih jumlah pertemuan</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select> -->
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <select name="mata_pelajaran" id="pil-mp" class="form-control" required>
                        <option value="" disabled selected>Pilih mata pelajaran</option>
                        <?php foreach ($matpel as $key) { ?>
                            <option value="<?= $key->id_mp ?>"><?= $key->mata_pelajaran ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="kelas" id="pil-kelas" class="form-control" required>
                        <option value="" disabled selected>Pilih kelas</option>
                        <?php foreach ($kelas as $key) { ?>
                            <option value="<?= $key->id_kelas ?>"><?= $key->kelas ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group" id="ctn">
                    <select name="guru" id="pil-guru" class="form-control" required>
                        <option value="" disabled selected>Pilih guru</option>
                        <?php foreach ($guru as $key) { ?>
                            <option value="<?= $key->id_guru ?>"><?= $key->guru ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="hari" id="pil-hari" class="form-control" required>
                        <option value="" disabled selected>Pilih hari</option>
                        <?php foreach ($hari as $key) { ?>
                            <option value="<?= $key->id_hari ?>"><?= $key->hari ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" name="harga" id="pil-harga-hidden"  required>
                    <input type="text" class="form-control" name="" id="pil-harga" placeholder="Harga" required readonly>
                    <!-- <select name="harga_name" id="pil-harga" class="form-control" disabled required>
                        <option value="" selected>Pilih harga</option>
                        <?php foreach ($harga as $key) { ?>
                            <option value="<?= $key->id_harga ?>"><?= $key->harga ?></option>
                        <?php } ?>
                    </select> -->
                </div>
                <!-- <div class="form-group">
                    <select name="metode" id="pil-metode" class="form-control" required>
                        <option selected value="" disabled>Pilih metode bayar</option>
                        <option value="Cash">Cash</option>
                        <option value="Transfer">Transfer</option>
                    </select>
                    <div class="validate"></div>
                </div> -->
                <div class="form-group" id="metode_transfer">
                </div>
                <div class="form-group">
                    <textarea required class="form-control" name="deskripsi" rows="5" data-rule="required" data-msg="Keterangan lain" placeholder="Please write something for us"></textarea>
                    <div class="validate"></div>
                </div>
                <div class="text-center"><button class="btn btn-primary" type="submit">Pesan Les Privat</button></div>
            </form>
        </div>
    </section>

</main><!-- End #main -->
<script>
    $(document).ready(function() {
        $("#pil-mp").val(<?= $id ?>);
        <?php if (isset($id_guru)) { ?>
            console.log("zz");
            $("#pil-guru").val("<?= $id_guru ?>");
        <?php } ?>
        $("#pil-metode").on('change', function() {
            event.preventDefault();
            var metode = $("#pil-metode").val();
            if (metode == "Transfer") {
                console.log(metode);
                $("#metode_transfer").html(`<div style="padding: 10px;border: 1px solid grey"><p class='font-weight-bold'>Pembayaran Transfer melalui BANK BCA</p>
                    <p>Nama Rekening : Les Privat</p>
                    <p>Nomor Rekening : 1231234124</p></div>`);
            } else {
                console.log(metode);
                $("#metode_transfer").empty();
            }
        });
        // $("#pil-mp").attr("disabled",true);
        $("#pil-kelas").on('change', function(e) {
            var kelas = $("#pil-kelas").val();
            var mp = $("#pil-mp").val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url() ?>pesan/get_harga/' + <?= $id ?> + '/' + kelas,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    console.log(data[0].id_harga);
                    var bilangan = data[0].harga;
                    var number_string = bilangan.toString(),
                    sisa    = number_string.length % 3,
                    rupiah  = number_string.substr(0, sisa),
                    ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    $('#pil-harga').val("Rp. " + rupiah + ",00 / 2 Jam Pelajaran (90 Menit)");
                    $('#pil-harga-hidden').val(data[0].id_harga);
                }
            })
        })
        $("#pil-mp").on('change', function(e) {
            $.ajax({
                success: function(data) {
                    $('#pil-kelas').val("");
                    $('#pil-harga').val("");
                }
            })
        })
        
        
    });
    // ambil elements yg di buutuhkan
    var keyword = document.getElementById('pil-mp');

    var container = document.getElementById('ctn');
    // var btn = document.getElementById('button-addon2');

    // tambahkan event ketika keyword ditulis

    keyword.addEventListener('change', function () {


        //buat objek ajax
        var xhr = new XMLHttpRequest();

        // cek kesiapan ajax
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;
            }
        }

        xhr.open('GET', '<?= base_url('Pesan/select_guru/') ?>' + keyword.value, true);
        xhr.send();
    })
</script>