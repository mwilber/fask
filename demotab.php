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

	<title>Facebook App Starter Kit</title>
	<meta name="description" content="FASK provides a ready made starting point for building facebook apps using the facebook javascript api.">
	<meta name="author" content="Matthew Wilber">
	<meta property="og:title" content="Facebook App Starter Kit" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://apps.facebook.com/appstarterkit/" />
	<meta property="og:image" content="https://fask.herokuapp.com/images/fask.png" />
	<meta property="og:site_name" content="https://fask.herokuapp.com/" />
	<meta property="fb:admins" content="631337813" />
	<meta property="og:description" content="FASK provides a ready made starting point for building facebook apps using the facebook javascript api." />


	<meta name="viewport" content="width=device-width,initial-scale=1">

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
				targetid: '189170161189284',
				targeturl: 'http://apps.facebook.com/appstarterkit/'
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
			It&rsquo;s built on the <a href="http://html5boilerplate.com/" target="_blank">HTML5 Boilerplate</a> and provides javascript functions for the most commonly used facebook features.
		</p>
		<p>FASK is free to use in your projects as you see fit. If you use this project, please <a href="#" onclick="WallPost('http://www.facebook.com/greenzeta?sk=app_130551640347075', 'Facebook App Starter Kit', 'FASK provides a ready made starting point for building facebook apps using the facebook javascript api.', 'https://fask.herokuapp.com/images/fask.png', 'FASK'); return false;">share on facebook</a></p>
		<?php if(!$likesPage): ?>
		<h1>Click the "like" button above to explore the features.</h1>
		<?php endif; ?>
		<a id="download" href="fask.zip" onclick="_gaq.push(['_trackEvent', 'Download', 'clicked', 'FASK 2.0.2'])"><img src="images/download.png"><br/>Download FASK 2.0.2</a>
		<?php if($likesPage): ?>
		<h3>Basic Features</h3>
		<ul>
			<li><a href="#" onclick="WallPost('http://www.facebook.com/greenzeta?sk=app_130551640347075', 'Facebook App Starter Kit', 'FASK provides a ready made starting point for building facebook apps using the facebook javascript api.', 'https://fask.herokuapp.com/images/fask.png', 'FASK'); return false;">Wall Post</a></li>
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
			<li><a href="#" onclick="LikeGate(); return false;">Like Gate</a> (read_stream) <div class="fb-like" data-href="http://apps.facebook.com/appstarterkit/" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div></li>
		</ul>
		<h3>Other</h3>
		<ul>
			<li>Bookmarklet -><a href="javascript:var appid=''; appid=prompt('Enter App ID:'); window.open('http://www.facebook.com/dialog/pagetab?app_id='+appid+'&next=http://www.facebook.com');">Add to Page</a></li>
		</ul>
		<?php endif; ?>
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
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-76054-11']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

</body>
</html>
