<?php

global $wpdb;
$position=get_option('wppm_ga_option');
$gacode=get_option('wppm_ga_code');

function wppm_analytics_code($gacode) {

global $gacode;
  ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-147397559-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo $gacode; ?>');
</script>

  <?php
 
}


	
if($position=="footer"){
add_action( 'wp_footer', 'wppm_analytics_code', 10,1 );
 	
}else{
	
	add_action( 'wp_head', 'wppm_analytics_code', 10,1 );
	
}


?>