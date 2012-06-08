Facebook App Starter Kit (FASK)

Created by Matthew Wilber
http://www.facebook.com/greenzeta

FASK provides a ready made starting point for building facebook apps using the facebook javascript api.
Itls built on the HTML5 Boilerplate (http://html5boilerplate.com/) and provides javascript functions for the most commonly used facebook features.

## View the stock FASK install on facebook: http://www.facebook.com/greenzeta?sk=app_130551640347075 

FASK is free to use in your projects as you see fit. If you use this project, please share on facebook.

Getting Started
-----------------------------------

1. Set up an app on the facebook developer site: https://developers.facebook.com/
2. Open the file js/config.js:

		var FBconfig = {
			app:{
				id: 'XXXXXXXXXXXXX',								// id of facebook application
				perms: 'publish_stream, user_photos, user_likes',	// extended permissions required of htis app. Leave as empty string for no extended permissions.
				site: 'http://www.XXXXXXXXXX.com/XXXXXX'			// direct url to app server
			},
			login:{
				method: 'popup',									// 'redirect' or 'popup'
				target: 'https://apps.facebook.com/XXXXXXXXXXX/'	// endpoint url if loginmethod is 'redirect'
			},
			likegate:{												
				targetid: 'XXXXXXXXXXXXX',							// facebook id of target link
				targeturl: 'https://apps.facebook.com/XXXXXXX/',	// url of target link
				gatepage: 'likegate.html',							// like gate page
				redirect: 'index.html'								// destination page for users who pass through like gate
			}
		};

3. To get up and running all you need to do is insert your app id in the FBconfig.app.id variable
4. Adjust the other FBconfig variables as necessary for your app.
5. Add your app specific javascript to the js/script.js file


Facebook Login and Authorization
-----------------------------------

FASK supports both popup and redirect methods of facebook authorzation. Use the redirect method only if popup blockers become an issue.  Simply call the Login(); function at any point in your javascript on or after the page's OnLoad event is called. FASK will automatically determine the user's authorization status based on the permissions set in FBconfig.app.perms as shown above. When using the popup method, the Login() function will trigger one of two events: "AuthorizedUser" and "UnauthorizedUser". The file js/script.js has example event handlers which will set the global variable fb_auth with the user's id number and authorization token for use in graph calls. You may modify these functions or add additional event handlers for your app.


Like Gate
-----------------------------------
There are two like gate options available. 
* For a tab app, set the tab page to tab_likegate.php in the facebook app settings. Edit the like/nolike sections of that page accordingly.
* For stand-alone apps and web sites: First rename index.html and set the FBconfig.likegate.redirect value to the new name, then rename likegate.html to index.html and set the FBconfig.likegate.gatepage value to 'index.html'.
