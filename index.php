<?php
	const APPID = "450284708481891";
	const APPSCRET = "524593080ac4787b7d8eee65bd37955b";
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
	      appId      : '450284708481891',
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

	<p>appli facebook</p>

	<div
  		class="fb-like"
  		data-share="true"
  		data-width="450"
 		 data-show-faces="true">
	</div>
</body>
</html>