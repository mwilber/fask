/* Author: Matthew Wilber mwilber@gmail.com

*/

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
	//docheight = 1000;
	FB.Canvas.setSize({ width: 515, height: docheight });
}


$(document).ready(function(){
	
	FB.init({appId: facebookappid, status : true, cookie: true, xfbml : true});
	SetFrame();
	
});