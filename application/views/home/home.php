<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->
					<div class="inner_content_w3_agile_info">
					<!-- /agile_top_w3_grids-->
					   <div class="agile_top_w3_grids">
					          <ul class="ca-menu">
									<li>
										<a href="#">
											
											<i class="fa fa-bus" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main"><?php echo $this->db->count_all_results('terminal'); ?></h4>
												<h3 class="ca-sub">Terminal</h3>
											</div>
										</a>
									</li>
									<li>
										<a href="<?php echo site_url('Keluhan') ?>">
										  <i class="fa fa-tasks" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main one"><?php echo $this->db->count_all_results('keluhan'); ?></h4>
												<h3 class="ca-sub one">Keluhan</h3>
											</div>
										</a>
									</li>
									<li>
										<a href="<?php echo site_url('Keluhan') ?>">
											<i class="fa fa-cloud" aria-hidden="true"></i>
											<div class="ca-content">
											<h4 class="ca-main two"><?php echo $this->db->where('id_jeniskeluhan',1)->count_all_results('keluhan'); ?></h4>
												<h3 class="ca-sub two">Network</h3>
											</div>
										</a>
									</li>
									<li>
										<a href="<?php echo site_url('Keluhan') ?>">
											<i class="fa fa-television" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main three"><?php echo $this->db->where('id_jeniskeluhan',2)->count_all_results('keluhan'); ?></h4>
												<h3 class="ca-sub three">Hardware</h3>
											</div>
										</a>
									</li>
										<li>
										<a href="<?php echo site_url('Keluhan') ?>">
											<i class="fa fa-terminal" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main four"><?php echo $this->db->where('id_jeniskeluhan',3)->count_all_results('keluhan'); ?></h4>
												<h3 class="ca-sub four">Software</h3>
											</div>
										</a>
									</li>
									<div class="clearfix"></div>
								</ul>
					   </div>
					
						</div>
						
				    </div>
					<!-- //inner_content_w3_agile_info-->

				</div>
		<!-- //inner_content-->
		<br>
		<br>
		<br>

	</div>
<!-- banner -->
