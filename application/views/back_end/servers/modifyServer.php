<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Сервер тохиргоо
        <small>Засах</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="row"> <div class="col-md-6"><h3 class="box-title">Сервер Дэлгэрэнгүй</h3></div>  <div class="col-md-6"><a class="btn btn-sm btn-primary" href="<?php echo base_url().'serverListing' ?>" title="Back to Servers List"><i class="fa fa-backward"></i></a></div> </div>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>editServer" method="post" id="editServer">
                        <div class="box-body">
						<div class="row"><div class="col-md-12">     
						<div class="text-center">
    			<span aria-hidden="true" class="error">*</span>&nbsp;Заавал
  			</div></div>
						</div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">&nbsp;<span class="error">*</span>Нэр</label>
								<input type="text" class="form-control required" id="servername" placeholder="Нэр" name="servername" value="<?php echo $serverInfo->servername; ?>" maxlength="128">
								<input type="hidden" value="<?php echo $serverInfo->serverid; ?>" name="serverId" id="serverId" />    
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">IP хаяг</label>
                                        <input type="text" class="form-control" id="ip_address" placeholder="IP хаяг" name="ip_address" value="<?php echo $serverInfo->ip_address; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Үзүүлэлт</label>
                                        <input type="text" class="form-control" id="server_info" placeholder="Үзүүлэлт" name="server_info" value="<?php echo $serverInfo->server_info; ?>" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Дэлгэрэнгүй</label>
										<input type="username" class="form-control" id="description" placeholder="Дэлгэрэнгүй" name="description" value="<?php echo $serverInfo->description; ?>" maxlength="100">
                                    </div>
                                </div>
                            </div>
							
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Хадгалах" />&nbsp;&nbsp;
                            <input type="reset" class="btn btn-default" value="Цэвэрлэх" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/editServer.js" type="text/javascript"></script>