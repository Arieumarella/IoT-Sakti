    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Users</h3>
              <button style="float: right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahUser" data-whatever="@mdo"><i class="fa fa-plus" aria-hidden="true"></i> TAMBAH DATA</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Name Device</th>
                  <th>Data Sidik Jari</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="dataUser">
                
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Name Device</th>
                  <th>Data Sidik Jari</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>


<!-- modal Daftar Sidik jari -->


<div  class="modal fade" id="modalDaftar" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="box box-info">

            <div class="box-header  text-center">
              <img style="width: 13%; margin-top: 2%;" src="<?php echo base_url(); ?>assets/fingerprint.png"><br>
              <h4 id="idSisikjari" style="color: #DC143C;"><b>Silahkan Masukan Id Sidik Jari</b></h4>
              <h4 id="Tunggu" style="color: #008B8B;"><b>Mohon Tunggu sebentar.</b></h4>
              <h4 id="Tap" style="color: #228B22;"><b>Silahkan Tap Sensor Sidik Jari Untuk Mendaftarkan Sidik Jari Anda.!</b></h4>
              <img id="gif" style="width: 19%" src="<?php echo base_url(); ?>assets/loading.gif">
              <h4 id="ok" style="color: #90EE90;"><b>PENDAFTARAN SIDIK JARI BERHASIL.!</b></h4>

              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="formDaftar" action="#" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="idxDaftar" id="idxDaftar" value="">
                    <input type="hidden" name="deviceKey" id="deviceKey" value="">
                    <input type="text" class="form-control" name="nameDaftar" id="nameEDaftar" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="usrname" class="col-sm-2 control-label">Device Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="deviceDaftar" id="deviceDaftar" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">Input ID Sidik Jari</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="inputDaftar" id="inputDaftar" required>
                  </div>
                </div>
              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" style="margin-left: 85%;" data-dismiss="modal" class="btn btn-danger">Cancel</button>
                <button type="submit" class="btn btn-success pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
            <br><br><br><br>
          </div>
    </div>
  </div>
</div>
<!-- End Modal sidik Jari -->




<div  class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="box box-info">

            <div class="box-header with-border">
              <h3 class="box-title">Tambah User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="formUser" action="#" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="usrname" class="col-sm-2 control-label">Userame</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="usrname" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="Password" required>
                  </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label" for="exampleFormControlSelect1">Pilih Device</label>
                <div class="col-sm-10">
                <select id="deviceData" name="id_device" class="form-control deviceIdx" id="exampleFormControlSelect1">
                </select>
                </div>  
              </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" style="margin-left: 78%;" data-dismiss="modal" class="btn btn-danger">Cancel</button>
                <button type="submit" class="btn btn-success pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    </div>
  </div>
</div>


<div  class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="box box-info">

            <div class="box-header with-border">
              <h3 class="box-title">Edite Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="formEditUser" action="#" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="idx" id="idx">
                    <input type="text" class="form-control" name="nameEdite" id="nameEdite" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="usrname" class="col-sm-2 control-label">Userame</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="usrnameEdite" id="usrnameEdite" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="passwordEdite" id="PasswordEdite">
                  </div>
                </div>
               <div class="form-group">
                <label class="col-sm-2 control-label" for="exampleFormControlSelect1">Pilih Device</label>
                <div class="col-sm-10">
                <select id="deviceDataEdite" name="id_device" class="form-control" id="exampleFormControlSelect1">
                </select>
                </div>  
              </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" style="margin-left: 78%;" data-dismiss="modal" class="btn btn-danger">Cancel</button>
                <button type="submit" class="btn btn-success pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    </div>
  </div>
</div>



