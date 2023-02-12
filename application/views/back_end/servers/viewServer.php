<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-cab"></i> Server Management
            <small>View Server Informations</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title">View Server Details</h3>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-sm btn-primary" href="<?php echo base_url() . 'serverListing' ?>" title="Back to Server List">
                                <i class="fa fa-chevron-circle-left"></i></a>
                            </div>
                        </div>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="mobile">Serverid: </label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <?php echo $serverInfo->serverid; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="mobile">Server Name: </label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <?php if ($serverInfo->servername) {
                                        echo $serverInfo->servername;
                                    } else {
                                        echo 'N/A';
                                    }  ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="mobile">IP Address: </label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <?php if ($serverInfo->ip_address) {
                                        echo $serverInfo->ip_address;
                                    } else {
                                        echo 'N/A';
                                    }  ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="mobile">System Information: </label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <?php if ($serverInfo->system_info) {
                                        echo $serverInfo->system_info;
                                    } else {
                                        echo 'N/A';
                                    }  ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="mobile">Description: </label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <?php if ($serverInfo->description) {
                                        echo $serverInfo->description;
                                    } else {
                                        echo 'N/A';
                                    }  ?>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div>
            </div>

        </div>
    </section>
</div>