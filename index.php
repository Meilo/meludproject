<?php
	error_reporting(E_ALL);
	ini_set("display_error", 1);

	session_start();

	require "SDKPHP/autoload.php";

	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;

	const APPID = "450284708481891";
	const APPSECRET = "524593080ac4787b7d8eee65bd37955b";

	FacebookSession::setDefaultApplication(APPID, APPSECRET);

	$helper = new FacebookRedirectLoginHelper('https://meludproject.herokuapp.com/');
	$loginUrl = $helper->getLoginUrl();

	echo $loginUrl;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Test</title>
</head>
<body>
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '<?php echo APPID; ?>',
	      xfbml      : true,
	      version    : 'v2.3'
	    });
	  };

	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>

	<h1>appli facebook</h1>
	<a href="<?php echo $loginUrl ?>">Cliquez</a>
	<div
  		class="fb-like"
  		data-share="true"
  		data-width="450"
 		 data-show-faces="true">
	</div>
</body>
</html>