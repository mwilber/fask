var fb_auth = {
	id: '',
	token: ''
};

function Login(){
	FB.getLoginStatus(function(response) {
        if (response.status == "connected") {
			HandleAuthorizedUser(response);
        }else{
        	// User is not connected request login and authorization
        	if(FBconfig.login.method == 'popup'){
        		// Popup method.
        		FB.login(function(response) {
					if (response.status == "connected") {
						HandleAuthorizedUser(response);
					}else{
						HandleUnauthorizedUser();
					}
			    }, {scope:FBconfig.app.perms});
        	}else{
        		// Redirect method.
        		window.top.location.href = "https://www.facebook.com/connect/uiserver.php?app_id=" +  encodeURIComponent(FBconfig.app.id) + "&next=" + encodeURIComponent(FBconfig.login.target) + "&display=page&perms=" + FBconfig.app.perms + "&fbconnect=1&method=permissions.request";
        	}
		}
	});
}

function HandleAuthorizedUser(authObj){
	fb_auth.id = authObj.authResponse.userID;
	fb_auth.token = authObj.authResponse.accessToken;
	
	if( fb_auth.id != '' && fb_auth.token != ''){
		DebugOut('FB User logged in:');
		DebugOut(fb_auth);
	}
}

function HandleUnauthorizedUser(){
	DebugOut('FB User NOT logged in. Try calling Login() method:');
	DebugOut(fb_auth);
}

function Logout(){
	FB.logout(function(response) {
		console.log(response);
	});
}

// Add this app to a page tab
function AddToPage(){
	var addurl = 'http://www.facebook.com/dialog/pagetab?app_id='+FBconfig.app.id+'&next='+window.location;
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