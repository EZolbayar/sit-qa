<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-cab"></i> Database мэдээлэл
        <small>Database тохиргоо  Нэмэх/Засах/Устгах</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addNewDatabase"><i class="fa fa-plus"></i> Нэмэх</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3>Жагсаалт</h3>
                   
                </div><!-- /.box-header -->
				<div>&nbsp;<div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>№</th>
                  <th>Нэр</th>
                  <th>Схем</th>
                  <th>Нууц үг</th>
				  <th>IP хаяг</th>
                  <th>Тайлбар</th>
                  <th>Үйлдэл</th>
                </tr>
                </thead>
                <tbody>
				
				
				 <?php 
                    if(!empty($databaseRecords))
                    { $i=1;
                        foreach($databaseRecords as $record)
                        {
                    ?>
					
                <tr>
                  <td><?php echo $i;?>.</td>
                  <td><?php echo $record->name; ?></td>
                  <td><?php if($record->username) { echo $record->username; } else { echo 'N/A';}?></td>
                  <td data-title = "Password"> &nbsp;&nbsp;
                  <input name = "viewPass" type="password" value = "<?php if($record->password) { echo $record->password; } else { echo 'N/A';}?>" readonly>
                    <button type = "button" class = "btn btn-sm btn-primary right" name = "dynamic"><i class="fa fa-eye" aria-hidden="true"></i></button>
                    </td>
				  <td id = "myInput"> <?php if($record->ip) { echo $record->ip; } else { echo 'N/A';}?>
                  <button name = "copyBtn" class = "btn btn-sm btn-primary"> <i class="fa fa-clipboard" aria-hidden="true"></i></button>
                    </td>
				  <td> <?php if($record->description) { echo $record->description; } else { echo 'N/A';}?></td>
                   <td class="text-center">
                           <a class="btn btn-sm btn-primary" href="<?php echo base_url().'viewDatabase/'.$record->id; ?>" title="View"><i class="fa fa-info" aria-hidden="true"></i></i></a>&nbsp;
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'modifyDatabase/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;
                            						
							<a class="btn btn-sm btn-danger deleteDatabase" href="#" data-id="<?php echo $record->id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
							
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
            console.log(e.preventDefault());       
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "databaseListing/" + value);
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
        //alert(index);
       // index = 0;
       // alert(myInput[index].type);
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
    });
</script>
