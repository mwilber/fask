Facebook App Starter Kit (FASK)

Created by Internet Software Developer Matthew Wilber
http://www.greenzeta.com
http://www.mwilber.com

FASK provides a ready made starting point for building facebook apps using the facebook javascript api.
It&rsquo;s built on the HTML5 Boilerplate (http://html5boilerplate.com/) and provides functions for many of the most commonly used facebook functions.

Getting Started
-------------------------

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