<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
    <?php
        foreach ($data_camera as $cam) {
             if ($cam->id_camera == $this->uri->segment(3)) {
                 foreach ($terminal as $ter ) {
                     if ($cam->id_terminal == $ter->id_terminal) {
                         echo $ter->nama_terminal;
                     }
                 }
             }
         } 
    ?>
</title>
<script type="text/javascript" src="<?php echo base_url('') ?>assets/video/vxgplayer-1.7.44.min.js"></script><!-- include JS-->
<link href="<?php echo base_url('') ?>assets/video/vxgplayer-1.7.44.min.css" rel="stylesheet"/><!-- include css -->

 
</head>

<body>
    
    <?php foreach($view_camera as $key) { ?>
	<div class="vxgplayer"
    id="vxg_media_player1" 
    width="1315"
    height="615"
    url="<?php echo $key->link ?>"
    nmf-src="<?php echo base_url('') ?>assets/video/pnacl/Release/media_player.nmf"
    nmf-path="media_player.nmf"
    useragent-prefix="MMP/3.0"
    latency="10000"
    autohide="2"
    volume="0.7"
    autostart=true
    avsync
    mute
    aspect-ratio
    aspect-ratio-mode="1"
    auto-reconnect>
    </div> 
  <?php } ?>
  

</body>
</html>
