/* Author: Matthew Wilber mwilber@gmail.com

*/

// If the browser has a console, write to it.
function DebugOut(newline){
	try{
		if (typeof console == "object"){ 
			console.log(newline);
		}
	}catch(err){
		
	}
	
}

// Open a popup centered on the screen.
function openpopup(url,name,width,height)
{
	// Set up the window attrubutes
	var attributes = "toolbar=0,location=0,height=" + height;
	attributes = attributes + ",width=" + width;
	var leftprop, topprop, screenX, screenY, cursorX, cursorY, padAmt;
	
	// Get the clients screen size
	if(navigator.appName == "Microsoft Internet Explorer") {
		screenY = screen.height;
		screenX = screen.width;
	}else{
		screenY = window.outerHeight;
		screenX = window.outerWidth;
	}
	
	// Set the x/y position relative to the center of the screen
	leftvar = (screenX - width) / 2;
	rightvar = (screenY - height) / 2;
	if(navigator.appName == "Microsoft Internet Explorer") {
		leftprop = leftvar;
		topprop = rightvar;
	}else {
		leftprop = (leftvar - pageXOffset);
		topprop = (rightvar - pageYOffset);
	}
	attributes = attributes + ",left=" + leftprop;
	attributes = attributes + ",top=" + topprop;

	// Open the window
	window.open(url,name,attributes)
}

function HandleAuthorizedUser(authObj){
	fb_auth.id = authObj.authResponse.userID;
	fb_auth.token = authObj.authResponse.accessToken;
	
	if( fb_auth.id != '' && fb_auth.token != ''){
		DebugOut('FB User logged in:');
		DebugOut(fb_auth);
		alert('FB User '+fb_auth.id+' logged in:');
	}
}

function HandleUnauthorizedUser(){
	DebugOut('FB User NOT logged in. Try calling Login() method:');
	DebugOut(fb_auth);
	alert('FB User NOT logged in. Try calling Login() method:');
	
	if( FBconfig.likegate.targeturl != '' ){
		LikeGate();
	}
}

function HandleLikeStatus(pLikeStatus){
	if(pLikeStatus){
		//user likes target
		$('#nolike').hide();
		$('#like').show();
	}else{
		//user does not like target
		$('#nolike').show();
		$('#like').hide();
	}
}

$(document).ready(function(){
	
	FB.init({appId: FBconfig.app.id, status : true, cookie: true, xfbml : true});
	SetFrame();
	
	// Disable the like gate for demo purposes, change true to false to enable the like gate on load
	HandleLikeStatus(true);
	
});