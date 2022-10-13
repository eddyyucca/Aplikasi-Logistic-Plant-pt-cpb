<body class="bg-gradient-primary">
	<div class="mbr-slider slide carousel" data-keyboard="false" data-ride="carousel" data-interval="2000" data-pause="true">
		<div class="container">
			<!-- Outer Row -->
			<div class="row justify-content-center">
				<div class="col-lg-7">
					<div class="card o-hidden border-0 shadow-lg my-5 ">
						<div class="card-body p-0">
							<!-- Nested Row within Card Body -->
							<div class="row">
								<div class="col-lg">
									<div class="p-5">
										<div class="text-center">

											<img src="<?= base_url('assets/cpb.png') ?>" width="100px">
											<h3>PT. CAKRAWALA PUTRA BERSAMA - BMB</h3>
											<hr>
											<!-- <h1 class="h4 text-gray-900 mb-4">Login</h1> -->
										</div>
										<?php
										echo $data;
										echo $this->session->flashdata('pesan')
										?>
										<?= validation_errors() ?>
										<form class="user" action="<?= base_url('auth/auth_admin') ?>" method="POST">
											<div class="form-group mb-4">
												<div class="form-group mb-4">
													<input type="text" class="form-control" name="nip" placeholder="NIP Pegawai">
												</div>
											</div>
											<div class="form-group mb-4">
												<input type="password" class="form-control" name="password" placeholder="Password">
											</div>

											<button type="submit" class="btn btn-primary btn-user btn-block">
												Masuk
											</button>
										</form>
										<hr>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>