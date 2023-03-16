<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Дэд систем
        <small>Нэмэх/Засах/Устгах</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addNewSubSystem"><i class="fa fa-plus"></i>Нэмэх</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3>Дэд системүүдийн жагсаалт</h3>
                   
                </div><!-- /.box-header -->
				<div>&nbsp;<div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>№</th>
                  <th>Нэр</th>
                  <th>Линк</th>
                  <th>Дэлгэрэнгүй</th>
				  <th>Апп сервер</th>
                  <th>Database</th>
                  <th>Schema</th>
                  <th>Лог харах зам</th>

                </tr>
                </thead>
                <tbody>
				
				
				 <?php 
                    if(!empty($subsystemRecords))
                    { $i=1;
                        foreach($subsystemRecords as $record)
                        {
                    ?>
					
                <tr>
                  <td><?php echo $i;?>.</td>
                  <td><?php echo $record->name; ?></td>
                  <td><a target ="blank" href="<?php echo $record->link; ?>"><?php if($record->link) { echo $record->link; } else { echo 'N/A';}?></a></td>
                  <td> <?php if($record->description) { echo substr($record->description, 0, 20); } else { echo 'N/A';}?></td>
				  <td> <?php if($record->ip_address) { echo $record->ip_address; } else { echo 'N/A';}?></td>
                  <td> <?php if($record->db) { echo $record->db; } else { echo 'N/A';}?></td>
                  <td> <?php if($record->schema) { echo $record->schema; } else { echo 'N/A';}?></td>
                  <td> <?php if($record->file_log) { echo $record->file_log; } else { echo 'N/A';}?></td>
                   <td class="text-center">
                           <a class="btn btn-sm btn-primary" href="<?php echo base_url().'viewSubSystem/'.$record->id; ?>" title="View"><i class="fa fa-history"></i></a>&nbsp;
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'modifySubSystem/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;
                            						
							<a class="btn btn-sm btn-danger deleteCustomer" href="#" data-id="<?php echo $record->id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
							
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
