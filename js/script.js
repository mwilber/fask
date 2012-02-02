/* Author: Matthew Wilber mwilber@gmail.com

*/


function WallPost(pLink, pTitle, pDescription, pImage, pCaption, pMessage){
	FB.ui(
		{
			method: 'feed',
			name: pTitle,
			link: pLink,
			picture: pImage,
			caption: pCaption,
			description: pDescription,
			message: pMessage,
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


$(document).ready(function(){
	
	FB.init({appId: facebookappid, status : true, cookie: true, xfbml : true});
	SetFrame();
	
});