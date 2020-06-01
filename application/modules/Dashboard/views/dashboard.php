<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Beranda</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Beranda</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- Info boxes -->
		<div class="row">
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box">
					<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">CPU Traffic</span>
						<span class="info-box-number">
							10
							<small>%</small>
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Likes</span>
						<span class="info-box-number">41,410</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->

			<!-- fix for small devices only -->
			<div class="clearfix hidden-md-up"></div>

			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Sales</span>
						<span class="info-box-number">760</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">New Members</span>
						<span class="info-box-number">2,000</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Sejarah Pertamina</h5>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<p>
									 Pertamina (dahulu bernama Perusahaan Pertambangan Minyak dan Gas Bumi Negara) atau nama resminya PT Pertamina (Persero) adalah sebuah BUMN yang bertugas mengelola penambangan minyak dan gas bumi di Indonesia.
								</p>
								<p>
								 PT Pertamina Hulu Energi berdiri tahun 2002 (d/h PT Aroma) dan bergerak dalam bidang Pengelolaan usaha sektor hulu minyak & gas bumi serta energi baik dalam maupun luar negeri serta kegiatan usaha yang terkait dan atau menunjang kegiatan usaha di bidang minyak & gas bumi.
								</p>
								<p>
									Untuk laba bersih, Pertamina berhasil meraup USD 2,526 miliar dengan aset mencapai USD 64,7 miliar dan 31.569 karyawan yang tersebar di seluruh dunia.
								</p>
								<br>
								<p>
									 Pertamina (dahulu bernama Perusahaan Pertambangan Minyak dan Gas Bumi Negara) atau nama resminya PT Pertamina (Persero) adalah sebuah BUMN yang bertugas mengelola penambangan minyak dan gas bumi di Indonesia.
								</p>
								<p>
								 PT Pertamina Hulu Energi berdiri tahun 2002 (d/h PT Aroma) dan bergerak dalam bidang Pengelolaan usaha sektor hulu minyak & gas bumi serta energi baik dalam maupun luar negeri serta kegiatan usaha yang terkait dan atau menunjang kegiatan usaha di bidang minyak & gas bumi.
								</p>
								<p>
									Untuk laba bersih, Pertamina berhasil meraup USD 2,526 miliar dengan aset mencapai USD 64,7 miliar dan 31.569 karyawan yang tersebar di seluruh dunia.
								</p>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- ./card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div><!--/. container-fluid -->
</section>
<!-- /.content -->
<?php
	echo $this->session->flashdata('notif');
	echo $this->session->flashdata('audio');
?>
