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
                <?php echo form_open_multipart('KeluhanMav/tangani/'.$this->uri->segment(3)); ?>
                    <?php if (validation_errors()) {
                        ?>
						<div style="margin-top: 0px" class="alert alert-danger">
                              <strong><?php echo validation_errors(); ?></strong></div><?php } ?>
                        <div class="table-responsive">

                        	<div style="margin-top: 0px" class="form-group">
								<label>Terminal</label>
								<?php foreach ($get_keluhan as $kel ) 
									{
										if ($kel->id_keluhan == $this->uri->segment(3) )
										{
											  ?>
											 					<input class="form-control" id="terminal" name="terminal" type="text" value="<?php echo set_value('$kel->nama_terminal;')  ?>" placeholder="<?php echo $kel->nama_terminal; ?>"  disabled>
											 				  <?php } 
											 			}
							
								?>
															
							</div>
							
							<div style="margin-top" class="form-group">
								<label>Tanggal Keluhan</label>
								<?php foreach ($get_keluhan as $data) {
									if($data->id_keluhan == $this->uri->segment(3)){ ?>
										<input class="form-control" id="tgl_keluhan" name="tgl_keluhan" type="text" value="<?php echo set_value('$data->id_keluhan;')  ?>" placeholder="<?php echo $data->tgl_keluhan; ?>"  disabled>
										
									<?php }
								} ?>
	                        	
							</div>
							
							

							<div style="margin-top: " class="form-group">
                                   <label>Jenis Keluhan</label>
                                   <?php
                                   foreach ($get_keluhan as $kel) 
											 {
											 	if ($kel->id_keluhan == $this->uri->segment(3) ) 
											 	{
											 			foreach ($jeniskeluhan as $jen) 
											 			{
											 				if ($jen->id_jeniskeluhan == $kel->id_jeniskeluhan) { ?>
											 					<input class="form-control" id="id_jeniskeluhan" name="id_jeniskeluhan" type="text" value="<?php echo set_value('$jen->id_jeniskeluhan;')  ?>" placeholder="<?php echo $jen->jenis_keluhan; ?>"  disabled>
											 				  <?php } 
											 			}
											 	}
											 }
											 ?>
                                            
                                            
                            </div>

                            <div style="margin-top: 0px" class="form-group">
								<label>Keluhan</label>
								<?php foreach ($get_keluhan as $data) {
									if($data->id_keluhan == $this->uri->segment(3)){ ?>
										<input class="form-control" id="isi_keluhan" name="isi_keluhan" type="text" value="<?php echo set_value('$data->id_keluhan;')  ?>" placeholder="<?php echo $data->isi_keluhan; ?>"  disabled>
										
									<?php }
								} ?>
                        		
							</div>

							<div style="margin-top" class="form-group">
								<label>Tanggal Penanganan</label>
								<input class="form-control" type="date" name="tgl_penanganan" id="tgl_penanganan" placeholder="Tanggal Penanganan" value="<?php echo set_value('tgl_penanganan') ?>">
	                        	<span class="help-block">Masukkan Tanggal Penanganan</span>
							</div>

							<div style="margin-top: 0px" class="form-group">
								<label>Penanggung jawab</label>
								<input type="text" class="form-control" row="5" id="penanggungjawab" name="penanggungjawab" placeholder="Penanggung Jawab" value="<?php echo set_value('penanggungjawab') ?>"></textarea>
                        		<span class="help-block">Masukkan Nama Penanggung Jawan</span>
							</div>

							

                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>  Konfirmasi</button>
                                <a href="<?php echo site_url('KeluhanMav') ?>" class="btn btn-danger" role="button"><i class="fa fa-chevron-left"></i> Back</a>
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
