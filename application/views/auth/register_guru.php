<!DOCTYPE html>
<html lang="en">

<head>
	<title>Daftar Guru Privat</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url() ?>asset/login/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/login/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login80vw p-l-55 p-r-55 p-t-65 p-b-50">
				<span class="login100-form-title p-b-33">
					Daftar Akun Guru
				</span>
				<form action="<?= base_url() ?>auth/guruSignUp/" method="POST" enctype="multipart/form-data">
					<div class="row">

						<div class="col-xs-6 col-sm-6">
							<div class="card">
								<div class="card-header">
									<strong>Data Diri</strong>
								</div>
								<div class="card-body card-block">
									<div class="form-group">
										<label class=" form-control-label">Nama</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-male"></i></div>
											<input class="form-control" type="text" name="nama" required>
										</div>
										<small class="form-text text-muted">contoh. Vinka Sil</small>
									</div>
									<div class="form-group">
										<label class=" form-control-label">Tanggal Lahir</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
											<input class="form-control" type="date" name="tanggal_lahir" required>
										</div>
										<small class="form-text text-muted">contoh. 01/12/9999</small>
									</div>
									<div class="form-group">
										<label class=" form-control-label">No Hp</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-phone"></i></div>
											<input class="form-control" type="text" name="no_hp" maxlength="14" required>
										</div>
										<small class="form-text text-muted">ex. (999) 999-9999</small>
									</div>
									<div class="form-group">
										<label class=" form-control-label">Email</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
											<input class="form-control" type="email" name="email" required>
										</div>
										<small class="form-text text-muted">ex. 99-9999999</small>
									</div>
									<div class="form-group">
										<label class=" form-control-label">Jenis Kelamin</label>
										<div class="input-group">
											<select name="jenis_kelamin" required data-placeholder="Jenis Kelamin..." class="form-control" tabindex="1">
												<option value="" selected disabled>Pilih jenis Kelamin</option>
												<option value="Laki-laki">Laki-laki</option>
												<option value="Perempuan">Perempuan</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class=" form-control-label">Pendidikan Terakhir</label>
										<div class="input-group">
											<select name="pendidikan_terakhir" required data-placeholder="Pendidikan Terakhir" class="form-control" tabindex="1">
												<option value="" selected disabled>Pilih Pendidikan</option>
												<?php foreach ($pendidikan as $item): ?>
													<option value="<?= $item->id_pendidikan ?>"><?= $item->pendidikan ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class=" form-control-label">Alamat</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-home"></i></div>
											<textarea class="form-control" name="alamat" required></textarea>
										</div>
										<small class="form-text text-muted"></small>
									</div>
									<div class="form-group">
										<label class=" form-control-label">Foto</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-photo"></i></div>
											<input class="form-control" name="foto" type="file" required>
										</div>
										<small class="form-text text-muted"></small>
									</div>
									<div class="form-group">
										<label class=" form-control-label">Bank</label>
										<div class="input-group">
											<select name="bank" required data-placeholder="Bank" class="form-control" tabindex="1">
												<option value="" selected disabled>Pilih Bank</option>
												<?php foreach ($bank as $b): ?>
													<option value="<?= $b->id_bank ?>"><?= $b->bank ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class=" form-control-label">Nomor Rekening</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
											<input class="form-control" type="text" name="rekening" required>
										</div>
										<small class="form-text text-muted">ex. 999999999</small>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xs-6 col-sm-6">
							<div class="card">
								<div class="card-header">
									<strong class="card-title">Pendidikan</strong>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label class=" form-control-label">Institusi</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-book"></i></div>
											<input class="form-control" name="institusi" type="text" required>
										</div>
										<small class="form-text text-muted"></small>
									</div>
									<div class="form-group">
										<label class=" form-control-label">Program Studi</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-book"></i></div>
											<input class="form-control" name="prodi" type="text" required>
										</div>
										<small class="form-text text-muted"></small>
									</div>
									<div class="form-group">
										<label class=" form-control-label">IPK</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-book"></i></div>
											<input class="form-control" name="ipk" type="number" step="any" required>
										</div>
										<small class="form-text text-muted"></small>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<strong class="card-title">
										Bidang
									</strong>
									<button id="add_bidang" class="btn btn-sm btn-warning">Tambah Bidang</button>
								</div>
								<div class="card-body bidang">
									<div class="form-group">
										<label>Bidang yang dikuasai</label>
										<select name="bidang[]" required class="form-control" data-placeholder="pilih bidang..." class="standardSelect" tabindex="1">
											<option value="" disabled selected>Pilih Bidang</option>
											<?php foreach ($matpel as $key) { ?>
												<option value="<?= $key->id_mp ?>"><?= $key->mata_pelajaran ?></option>
											<?php } ?>
										</select>
									</div>
									<!-- <div class="form-group">
										<label>Bidang yang dikuasai</label>
										<select name="bidang[]" required class="form-control" data-placeholder="pilih bidang..." class="standardSelect" tabindex="1">
											<option value="" disabled selected>Pilih Bidang</option>
											<?php foreach ($matpel as $key) { ?>
												<option value="<?= $key->id_mp ?>"><?= $key->mata_pelajaran ?></option>
											<?php } ?>
										</select>
									</div> -->
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<strong class="card-title">Scan KTP</strong>
								</div>
								<div class="card-body">

									<input type="file" class="form-control" required name="ktp">

								</div>
							</div>

							<div class="card">
								<div class="card-header">
									<strong class="card-title">Scan Ijazah Terakhir</strong>
								</div>
								<div class="card-body">

									<input type="file" class="form-control" required name="ijazah">

								</div>
							</div>
							<br>
							<button class="btn btn-primary btn-block" type="submit">Daftar sebagai Guru</button>

						</div>
					</div>
				</form>
				<div class="text-center p-t-45 p-b-4">
					<span class="txt1">
						Sudah Punya Akun?
					</span>

					<a href="<?= base_url() ?>auth" class="txt2 hov1">
						Masuk
					</a>
				</div>
			</div>
		</div>
	</div>



	<!--===============================================================================================-->
	<script src="<?= base_url() ?>asset/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>asset/login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>asset/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url() ?>asset/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>asset/login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>asset/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url() ?>asset/login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>asset/login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>asset/login/js/main.js"></script>
	<script>
		function isNumber(evt) {
			evt = (evt) ? evt : window.event;
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				return false;
			}
			return true;
		}
		$("#add_bidang").click(function() {
			// console.log("zzz");
			event.preventDefault();
			var _html = `<div class="form-group">
							<label>Bidang yang dikuasai <button class="btn btn-sm btn-danger" id="delete_bidang">hapus</button></label>
							<select name="bidang[]" required class="form-control" data-placeholder="pilih bidang..." class="standardSelect" tabindex="1">
								<option value=""></option>
								<?php foreach ($matpel as $key) { ?>
									<option value="<?= $key->id_mp ?>"><?= $key->mata_pelajaran ?></option>
								<?php } ?>
							</select>
						</div>`;
			$(".bidang").append(_html);
		});
		$(document).on("click",'#delete_bidang',function () {
			event.preventDefault();
			$(this).parent().parent().remove();
		});
	</script>
</body>

</html>