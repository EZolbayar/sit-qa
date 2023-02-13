<!-- DataTables -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        <small>Environment SIT Control Panel</small>
      </h1>
    </section>  
    
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>10</h3>
                  <p>Servers</p>
                </div>
                <div class="icon">
                  <i class="fa fa-server"></i>
                </div>
                <a href="<?php echo base_url(); ?>serverListing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>26</h3>
                  <p>Subsystems</p>
                </div>
                <div class="icon">
                  <i class="fa fa-desktop"></i>
                </div>
                <a href="<?php echo base_url(); ?>subSystemListing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>1230</h3>
                  <p>Databases</p>
                </div>
                <div class="icon">
                  <i class="fa fa-database"></i>
                </div>
                <a href="<?php echo base_url(); ?>databaseListing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>10</h3>
                  <p>OS</p>
                </div>
                <div class="icon">
                  <i class="fa fa-windows"></i>
                </div>
                <a href="<?php echo base_url(); ?>vehicleRenewal" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div>
		  <div class="card-header card">
        <h3>List of Servers</h3>
                     <!-- <h3 class="card-title"><i class="fa fa-table"></i>&nbsp;List of <?php if(date("M")=="Jan") { $month=1;  } 
																						 elseif(date("M")=="Feb") { $month=2; } 
																						 elseif(date("M")=="Mar") { $month=3; }
																						 elseif(date("M")=="Apr") { $month=4; }
																						 elseif(date("M")=="May") { $month=5; }
																						 elseif(date("M")=="Jun") { $month=6; }
																						 elseif(date("M")=="Jul") { $month=7; }
																						 elseif(date("M")=="Aug") { $month=8; }
																						 elseif(date("M")=="Sep") { $month=9; }
																						 elseif(date("M")=="Oct") { $month=10; }
																						 elseif(date("M")=="Nov") { $month=11; } 
																						 elseif(date("M")=="Dec") { $month=12; } 
																						 else { $month=""; } 
					 																	$month_num =$month; 
																						$month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
																						echo $month_name."\n"; ?> 
 																		Month </h3> -->
                </div>
				<div class="card">
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serverid</th>
                  <th>Server Name</th>
                  <th>IP address</th>
                  <th>System Information</th>
				          <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				
				
				 <?php 
                    if(!empty($serverRecords))
                    { $i=1;
                        foreach($serverRecords as $record)
                        {
                    ?>
					
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $record->servername; ?></td>
                  <td><?php echo $record->ip_address; ?></td>
                  <td> <?php if($record->system_info) { echo $record->system_info; } else { echo 'N/A';}?></td>
				          <td> <?php if($record->description) { echo $record->description; } else { echo 'N/A';}?></td>
                  <td><a class="btn btn-sm btn-primary" href="<?php echo base_url().'viewServer/'.$record->serverid; ?>" title="View"><i class="fa fa-history"></i></a></td>
                </tr>
				<?php
                        $i++; }
                    }
                    ?>
                
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
              
    </section>
</div>