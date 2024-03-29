<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Серверүүдийн мэдээлэл
        <small>Нэмэх/Засах/Устгах</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addNewServer"><i class="fa fa-plus"></i> &nbsp;Нэмэх</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3>Серверүүдийн Жагсаалт</h3>
                   
                </div><!-- /.box-header -->
				<div>&nbsp;<div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>№</th>
                  <th>Серверийн нэр</th>
                  <th>IP хаяг</th>
                  <th>Үзүүлэлт</th>
				  <th>Дэлгэрэнгүй</th>
                  <th>Үйлдэл</th>
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
                  <td><?php echo $i;?>.</td>
                  <td><?php echo $record->servername; ?></td>
                  <td><?php echo $record->ip_address ? $record->ip_address : 'N/A';?></td>
                  <td> <?php echo $record->server_info ? $record->server_info : 'N/A';?></td>
				  <td> <?php if($record->description) { echo $record->description; } else { echo 'N/A';}?></td>
                   <td class="text-center">
                           <a class="btn btn-sm btn-primary" href="<?php echo base_url().'viewServer/'.$record->serverid; ?>" title="View"><i class="fa fa-info"></i></a>&nbsp;
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'modifyServer/'.$record->serverid; ?>" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;
                            						
							<a class="btn btn-sm btn-danger deleteServer" href="#" data-id="<?php echo $record->serverid; ?>" title="Delete"><i class="fa fa-trash"></i></a>
							
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
            jQuery("#searchList").attr("action", baseURL + "serverListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
