var settingsNotifications = ['$state', function($state){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/notifications.html',
		scope: {
			user: '='
		},
		link: function(scope){
				
			console.log('notifications');
			
			scope.settings = [
			    { name: 'Push Notifications', extraScreen: 'Wi-fi menu', icon: 'fa fa-bell-o', enabled: true },
			    { name: 'Emails', extraScreen: 'Bluetooth menu', icon: 'fa fa-envelope-o', enabled: true },
			];
			

		}

	};
}];