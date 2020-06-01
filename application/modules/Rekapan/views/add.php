<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $judul; ?> <small style="font-size: 12px;">Tambah</small></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard'); ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url($url); ?>"><?php echo $judul; ?></a></li>
          <li class="breadcrumb-item active">Tambah</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Data <?php echo $judul; ?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form role="form" method="POST" action="<?php echo site_url($url.'/insert'); ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Jenis Tangki</label>
                <select name="id_tangki" class="form-control" id="tangki">
                <option value="">-</option>
                <?php
                foreach($tangki as $row){
                ?>
                <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                <?php
                }
                ?>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">User/Jam Shift Ke</label>
                <select name="id_admin" class="form-control">
                <option value="">-</option>
                <?php
                foreach($user as $row){
                ?>
                <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                <?php
                }
                ?>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Nozzel</label>
                <select name="id_nozzel" class="form-control" id="nozzel">
                <option value="">-</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Teller Akhir</label>
                <input type="number" name="teller_akhir" class="form-control" placeholder="99999999">
              </div>

              <!-- <div class="form-group">
                <label for="exampleInputEmail1">Teller Awal</label>
                <input name="teller_awal" class="form-control" placeholder="9999999">
              </div> -->

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <a href="<?php echo site_url($url); ?>" class="btn btn btn-danger">
        			  <i class="fa fa-angle-double-left"></i> Back</a>
      			  <button type="submit" class="btn btn-primary">Simpan</button>
      			  <button type="reset" class="btn btn-warning">Batal</button>
            </div>
          </form>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<?php
	echo $this->session->flashdata('notif');
	echo $this->session->flashdata('audio');
?>
<script>
  $(function () {
    $("#tangki").change(function() {
		var id = $("#tangki").val();
		// return alert(id);

		$.ajax({

			url : '<?php echo site_url($url."/get_nozzel"); ?>',
            data : 'id=' + id,
            type : 'get',
            success : function(result) {
                $("#nozzel").html(result);

            }

		});

	});
  });
</script>
