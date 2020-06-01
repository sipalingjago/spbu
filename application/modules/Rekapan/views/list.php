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
      <div style="margin-bottom: 12px;">
        <ul class="nav nav-tabs">
          <?php
            foreach($bbm as $no => $row):
          ?>
          <li class="nav-item">
            <a href="<?php echo site_url($url.'/index/'.$row->id); ?>" class="nav-link <?php echo $row->id==$active?"active":""; ?>" href="#"><?php echo strtoupper($row->nama); ?></a>
          </li>
          <?php
            endforeach;
          ?>
        </ul>
      </div>

      <div class="card">
        <div class="card-body">
          <table id="myTables" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th width="2%">NO.</th>
              <th>MUTASI</th>
              <?php
                foreach($tangki as $row) {
              ?>
              <th width="20%"><?php echo strtoupper($row->nama); ?></th>
              <?php
                }
              ?>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Stock Awal Deeping <span style="float: right"><a href="#" data-toggle="modal" data-target="#exampleModal1">Edit</a></span></td>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Stock Awal Deeping</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form role="form" method="POST" action="<?php echo site_url($url.'/insert'); ?>">
                      <div class="modal-body">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Jenis</label>
                            <input type="hidden" name="id_jenis_bbm" value="<?php echo $active; ?>" class="form-control">
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
                            <label for="exampleInputEmail1">Stok Awal Deeping</label>
                            <input type="number" name="teller_akhir" class="form-control" placeholder="99999999">
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                <?php
                  foreach($tangki as $row) {
                ?>
                <td><?php echo $row->nama; ?></td>
                <?php
                  }
                ?>
              </tr>
              <tr>
                <td>2</td>
                <td>Penerimaan BBM <span style="float: right"><a href="#" data-toggle="modal" data-target="#exampleModal2">Edit</a></span></td>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Penerimaan BBM</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form role="form" method="POST" action="<?php echo site_url($url.'/insert'); ?>">
                      <div class="modal-body">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Jenis</label>
                            <input type="hidden" name="id_jenis_bbm" value="<?php echo $active; ?>" class="form-control">
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
                            <label for="exampleInputEmail1">Penerimaan BBM</label>
                            <input type="number" name="teller_akhir" class="form-control" placeholder="99999999">
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                <?php
                  foreach($tangki as $row) {
                ?>
                <td><?php echo $row->nama; ?></td>
                <?php
                  }
                ?>
              </tr>
              <tr>
                <td>3</td>
                <td>Sub Total (1 + 2)</td>
                <?php
                  foreach($tangki as $row) {
                ?>
                <td><?php echo $row->nama; ?></td>
                <?php
                  }
                ?>
              </tr>
              <tr>
                <td>4</td>
                <td>Penjualan Sesuai Totalitas</td>
                <?php
                  foreach($tangki as $row) {
                ?>
                <td><?php echo $row->nama; ?></td>
                <?php
                  }
                ?>
              </tr>
              <tr>
                <td>5</td>
                <td>Stok Akhir Perhitungan (3 + 4)</td>
                <?php
                  foreach($tangki as $row) {
                ?>
                <td><?php echo $row->nama; ?></td>
                <?php
                  }
                ?>
              </tr>
              <tr>
                <td>6</td>
                <td>Stok Akhir Aktual (Deping) <span style="float: right"><a href="#" data-toggle="modal" data-target="#exampleModal3">Edit</a></span></td>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Stock Akhir Aktual (Deeping)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form role="form" method="POST" action="<?php echo site_url($url.'/insert'); ?>">
                      <div class="modal-body">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Jenis</label>
                            <input type="hidden" name="id_jenis_bbm" value="<?php echo $active; ?>" class="form-control">
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
                            <label for="exampleInputEmail1">Stok Akhir Aktual (Deeping)</label>
                            <input type="number" name="teller_akhir" class="form-control" placeholder="99999999">
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                <?php
                  foreach($tangki as $row) {
                ?>
                <td><?php echo $row->nama; ?></td>
                <?php
                  }
                ?>
              </tr>
              <tr>
                <td>7</td>
                <td>Selisi (6 - 5)</td>
                <?php
                  foreach($tangki as $row) {
                ?>
                <td><?php echo $row->nama; ?></td>
                <?php
                  }
                ?>
              </tr>
              <tr>
                <td>8</td>
                <td>Persen Gein/Los (7/3*100)</td>
                <?php
                  foreach($tangki as $row) {
                ?>
                <td><?php echo $row->nama; ?></td>
                <?php
                  }
                ?>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Laporan Penjualan Sesuai Totalisator</h3>
          <div class="card-tools">
            <a class="btn btn-tool" href="#<?php echo site_url($url.'/add'); ?>" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-plus"></i> Tambah Data
            </a>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Penjualan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form role="form" method="POST" action="<?php echo site_url($url.'/insert'); ?>">
                  <div class="modal-body">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Jenis Tangki</label>
                          <input type="hidden" name="id_jenis_bbm" value="<?php echo $active; ?>" class="form-control">
                          <select name="id_tangki" class="form-control" id="tangkis">
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
                          <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>" class="form-control" placeholder="99999999">
                        </div>

                        <!-- <div class="form-group">
                          <label for="exampleInputEmail1">Teller Awal</label>
                          <input name="teller_awal" class="form-control" placeholder="9999999">
                        </div> -->

                      </div>
                      <!-- /.card-body -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="myTable" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th width="2%">No.</th>
              <th>Jadwal Shift</th>
              <th>Despenser</th>
              <th>Jenis Nozzel</th>
              <th>Teller Akhir</th>
              <th>Teller Awal</th>
              <th>Penjualan</th>
              <!-- <th width="12%">#</th> -->
            </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($data as $row): ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->nama_jadwal_shift; ?></td>
                <td><?php echo $row->nama_tangki; ?></td>
                <td><?php echo $row->nozzel; ?></td>
                <td><?php echo $row->teller_akhir; ?></td>
                <td><?php echo $row->teller_awal; ?></td>
                <td><?php echo $row->teller_awal - $row->teller_akhir; ?></td>
                <!-- <td>
                  <?php
                    echo '<a href="'.site_url($this->url.'/edit/'.$row->id).'" class="btn btn-info btn-xs update">Edit</a>
           				 <a href="'.site_url($this->url.'/hapus/'.$row->id.'/'.$active).'" onclick="return confirm(\'Apakah Anda Yakin?\')" class="btn btn-danger btn-xs delete">Delete</a>';
                  ?>
                </td> -->
              </tr>
              <?php endforeach; ?>
            </tbody>
            <!-- <tfoot>
              <tr>
                <td>Total</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tfoot> -->
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
                 "targets":[0, 1, 2,3],
                 "orderable":false,
            },
       ],
  });

    $('#myTable').DataTable({
      "searching": false
    });
    $("#tangkis").change(function() {
		var id = $("#tangkis").val();
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
