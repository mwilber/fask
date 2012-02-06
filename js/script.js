/* Author: Matthew Wilber mwilber@gmail.com

*/

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

function AddToPage(){
	var addurl = 'http://www.facebook.com/dialog/pagetab?app_id='+facebookappid+'&next='+window.location;
	openpopup(addurl,'AddToPage',800,600);
}

// Publish to the users wall
function WallPost(pLink, pTitle, pDescription, pImage, pCaption){
	FB.ui(
		{
			method: 'feed',
			name: pTitle,
			link: pLink,
			picture: pImage,
			caption: pCaption,
			description: pDescription,
		},
		function(response) {
			if (response && response.post_id) {
				alert('Post was published.');
			} else {
				alert('Post was not published.');
			}
		}
	);
}

// Send a private message to friends and email addresses
function ShareMessage(pLink, pTitle, pDescription, pImage){
	FB.ui(
		{
			method: 'share',
			name: pTitle,
			link: pLink,
			picture: pImage,
			description: pDescription,
		},
		function(response) {
			if (response && response.post_id) {
				alert('Message was sent.');
			} else {
				alert('Message was not sent.');
			}
		}
	);
}

// Send an invitation to the app
function SendInvite(pMessage){
	FB.ui(
		{
			method: 'apprequests',
			message: pMessage,
		},
		function(response) {
			if (response && response.post_id) {
				alert('Invite was sent.');
			} else {
				alert('Invite was not sent.');
			}
		}
	);
}

// Resize the facebook iframe to match the height of the div #page
function SetFrame(){
	var docheight = $("#container").height();
	// Override detected height
	docheight = 1000;
	FB.Canvas.setSize({ width: 515, height: docheight });
}


$(document).ready(function(){
	
	FB.init({appId: facebookappid, status : true, cookie: true, xfbml : true});
	SetFrame();
	
});