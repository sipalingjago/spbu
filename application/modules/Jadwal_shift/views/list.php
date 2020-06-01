<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $judul; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard'); ?>">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $judul; ?></li>
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
          <h3 class="card-title">Data <?php echo $judul; ?></h3>
          <div class="card-tools">
            <a class="btn btn-tool" href="<?php echo site_url($url.'/add'); ?>">
              <i class="fas fa-plus"></i> Tambah Data
            </a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="user_data" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th width="2%">No.</th>
              <th>Waktu</th>
              <th width="12%">#</th>
            </tr>
            </thead>
          </table>
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
$(document).ready(function(){
  var dataTable = $('#user_data').DataTable({
       "processing":true,
       "serverSide":true,
       "searching": false,
       "order":[],
       "ajax":{
            url:"<?php echo site_url($url.'/get_data'); ?>",
            type:"POST"
       },
       "columnDefs":[
            {
                 "targets":[0, 1, 2],
                 "orderable":false,
            },
       ],
  });

});
</script>
