<?php
	$likesPage = false;

	function parsePageSignedRequest() {
		if (isset($_REQUEST['signed_request'])) {
			$encoded_sig = null;
			$payload = null;
			list($encoded_sig, $payload) = explode('.', $_REQUEST['signed_request'], 2);
			$sig = base64_decode(strtr($encoded_sig, '-_', '+/'));
			$data = json_decode(base64_decode(strtr($payload, '-_', '+/'), true));
			return $data;
		}
		return false;
	}
	if($signed_request = parsePageSignedRequest()) {
		if($signed_request->page->liked) {
			$likesPage = true;
		}
	}
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->

<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->

<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>FacebookAppStarter</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta property="og:title" content="FacebookAppStarter" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://fask.herokuapp.com/" />
	<meta property="og:image" content="https://fask.herokuapp.com/images/fask.png" />
	<meta property="og:site_name" content="https://fask.herokuapp.com/" />
	<meta property="fb:admins" content="631337813" />

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="stylesheet" href="css/style.css">

	<script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>
<body>
<?php if($likesPage): ?>
	<div id="main" class="wrapper like" style="">
		You like this page
		<br/>
		<a id="get_started" href="index.html" target="_blank">Go To The Main Page</a>
	</div>
<?php else: ?>
	<div class="wrapper nolike" style="">
		Click the Like button above to continue.
	</div>
<?php endif; ?>
<script>

	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID

	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;

	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';

	s.parentNode.insertBefore(g,s)}(document,'script'));

</script>

<!--[if lt IE 7 ]>

	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>

	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>

<![endif]-->

</body>
</html>