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

	<meta name="viewport" content="width=520">

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/jquery.facebook.multifriend.select.css" />

	<script src="js/libs/modernizr-2.0.6.min.js"></script>
	
	<script type="text/javascript">
		
		var FBconfig = {
			app:{
				id: '130551640347075',								// id of facebook application
				perms: 'publish_stream, user_photos, user_likes',	// extended permissions required of htis app. Leave as empty string for no extended permissions.
				site: 'http://fask.herokuapp.com/'					// direct url to app server
			},
			login:{
				method: 'popup',									// 'redirect' or 'popup'
				target: 'http://www.facebook.com/greenzeta?sk=app_130551640347075'				// endpoint url if loginmethod is 'redirect'
			},
			likegate:{												// Not required for the tab app based like gate
				targetid: '130551640347075',
				targeturl: 'http://www.facebook.com/greenzeta?sk=app_130551640347075'
			}
		};
		
	</script>
	
</head>
<body>

<div id="container">
	<header></header>
	<div id="main" role="main">
		<!--! begin app content -->
		<strong>Created by <a href="http://www.greenzeta.com" target="_blank">Internet Software Developer Matthew Wilber</a></strong>
		<p>
			FASK provides a ready made starting point for building facebook apps using the facebook javascript api.
			It&rsquo;s built on the <a href="http://html5boilerplate.com/" target="_blank">HTML5 Boilerplate</a> and provides functions for many of the most commonly used facebook functions.
		</p>
		<a id="download" href="fask.zip"><img src="images/download.png"><br/>Download FASK 2.0.1</a>
		<h3>Basic Features</h3>
		<ul>
			<li><a href="#" onclick="WallPost('https://fask.herokuapp.com/', 'FacebookAppStarter', 'All the facebook basics', 'https://fask.herokuapp.com/images/fask.png', 'FASK'); return false;">Wall Post</a></li>
			<li><a href="#" onclick="ShareMessage('https://fask.herokuapp.com/', 'FacebookAppStarter', 'All the facebook basics', 'https://fask.herokuapp.com/images/fask.png'); return false;">Private Message</a></li>
			<li><a href="#" onclick="SendInvite('All the facebook basics'); return false;">App Invite</a></li>
			<li><a href="#" onclick="AddToPage(); return false;">Add This App To Page Tab</a></li>
		</ul>
		<h3>Login / Authorization</h3>
		<ul>
			<li><a href="#" onclick="Login(); return false;">Login</a></li>
			<li><a href="#" onclick="Logout(); return false;">Logout</a></li>
		</ul>
		<h3>Advanced Features (extended permissions required)</h3>
		<ul>
			<li><a href="#" onclick="FriendPost('https://fask.herokuapp.com/', 'FacebookAppStarter', 'All the facebook basics. Sent to your Friends!', 'https://fask.herokuapp.com/images/fask.png', 'FASK'); return false;">Post to Friend's Wall</a> (read_stream,publish_stream)</li>
			<li><a href="#" onclick="LikeGate(); return false;">Like Gate</a> (read_stream) <div class="fb-like" data-href="http://www.facebook.com/apps/application.php?id=130551640347075" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div></li>
		</ul>
		<h3>Other</h3>
		<ul>
			<li>Bookmarklet -><a href="javascript:var appid=''; appid=prompt('Enter App ID:'); window.open('http://www.facebook.com/dialog/pagetab?app_id='+appid+'&next=http://www.facebook.com');">Add to Page</a></li>
		</ul>
		<!--! end app content -->
	</div>
	<div id="fb-root"></div>
	<div id="jfmfs-dialog">
		<a href="#" class="button" onclick="$(this).parent().hide(); return false;">Close</a>
		<label>Message:</label><textarea id="jfmfs-message"></textarea>
		<div id="jfmfs-container"></div>
		<button id="jfmfs-post" class="button">POST</button>
	</div>
</div> <!--! end of #container -->

<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

<script src="js/script.js"></script>
<script src="js/fb.js"></script>
<script type="text/javascript" src="js/libs/jquery.facebook.multifriend.select.js"></script>
<script>
	var _gaq=[['_setAccount','UA-76054-11'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
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
