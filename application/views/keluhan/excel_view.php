<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Keluhan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

						<!-- //agile_top_w3_post_sections-->
							<!-- /w3ls_agile_circle_progress-->
							<!-- <div class="w3ls_agile_cylinder chart agile_info_shadow"> -->
								
								
								
								<table id="keluhan" class="table table-bordered" style="width:100%">
									<thead>
										<tr>
											<th width="15%">tanggal keluhan</th>
											<th width="15%">terminal</th>
											<th width="15%">jenis keluhan</th>
											<th width="10%">isi keluhan</th>
											<th width="18%">tanggal penanganan</th>
											<th width="18%">penanggung jawab</th>
											
										</tr>
									</thead>
									<tbody><?php foreach ($data_keluhan as $keys) { ?>
										<tr>
											<td><?php echo $keys->tgl_keluhan; ?></td>
											<!-- <td><?php echo $keys->id_camera; ?></td> -->
											<td><?php echo $keys->nama_terminal; ?></td>
											<td><?php echo $keys->jenis_keluhan ?></td>
											<td><?php echo $keys->isi_keluhan ?></td>
											<td><?php echo $keys->tgl_penanganan ?></td>
											<td><?php echo $keys->penanggungjawab ?></td>
											
										</tr>
										<?php } ?>
									</tbody>    
								</table>
