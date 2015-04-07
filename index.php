<?php
	error_reporting(E_ALL);
	ini_set("display_error", 1);

	require "SDKPHP/autoload.php";

	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\GraphObject;

	session_start();

	const APPID = "450284708481891";
	const APPSECRET = "524593080ac4787b7d8eee65bd37955b";

	FacebookSession::setDefaultApplication(APPID, APPSECRET);

	$helper = new FacebookRedirectLoginHelper('https://meludproject.herokuapp.com/');

	if(isset($_SESSION) && isset($_SESSION['fb-token']))
	{
		$session = new FacebookSession($_SESSION['fb-token']);
	}
	else
	{
		$session = $helper->getSessionFromRedirect();
	}
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
	<?php
		if($session)
		{
			$_SESSION['fb-token'] = (string) $session->getAccessToken();
			$request_user = new FacebookRequest($session,"GET","/me");
			$request_user_executed = $request_user->execute();
			$user = $request_user_executed->getGraphObject(GraphUser::className());

			echo "bonjour ".$user->getName();
			//var_dump($user);
		}
		else
		{
			$loginUrl = $helper->getLoginUrl();
			echo "<a href=".$loginUrl.">Cliquez</a><br><br>";
		}
	?>
	<div class="fb-like" data-share="true" data-width="450" data-show-faces="true"></div>
</body>
</html>