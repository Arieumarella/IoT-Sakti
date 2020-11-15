    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Administrator</h3>
              <button style="float: right;" id="tambahAdmin" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahUser" data-whatever="@mdo"><i class="fa fa-plus" aria-hidden="true"></i> TAMBAH DATA</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="dataAdmin">
                
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>



<div  class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="box box-info">

            <div class="box-header with-border">
              <h3 class="box-title">Tambah Admin</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="formAdmin" action="#" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nameAdmin" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="usrname" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="usrname" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" required>
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
            <form id="formEditAdmin" action="#" class="form-horizontal">
              <div class="box-body">
                 <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="idx" id="idx">
                    <input type="text" class="form-control" name="nameAdmin" id="nameAdminEdite" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="usrname" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" id="usernameEdite" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="usrname" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="passwordAdmin" id="passwordEditAdmin" >
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



