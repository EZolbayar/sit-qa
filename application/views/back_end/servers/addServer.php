<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-server"></i> Server Management
            <small>Add New Server</small>
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
                                <h3 class="box-title">Enter Server Details</h3>
                            </div>
                            <div class="col-md-6"><a class="btn btn-sm btn-primary" href="<?php echo base_url() . 'serverListing' ?>" title="Back to Servers List"><i class="fa fa-backward"></i></a></div>
                        </div>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addServer" action="<?php echo base_url() ?>addNewServer" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <span aria-hidden="true" class="error">*</span>&nbsp;Required field
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sname">Server Name&nbsp;<span class="error">*</span></label>
                                        <input type="text" class="form-control required" placeholder="Enter Server Name" value="<?php echo set_value('sname'); ?>" id="sname" name="sname" maxlength="128">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ipaddress">IP Address&nbsp;<span class="error">*</span></label>
                                        <input type="text" class="form-control" id="ipaddress" placeholder="Enter IP Address" value="<?php echo set_value('ipaddress'); ?>" name="ipaddress" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="systeminfo">Systemm Information</label>
                                        <textarea name="systeminfo" class="form-control" cols="6" rows="2" placeholder="Enter Information"> <?php echo set_value('systeminfo'); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="desc">Description</label>
                                        <textarea name="desc" cols="6" rows="2" class="form-control" placeholder="Enter Description"> <?php echo set_value('desc'); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cid">Type /1 = db server, 2 = App server/&nbsp;<span class="error">*</span></label>
                                        <select class="form-control required" id="type" name="type">
                                            <option value="0">Select Type</option>
                                            <?php
                                            if (!empty($add_servers)) {
                                                foreach ($add_servers as $type) {
                                            ?>
                                                    <option value="<?php echo $type->type ?>" <?php if ($type->type == set_value('type')) {
                                                                                                    echo "selected=selected";
                                                                                                } ?>><?php echo $type->type ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                            
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />&nbsp;&nbsp;
                            <input type="reset" class="btn btn-default" value="Reset" />
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
<script src="<?php echo base_url(); ?>assets/js/addServer.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {

        jQuery('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });

    });
</script>