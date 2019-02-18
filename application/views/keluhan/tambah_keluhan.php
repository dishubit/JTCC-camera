<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->
					<div class="inner_content_w3_agile_info">
					<!-- /agile_top_w3_grids-->
						
					<!-- //agile_top_w3_grids-->
						<!-- /agile_top_w3_post_sections-->
							<!-- <div class="agile_top_w3_post_sections">
							       <div class="col-md-6 agile_top_w3_post agile_info_shadow">
										   
									</div>
									<div class="col-md-6 agile_top_w3_post_info agile_info_shadow">
										    
							        </div>
								    <div class="clearfix"></div>
							</div> -->
								   
						<!-- //agile_top_w3_post_sections-->
							<!-- /w3ls_agile_circle_progress-->
							<!-- <div class="w3ls_agile_cylinder chart agile_info_shadow">  -->
								<div class="container-fluid p-0">

      <div class="col-sm-12">
        <div class="my-auto">
          <br>
          <?php if (validation_errors()) {
                                                   ?><?php } 
                                                else if ($this->session->flashdata('terhapus')) {
                                                   ?><div style="margin-top: 20px" class="alert alert-danger">
                                                    <strong><?php echo $this->session->flashdata('terhapus'); ?></strong></div><?php } else if ($this->session->flashdata('fail')) {
                                                   ?><div style="margin-top: 20px" class="alert alert-danger">
                                                    <strong><?php echo $this->session->flashdata('fail'); ?></strong></div><?php } else if ($this->session->flashdata('sudah_input')) {
                                                   ?><div style="margin-top: 20px" class="alert alert-success">
                                                    <strong><?php echo $this->session->flashdata('sudah_input'); ?></strong></div><?php } ?>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="panel panel-default">
                        <div class="panel-body">
                <?php echo form_open_multipart('keluhan/add/'.$this->uri->segment(3)); ?>
                    <?php if (validation_errors()) {
                        ?>
						<div style="margin-top: 0px" class="alert alert-danger">
                              <strong><?php echo validation_errors(); ?></strong></div><?php } ?>
                        <div class="table-responsive">

                        	<div style="margin-top: 0px" class="form-group">
								<label>Terminal</label>
								<?php foreach ($get_camera as $key) {
									if($key->id_camera == $this->uri->segment(3)){ 
										foreach ($data_terminal as $ter) {
											if ($ter->id_terminal == $key->id_terminal) {?>
										<input class="form-control" id="link" name="link" type="text" value="<?php echo set_value('$ter->nama_terminal;')  ?>" placeholder="<?php echo $ter->nama_terminal; ?>"  disabled>
										<input type="hidden" name="nama_terminal" id="nama_terminal" value="<?php echo $ter->nama_terminal; ?>" >	
									<?php }}}
								} ?>

                                							
							</div>
							
							<div style="margin-top" class="form-group">
								<label>Tanggal Keluhan</label>
								<input class="form-control" type="date" name="tgl_keluhan" id="tgl_keluhan" placeholder="Tanggal Keluhan" value="<?php echo set_value('tgl_keluhan') ?>">
	                        	<span class="help-block">Masukkan Tanggal Anda Membuat Keluhan</span>
							</div>
							
							

							<div style="margin-top: " class="form-group">
                                            <label>Jenis Keluhan</label>
                                            <select class="form-control input-lg" id="required" name='id_jeniskeluhan' data-placeholder="Pilih Jenis Keluhan">
												<?php foreach ($jeniskeluhan as $key) { ?>
													<?php echo "<option value='".$key->id_jeniskeluhan."'>".$key->jenis_keluhan."</option>" ?>
												<?php } ?>
                                            </select>
                                            <span class="help-block">Masukkan Jenis Keluhan Anda</span>
                            </div>

                            <div style="margin-top: 0px" class="form-group">
								<label>Keluhan</label>
								<textarea class="form-control" row="5" id="isi_keluhan" name="isi_keluhan" placeholder="Keluhan Anda" value="<?php echo set_value('isi_keluhan') ?>"></textarea>
                        		<span class="help-block">Masukkan Keluhan Anda</span>
							</div>

							

                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>  Konfirmasi</button>
                                
							</div>
                          <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

      
    <div class="clearfix"> </div>
    </div>
								
							 <!-- </div> -->
						<!-- /w3ls_agile_circle_progress-->
						<!-- /chart_agile-->
						 
						  <!-- /w3ls_agile_circle_progress-->
							
						</div>
						<!-- /w3ls_agile_circle_progress-->
						 <!--/prograc-blocks_agileits-->
							<div class="prograc-blocks_agileits">
								
								
								
								
									 <div class="clearfix"></div>
							</div> 

							  <!--//prograc-blocks_agileits-->
						<!-- /bottom_agileits_grids-->
						<!-- <div class="bottom_agileits_grids">
							<div class="col-md-4 profile-main">
						
					    	</div>
							<div class="col-md-8 chart_agile agile_info_shadow">
							
							</div>
											
						
							 <div class="clearfix"></div>
						</div> -->
						<!-- //bottom_agileits_grids-->
												<!-- /weather_w3_agile_info-->
						<!-- <div class="weather_w3_agile_info agile_info_shadow">
								
						</div> -->
						<!-- //weather_w3_agile_info-->
						<!-- /social_media-->
						  <!-- <div class="social_media_w3ls">
						 
						      
							  <div class="clearfix"></div>
													
						</div> -->
						<!-- //social_media-->
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
	
<!-- banner -->
