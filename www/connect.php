<?php
session_start();
//echo $_SESSION['auth_token'];
	
	$attachment =  array(
	'access_token' => $_SESSION['auth_token'],
	'message' => "I just registered for Kaleidoscope. Adventure Sports, Paintball, War of Strings,and Gajendra Verma (Emptyness and mann mera fame), all of this in Kaleidoscope on 15th and 16th feb just for Rs 20. Isn't it awesome?",
	'link' => "http://abacusiet.org/kscope.php",
	'name' => "Kaleidoscope 2013 | Abacus IET | IET DAVV's Official Cynosure",
	'description' => "Abacus Club is IET DAVV's Official Cynosure. Abacus Club hosts Central India's biggest cultural cum technical event, Kaleidoscope. Abacus Club is a student club of IET DAVV, which gives the students an unparalleled platform to grow, learn and have fun, all at the same time. We are a bunch of young enthusiasts, who believe that college life is not just about being serious but also about learning new things via active participation in various activities. Ours is an absolute student group, with all the management in the hands of the students (members) themselves. ",
	'picture'=>"http://abacusiet.org/images/data.png",
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,'https://graph.facebook.com/me/feed');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $attachment);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //to suppress the curl output 
	$result = curl_exec($ch);
	curl_close ($ch);
?>
<script type="text/javascript">
window.location = "http://abacusiet.org";
</script>