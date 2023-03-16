<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-cab"></i> Database
            <small>Нэмэх</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title">Database</h3>
                            </div>
                            <div class="col-md-6"><a class="btn btn-sm btn-primary" href="<?php echo base_url() . 'databaseListing' ?>" title="Back to Databases List"><i class="fa fa-backward"></i></a></div>
                        </div>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addDatabase" action="<?php echo base_url() ?>addNewDatabase" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <span aria-hidden="true" class="error">*</span>&nbsp;Заавал
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Нэр&nbsp;<span class="error">*</span></label>
                                        <input type="text" class="form-control required" id="name" placeholder="Нэр оруулах" value="<?php echo set_value('name'); ?>" name="name" maxlength="128">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username&nbsp;<span class="error">*</span></label>
                                        <input type="text" class="form-control required" id="Username" placeholder="username оруулах" value="<?php echo set_value('username'); ?>" name="username" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Нууц үг&nbsp;<span class="error">*</span></label>
                                        <input type="text" class="form-control required" id="password" placeholder="Нууц үг оруулах" value="<?php echo set_value('password'); ?>" name="password" maxlength="100">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Тайлбар</label>
                                        <input type="text" class="form-control" id="description" placeholder="Тайлбар оруулах" value="<?php echo set_value('description'); ?>" name="description" maxlength="100">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Төрөл&nbsp;/1=db, 2=appserver, 3=deploy /<span class="error">*</span></label>
                                        <select class="form-control required" name="type" id="type">
                                        <option value="0">Төрөл сонгох</option>
                                        <?php 
                                            for($i = 1; $i <= 3; $i++){
                                        ?>
                                            <option value="<?php echo $i?>" <?php if ($i == set_value('type')) {
                                                                                                    echo "selected=selected";
                                                                                                } ?>><?php echo $i?></option>
                                        <?php }?>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="serverid">Сервер&nbsp;<span class="error">*</span></label>
                                        <select class="form-control required" id="serverid" name="serverid">
                                            <option value="0">Сервер сонгох</option>
                                            <?php
                                            if (!empty($add_servers)) {
                                                foreach ($add_servers as $sname) {
                                            ?>
                                                    <option value="<?php echo $sname->serverid ?>" <?php if ($sname->serverid == set_value('serverid')) {
                                                                                                    echo "selected=selected";
                                                                                                } ?>><?php echo $sname->servername?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                
                            </div>

                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="instanceid">instance&nbsp;<span class="error">*</span></label>
                                        <select class="form-control required" id="instanceid" name="instanceid">
                                            <option value="0">instance сонгох</option>
                                            <?php
                                            if (!empty($add_instances)) {
                                                foreach ($add_instances as $iname) {
                                            ?>
                                                    <option value="<?php echo $iname->instanceid ?>" <?php if ($iname->instanceid == set_value('instanceid')) {
                                                                                                    echo "selected=selected";
                                                                                                } ?>><?php echo $iname->instancename?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Статус&nbsp;/A=Active, D=Deactive/<span class="error">*</span></label>
                                        <input type="text" class="form-control required" id="status" placeholder="Статус оруулах" value="<?php echo set_value('status'); ?>" name="status" maxlength="100">
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
                if ($error) {
                ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?>
                <?php
                $success = $this->session->flashdata('success');
                if ($success) {
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
<script src="<?php echo base_url(); ?>assets/js/addDatabase.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {

        jQuery('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });

    });
</script>