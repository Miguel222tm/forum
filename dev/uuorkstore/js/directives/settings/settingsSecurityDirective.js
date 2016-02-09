var settingsSecurity = ['$state', function($state){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/security.html',
		scope: {
			user: '='
		},
		link: function(scope){
				
			console.log('security');
			

			

		}

	};
}];