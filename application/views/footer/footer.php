<!--copy rights start here-->
	
	
		<div class="copyrights">
			
			<p align="center">© All Rights Reserved|Developed by Rizky & Ayu | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
			<h5>
				<table style="width:100%">
						<tr>
							<td><p align="left"> <i class="fa fa-envelope"></i> rizkyalviandra@gmail.com</p></td>
							<td><p align="right">ayu.permatasari.pm@gmail.com <i class="fa fa-envelope"></i> </p></td>
						</tr>
						<tr>
							<td><p align="left"> <i class="fa fa-github"></i> rizkyalviandra</p></td>
							<td><p align="right">ayupermatasari <i class="fa fa-github"></i> </p></td>
						</tr>
			</table>
			</h5>
		</div>
		
<!--copy rights end here-->
<!-- js -->

<script type="text/javascript" src="<?php echo base_url('') ?>assets/home/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('') ?>assets/DataTables/datatables.min.js"></script>
<script src="<?php echo base_url('') ?>assets/exports/FileSaver.min.js"></script>
<script src="<?php echo base_url('') ?>assets/exports/tableexport.min.js"></script>

<script>
	$("#example").tableExport();
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>



    <!-- /amcharts -->
				<script src="<?php echo base_url('') ?>assets/home/js/amcharts.js"></script>
		       <script src="<?php echo base_url('') ?>assets/home/js/serial.js"></script>
				<script src="<?php echo base_url('') ?>assets/home/js/export.js"></script>	
				<script src="<?php echo base_url('') ?>assets/home/js/light.js"></script>
				<!-- Chart code -->
	 
<!-- Chart code -->


	<!-- //amcharts -->
		<script src="<?php echo base_url('') ?>assets/home/js/chart1.js"></script>
				<script src="<?php echo base_url('') ?>assets/home/js/Chart.min.js"></script>
		<script src="<?php echo base_url('') ?>assets/home/js/modernizr.custom.js"></script>
		
		<script src="<?php echo base_url('') ?>assets/home/js/classie.js"></script>
		<script src="<?php echo base_url('') ?>assets/home/js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
			<!-- script-for-menu -->

<!-- /circle-->
	 <script type="text/javascript" src="<?php echo base_url('') ?>assets/home/js/circles.js"></script>
					         <script>
								var colors = [
										['#ffffff', '#fd9426'], ['#ffffff', '#fc3158'],['#ffffff', '#53d769'], ['#ffffff', '#147efb']
									];
								for (var i = 1; i <= 7; i++) {
									var child = document.getElementById('circles-' + i),
										percentage = 30 + (i * 10);
										
									Circles.create({
										id:         child.id,
										percentage: percentage,
										radius:     80,
										width:      10,
										number:   	percentage / 1,
										text:       '%',
										colors:     colors[i - 1]
									});
								}
						
				</script>
	<!-- //circle -->
	<!--skycons-icons-->
<script src="<?php echo base_url('') ?>assets/home/js/skycons.js"></script>
<script>
									 var icons = new Skycons({"color": "#fcb216"}),
										  list  = [
											"partly-cloudy-day"
										  ],
										  i;

									  for(i = list.length; i--; )
										icons.set(list[i], list[i]);
									  icons.play();
								</script>
								<script>
									 var icons = new Skycons({"color": "#fff"}),
										  list  = [
											"clear-night","partly-cloudy-night", "cloudy", "clear-day", "sleet", "snow", "wind","fog"
										  ],
										  i;

									  for(i = list.length; i--; )
										icons.set(list[i], list[i]);
									  icons.play();
								</script>
<!--//skycons-icons-->
<!-- //js -->
<script src="<?php echo base_url('') ?>assets/home/js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>
		<script src="<?php echo base_url('') ?>assets/home/js/flipclock.js"></script>
	
	<script type="text/javascript">
		var clock;
		
		$(document).ready(function() {
			
			clock = $('.clock').FlipClock({
		        clockFace: 'HourlyCounter'
		    });
		});
	</script>
<script src="<?php echo base_url('') ?>assets/home/js/bars.js"></script>
<script src="<?php echo base_url('') ?>assets/home/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url('') ?>assets/home/js/scripts.js"></script>

<script type="text/javascript" src="<?php echo base_url('') ?>assets/home/js/bootstrap-3.1.1.min.js"></script>

<script type="text/javascript">
            var modal = document.getElementById('myModal');
            var btn = document.getElementById("myBtn");
            var span = document.getElementsByClassName("close")[0];
            btn.onclick = function() {
                modal.style.display = "block";
            }
            span.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }  
          </script>

</body>
</html>