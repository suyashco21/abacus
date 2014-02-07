<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
</head>

<body>
<?php
$app_id = '178188202317128';
$app_secret = 'e177d9003f20673f88be2734756831eb';
$perm = "user_likes,email,publish_actions,publish_checkins,publish_stream";
$my_url = "http://abacusiet.org/kscope.php";

 session_start();
   @$code = $_REQUEST["code"];

   if(empty($code)) 
   {
     $_SESSION['state'] = md5(uniqid(rand(), TRUE));
     $dialog_url = "https://www.facebook.com/dialog/oauth?client_id=".$app_id."&scope=".$perm."&redirect_uri=".urlencode($my_url)."&state=".$_SESSION['state'];
     echo("<script> top.location.href='" . $dialog_url . "'</script>");
   }
	
	 if($_REQUEST['state'] == $_SESSION['state']) 
   {
   
     $token_url = "https://graph.facebook.com/oauth/access_token?client_id=".$app_id."&redirect_uri=".urlencode($my_url)."&client_secret=".$app_secret."&code=".$code;
     $response = file_get_contents($token_url);
     $params = null;
     parse_str($response, $params);
     $graph_url = "https://graph.facebook.com/me?access_token=".$params['access_token'];
     $user = json_decode(file_get_contents($graph_url));
     $uid = $user->id;
	echo $user->name;
	$_SESSION['auth_token'] = $params['access_token'];
	
	header("location:connect.php");
	}
	
?>
</body>

</html>
