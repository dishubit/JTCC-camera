<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->
					<div class="inner_content_w3_agile_info">
					<!-- /agile_top_w3_grids-->
								<table id="example" class="order-column" style="width:100%">
									<thead>
										<tr>
											<th width="15%">link RTSP</th>
											<th width="10%">Terminal</th>
											<th width="18%">Action</th>
										</tr>
									</thead>
									<tbody><?php foreach ($data_camera as $key) { ?>
										<tr>
											<td><?php echo $key->link; ?></td>
											<td><?php echo $key->nama_terminal ?></td>
											<td><a href="<?php echo site_url('crud/view/').$key->id_camera ?>" target="_blank" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View</a>|<a href="<?php echo site_url('crud/edit/').$key->id_camera ?>" type="button" class="btn btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>|<a href="<?php echo site_url('crud/delete/').$key->id_camera ?>" type="button" class="btn btn-danger" onClick="JavaScript: return confirm('Anda yakin Hapus data ini ?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Hapus</a>|<a href="<?php echo site_url('keluhan/add/').$key->id_camera ?>" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Keluhan</a> </td>
										
										</tr>
										<?php } ?>
									</tbody>    
								</table>
						</div>
				    </div>
					<!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
<!-- banner -->
