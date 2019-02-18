<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->
					<div class="inner_content_w3_agile_info">
					<!-- /agile_top_w3_grids-->

        <div class="my-auto">
            <a id="myBtn" class="btn btn-success" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a>
            <br>
            <br>
            <?php if (validation_errors()) {?>
                <div style="margin-top: 20px" class="alert alert-danger">
                <strong><?php echo validation_errors(); ?></strong></div><?php } 
                else if ($this->session->flashdata('terhapus')) {?>
                    <div style="margin-top: 20px" class="alert alert-danger">
                    <strong><?php echo $this->session->flashdata('terhapus'); ?></strong></div>
                    <?php } else if ($this->session->flashdata('fail')) {?>
                        <div style="margin-top: 20px" class="alert alert-danger">
                        <strong><?php echo $this->session->flashdata('fail'); ?></strong></div>
                        <?php } else if ($this->session->flashdata('sudah_input')) {?>
                            <div style="margin-top: 20px" class="alert alert-success">
                            <strong><?php echo $this->session->flashdata('sudah_input'); ?></strong></div><?php } ?>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                <?php if (validation_errors() || $this->session->flashdata('gagal')) {
                                   ?><div  id="myModal" class="modal" style="display: block;"><?php 
                                }else if($this->session->flashdata('error')){
                                    ?><div  id="myModal" class="modal" style="display: block;"><?php
                                }else{
                                    ?><div  id="myModal" class="modal"><?php
                                }?>
                            
                                <div style="margin-top: 100px; margin-left: 200px; width: 70%" class="modal-content">
                                    <div class="modal-header" style="background-color: #b80020">
                                        <span class="close">&times;</span>
                                        <h2>Status <i class="glyphicon glyphicon-tasks"></i></h2>
                                    </div>
                                    <div class="modal-body">
                                        <div style="margin-top: 10px" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="table-responsive">
                                        <?php echo form_open_multipart('status/add'); ?>
                                        <?php if (validation_errors()) {
                                                   ?><div style="margin-top: 20px" class="alert alert-danger">
                                                    <strong><?php echo validation_errors(); ?></strong></div><?php } 
                                                else if ($this->session->flashdata('gagal')) {
                                                   ?><div style="margin-top: 20px" class="alert alert-danger">
                                                    <strong><?php echo $this->session->flashdata('gagal');; ?></strong></div><?php }?>

                                        
                                        <div style="margin-top: " class="form-group">
                                            <label>Nama Terminal</label>
                                            <select class="form-control input-lg" id="required" name='id_terminal' data-placeholder="Nama Terminal">
                                            <?php foreach ($terminal as $key) { ?>
                                                 <?php echo "<option value='".$key->id_terminal."'>".$key->nama_terminal."</option>" ?>
                                            <?php } ?>
                                            </select>
                                        </div>

                                        <div style="margin-top: " class="form-group">
                                            <labelIP</label>
                                            <input class="form-control" id="ip" type="text" name="ip" value="<?php echo set_value('ip') ?>" placeholder="IP">
                                        </div>
                                        
                                        <button style="height: 40px; width: 160px; margin-left: 310px;margin-top: 0px; background-color: #1abc9c" type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Konfirmasi</button>
                                        
                                        <?php echo form_close(); ?>
                                       
                                        </div>
                                 <br>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                            
                                    </div>
                                  </div>

                                </div>

                    
								<table id="example" class="order-column" style="width:100%">
									<thead>
										<tr>
											<th width="5%">No</th>
											<th width="15%">Terminal</th>
											<th width="15%">IP</th>
											<th width="10%">Status</th>
											<th width="15%">Action</th>
										</tr>
									</thead>
                                    <?php $counter=1; ?>
									<tbody><?php foreach ($data_status as $key) { ?>
										<tr>
											<td><?php echo $counter++  ?></td>
											<td><?php echo $key->nama_terminal ?></td>
											<td><?php echo $key->ip ?></td>
                                            <td><?php
                                                    $host=$key->ip;

                                                    exec("ping -c 4 " . $host,$output, $result);
                                                    // print_r($output);
                                                    // echo $host;
                                                    if ($result == 0){?>
                                                    
                                                    <button type="button" class="btn btn-success">Successful</button>
                                                    
                                                    <?php }else{?>
                                                    
                                                    <button type="button" class="btn btn-danger">Time Out</button>
                                                    
                                                    
                                                    <?php }
                                                ?>
                                            </td>
											<td><a href="<?php echo site_url('status/edit/').$key->id_status ?>" type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>|<a href="<?php echo site_url('status/delete/').$key->id_status ?>" type="button" class="btn btn-warning" onClick="JavaScript: return confirm('Anda yakin Hapus data ini ?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Hapus</a></td>
										
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
	<br>
	<br>
	
<!-- banner -->
