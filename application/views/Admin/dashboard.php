<!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-cogs" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Device</span>
              <span class="info-box-number"><?php echo $device; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-users" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data User</span>
              <span class="info-box-number"><?php echo $user; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Admin</span>
              <span class="info-box-number"><?php echo $admin; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-line-chart" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">data record</span>
              <span class="info-box-number"><?php echo $record; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->



          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Ricord</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Device Name</th>
                  <th>Door Status</th>
                  <th>User name</th>
                  <th>Date Time</th>
                </tr>
                </thead>
                <tbody id="dataRicord">
                
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Device Name</th>
                  <th>Door Status</th>
                  <th>User name</th>
                  <th>Date Time</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>