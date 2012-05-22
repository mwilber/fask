var fb_auth = {
	id: '',
	token: ''
};

/////////////////////////////////////////////////////////////////////////////
//	Advanced Functions
/////////////////////////////////////////////////////////////////////////////

function LikeGate(){
	FB.api('/'+fb_auth.id+'/likes/'+FBconfig.likegate.targetid, function(response) {
		if(response.error){
			DebugOut('User not logged in. Calling Login() function');
			Login();
		}else{
			if( response.data.length > 0 ){
		    	$('body').trigger('LikeStatus', true);
		    }else{
		    	$('body').trigger('LikeStatus', false);
		    }
		}
	});
}

function FriendPost(pLink, pTitle, pDescription, pImage, pCaption){
	$("#jfmfs-container").jfmfs();
	
	$("#jfmfs-post").on("click", {
			name: pTitle,
			link: pLink,
			picture: pImage,
			caption: pCaption,
			description: pDescription,
		},
		function(event){
			var friendSelector = $("#jfmfs-container").data('jfmfs');
	        var sendids = friendSelector.getSelectedIds();
	        for( idx in sendids ){
	            FB.api('/'+sendids[idx]+'/feed', 'post', {
					name: event.data.name,
					link: event.data.link,
					picture: event.data.picture,
					caption: event.data.caption,
					description: event.data.description,
					message: $('#jfmfs-message').val()
				}, 
				function(response) {
	              if (!response || response.error) {
	                alert('Error occured');
	              } else {
		        	$("#jfmfs-dialog").hide();
	              }
	         	});
	        }
		});
	
	$("#jfmfs-dialog").show();
}

/////////////////////////////////////////////////////////////////////////////
//	Login & Authorization
/////////////////////////////////////////////////////////////////////////////

function Login(){
	DebugOut('checking facebook status...');
	FB.getLoginStatus(function(response) {
		DebugOut(response);
        if (response.status == "connected") {
        	DebugOut('user authorized');
			$('body').trigger('AuthorizedUser', response);
        }else{
        	DebugOut('user not authorized. prompting permissions...');
        	// User is not connected request login and authorization
        	DebugOut('login method: '+FBconfig.login.method);
        	if(FBconfig.login.method == 'popup'){
        		// Popup method.
        		FB.login(function(response) {
					if (response.status == "connected") {
						//testing
						DebugOut('user authorized');
						$('body').trigger('AuthorizedUser', response);
					}else{
						DebugOut('user not authorized');
						$('body').trigger('UnauthorizedUser');
					}
			    }, {scope:FBconfig.app.perms});
        	}else{
        		// Redirect method.
        		window.top.location.href = "https://www.facebook.com/connect/uiserver.php?app_id=" +  encodeURIComponent(FBconfig.app.id) + "&next=" + encodeURIComponent(FBconfig.login.target) + "&display=page&perms=" + FBconfig.app.perms + "&fbconnect=1&method=permissions.request";
        	}
		}
	});
}

function Logout(){
	FB.logout(function(response) {
		console.log(response);
	});
}

/////////////////////////////////////////////////////////////////////////////
//	Basic Functions
/////////////////////////////////////////////////////////////////////////////

// Add this app to a page tab
function AddToPage(){
	var addurl = 'http://www.facebook.com/dialog/pagetab?app_id='+FBconfig.app.id+'&next='+FBconfig.app.site+'closer.html';
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
	FB.Canvas.setSize({ width: 810, height: docheight });
}