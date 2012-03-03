var FBconfig = {
	app:{
		id: '130551640347075',								// id of facebook application
		perms: 'publish_stream, user_photos, user_likes',	// extended permissions required of htis app. Leave as empty string for no extended permissions.
		site: 'http://dev.mwilber.com/fask/'					// direct url to app server
	},
	login:{
		method: 'popup',									// 'redirect' or 'popup'
		target: 'http://www.facebook.com/greenzeta/app_130551640347075'				// endpoint url if loginmethod is 'redirect'
	},
	likegate:{												// Leave targetid empty if you do not use like gate
		targetid: '102352989996',
		targeturl: 'http://www.facebook.com/greenzeta'
	}
};