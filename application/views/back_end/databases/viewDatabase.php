<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-database"></i> Database
        <small>Database мэдээлэл</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                       <div class="row"> <div class="col-md-6"><h3 class="box-title">View Database</h3></div>  <div class="col-md-6"><a class="btn btn-sm btn-primary" href="<?php echo base_url().'databaseListing' ?>" title="Back to Database List"><i class="fa fa-backward"></i></a></div> </div>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                        <div class="box-body">
                           
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="cid">№:</label>&nbsp;&nbsp;<?php echo $databaseInfo->id; ?>
                                    </div>
                                </div>  
								<div class="col-md-6">
                                  <div class="form-group">
                                   <label for="cid">Нэр:</label>&nbsp;&nbsp;<?php if($databaseInfo->name) { echo $databaseInfo->name; }  else  {  echo 'N/A'; }  ?>
                                   </div>
                                </div>  
                            </div>
							
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="vehiclemodel"> Схем: </label>&nbsp;&nbsp;<?php if($databaseInfo->username) { echo $databaseInfo->username; }  else  {  echo 'N/A'; }  ?>
                                    </div>
                                </div>  
								<div class="col-md-6">
                                  <div class="form-group">
                                  <label for="vehiclemadeyear">Нууц үг: </label>&nbsp;&nbsp;<?php if($databaseInfo->password) { echo $databaseInfo->password; }  else  {  echo 'N/A'; }  ?> 
                                   </div>
                                </div>  
                            </div>
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="vehicleregistrationnumber">IP хаяг: </label>&nbsp;&nbsp; <?php if($databaseInfo->ip) { echo $databaseInfo->ip; }  else  {  echo 'N/A'; }  ?> 
                                    </div>
                                </div>  
								<div class="col-md-6">
                                  <div class="form-group">
                                    <label for="vehiclenumber">Дэлгэрэнгүй: </label>&nbsp;&nbsp; <?php if($databaseInfo->description) { echo $databaseInfo->description; }  else  {  echo 'N/A'; }  ?> 
                                   </div>
                                </div>  
                            </div>
                        </div><!-- /.box-body -->
                </div>
            </div>
            
        </div>    
    </section>
</div>