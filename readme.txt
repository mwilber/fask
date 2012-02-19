Facebook App Starter Kit (FASK)

Created by Internet Software Developer Matthew Wilber
http://www.greenzeta.com
http://www.mwilber.com

FASK provides a ready made starting point for building facebook apps using the facebook javascript api.
Itls built on the HTML5 Boilerplate (http://html5boilerplate.com/) and provides javascript functions for the most commonly used facebook features.

FASK is free to use in your projects as you see fit. If you use this project, please share on facebook.

Getting Started
-----------------------------------

1. Set up an app on the facebook developer site: https://developers.facebook.com/
2. Open the index.html file and locate the FBconfig javascript object:

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
			likegate:{												// Not required for the tab app php based like gate
				targetid: 'XXXXXXXXXXXXX',
				targeturl: 'https://apps.facebook.com/XXXXXXXXXXX/'
			}
		};

3. To get up and running all you need to do is insert your app id in the FBconfig.app.id variable
4. Adjust the other FBconfig variables as necessary for your app.
5. Add your app specific javascript to the js/script.js file


Facebook Login and Authorization
-----------------------------------

FASK supports both popup and redirect methods of facebook authorzation. Use the redirect method only if popup blockers become an issue.  Simply call the Login(); function at any point in your javascript on or after the page's OnLoad event is called. FASK will automatically determinte the user's authorization status based on the permissions set in FBconfig.app.perms. When using the popup method, the Login() function will call either HandleAuthorizedUser() or HandleUnauthorizedUser() in js/script.js based on the user's authorization status. HandleAuthorizedUser() will set the global variable fb_auth with the user's id number and authorization token for use in graph calls. Modify these functions as necessary for your app.
