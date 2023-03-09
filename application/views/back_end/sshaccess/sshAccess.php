<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> SSH Access Management
        <small>SSH Access Control for Add/Edit/Delete Module</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addNewSshAccess"><i class="fa fa-plus"></i> Add New SSH Access</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3>List of SSH Access</h3>
                   
                </div><!-- /.box-header -->
				<div>&nbsp;<div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>№</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Password</th>
				  <th>IP address</th>
                  <th>Description</th>
                </tr>
                </thead>
                <tbody>
				
				
				 <?php 
                    if(!empty($sshAccessRecords))
                    { $i=1;
                        foreach($sshAccessRecords as $record)
                        {
                    ?>
					
                <tr>
                    <td><?php echo $i;?>.</td>
                  <td><?php echo $record->name; ?></td>
                  <td><?php if($record->username) { echo $record->username; } else { echo 'N/A';}?></td>
                  <td data-title = "Password"> &nbsp;&nbsp;
                  <input name = "viewPass" type="password" value = "<?php if($record->password) { echo $record->password; } else { echo 'N/A';}?>" readonly>
                    <button type = "button" id="" class = "btn btn-sm btn-primary" name = "dynamic"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  
                    </td>
				  <td> <?php if($record->ip_address) { echo $record->ip_address; } else { echo 'N/A';}?></td>
				  <td> <?php if($record->description) { echo $record->description; } else { echo 'N/A';}?></td>
                   <td class="text-center">
                           <a class="btn btn-sm btn-primary" href="<?php echo base_url().'viewSshAccess/'.$record->id; ?>" title="View"><i class="fa fa-history"></i></a>&nbsp;
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'modifySshAccess/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;
                            						
							<a class="btn btn-sm btn-danger deleteSshAccess" href="#" data-id="<?php echo $record->id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
							
                        </td>
                </tr>
				<?php
                        $i++; }
                    }
                    ?>
                </tbody>
                </tfoot>
              </table>
            </div>&nbsp;</div>
                <!-- /.box-body -->
               
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "customerListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
<script>
var myButton = document.getElementsByName('dynamic');
var myInput = document.getElementsByName('viewPass');
myButton.forEach(function(element, index){
  element.onclick = function(){
     'use strict';

      if (myInput[index].type == 'password') {
          myInput[index].setAttribute('type', 'text');
          element.firstChild.textContent = '';
          element.firstChild.className = "fa fa-eye-slash";

      } else {
           myInput[index].setAttribute('type', 'password');
           element.firstChild.textContent = '';
            element.firstChild.className = "fa fa-eye";
      }
  }
})
</script>