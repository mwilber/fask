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
	
	<script type="text/javascript">
		
		var facebookappid = '130551640347075';
		//var facebookuserid = '<?php echo time(); ?>';
		var logintarget = 'https://apps.facebook.com/appstarterkit/';

	</script>
	
</head>
<body>

<div id="container">
	<div id="main" role="main">
		<h1>Basic Sharing (no extended permissions required)</h1>
		<ul>
			<li><a href="#" onclick="WallPost('https://fask.herokuapp.com/', 'FacebookAppStarter', 'All the facebook basics', 'https://fask.herokuapp.com/images/fask.png', 'FASK', 'Spread the word!'); return false;">Wall Post</a></li>
		</ul>
	</div>
	<div id="fb-root"></div>
</div> <!--! end of #container -->

<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>	
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

<script src="js/script.js"></script>
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
