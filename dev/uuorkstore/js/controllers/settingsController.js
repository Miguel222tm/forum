var settingsCtrl = ['RootService', '$scope', function($rootService, scope){
	
	scope.menu = 'profile';
	scope.show = function(menu){
		scope.menu = menu;
	};
}];