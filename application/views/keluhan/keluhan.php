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
											<th width="10%">Tanggal Keluhan</th>
											<th width="15%">link RTSP</th>
											<th width="10%">Jenis Keluhan</th>
											<th width="10%">Isi Keluhan</th>
											<th width="10%">Tanggal Penanganan</th>
											<th width="10%">Penanggung Jawab</th>
                                        </tr>
									</thead>
									<tbody><?php foreach ($data_keluhan as $key) { ?>
										<tr>
											<td><?php echo $key->tgl_keluhan ?></td>
											<td><?php echo $key->nama_terminal ?></td>
											<td><?php echo $key->jenis_keluhan ?></td>
											<td><?php echo $key->isi_keluhan ?></td>
											<td><?php echo $key->tgl_penanganan ?></td>
											<td><?php echo $key->penanggungjawab ?></td>
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
	
	
<!-- banner -->
