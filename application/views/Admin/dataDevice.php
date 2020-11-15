    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Device</h3>
              <button style="float: right;" id="tambahDevice" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahUser" data-whatever="@mdo"><i class="fa fa-plus" aria-hidden="true"></i> TAMBAH DATA</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Device</th>
                  <th>Device Key</th>
                  <th>Door Status</th>
                  <th>Status Device</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="dataDevice">
                
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Device</th>
                  <th>Device Key</th>
                  <th>Door Status</th>
                  <th>Status Device</th>
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
              <h3 class="box-title">Tambah Device</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="formDevice" action="#" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name Device</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nameDivace" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="usrname" class="col-sm-2 control-label">Device Key</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="device_key" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">Door Status</label>
                  <div class="col-sm-10">
                   <select id="status_door" name="status_door" class="form-control">
                     <option value="open">Open</option>
                     <option value="close">Close</option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">Device Status</label>
                  <div class="col-sm-10">
                   <select id="deviceStatus" name="deviceStatus" class="form-control">
                     <option value="daftar">Daftar</option>
                     <option value="ready">Ready</option>
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
            <form id="formEditDevice" action="#" class="form-horizontal">
              <div class="box-body">
                 <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name Device</label>
                  <div class="col-sm-10">
                    <input type="hidden"  name="idx" id="idx">
                    <input type="text" class="form-control" name="nameDivace" id="nameEditeDivace" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="usrname" class="col-sm-2 control-label">Device Key</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="device_key" id="device_keyEdite" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">Status Door</label>
                  <div class="col-sm-10">
                   <select id="status_doorEdite" name="status_door" class="form-control">
                     <option value="open">Open</option>
                     <option value="close">Close</option>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">Device Status</label>
                  <div class="col-sm-10">
                   <select id="deviceStatusEdite" name="deviceStatusEdite" class="form-control">
                     <option value="daftar">Daftar</option>
                     <option value="ready">Ready</option>
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



