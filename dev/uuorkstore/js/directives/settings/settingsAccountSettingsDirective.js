var settingsAccountSettings = ['$state', function($state){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/account-settings.html',
		scope: {
			user: '='
		},
		link: function(scope){
				
			console.log('account-settings');
			

			

		}

	};
}];