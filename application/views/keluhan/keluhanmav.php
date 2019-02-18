<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->
					<div class="inner_content_w3_agile_info">
					<!-- /agile_top_w3_grids-->
					<a href="<?php echo site_url('KeluhanMav/toExcelAll/')?>" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Export Excel</a> 
					</div>  
					<br>
					
						
								<table id="example" class="order-column" style="width:100%">
									<thead>
										<tr>
											<th width="15%">tanggal keluhan</th>
											<th width="15%">terminal</th>
											<th width="15%">jenis keluhan</th>
											<th width="10%">isi keluhan</th>
											<th width="18%">tanggal penanganan</th>
											<th width="18%">penanggung jawab</th>
											<th width="18%">Action</th>
										</tr>
									</thead>
									<tbody><?php foreach ($data_keluhan as $keys) { ?>
										<tr>
											<td><?php echo $keys->tgl_keluhan; ?></td>
											<td><?php echo $keys->nama_terminal ?></td>
											<td><?php echo $keys->jenis_keluhan ?></td>
											<td><?php echo $keys->isi_keluhan ?></td>
											<td><?php echo $keys->tgl_penanganan ?></td>
											<td><?php echo $keys->penanggungjawab ?></td>
											<td>
												<?php if (empty($keys->tgl_penanganan) && empty($keys->penanggungjawab)) { ?>
													
													<a href="<?php echo site_url('KeluhanMav/tangani/').$keys->id_keluhan ?>" type="button" class="btn btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Tangani</a>
												<?php 
											}else{ ?>
												<a href="<?php echo site_url('KeluhanMav/tangani/').$keys->id_keluhan ?>" type="button" class="btn btn-success" disabled><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Tangani</a>
											<?php } ?>
												
											</td>
										</tr>
										<?php } ?>
									</tbody>    
								</table>
								
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
<!-- banner -->
