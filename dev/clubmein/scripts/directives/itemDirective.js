var item = ['$state', function($state){
	return {
		restrict: 'E',
		templateUrl: 'views/partials/item.html', 
		scope: {
			user: '='
		},
		link: function(scope){
			console.log('item');
		}

	};
	
}];


angular.module('app')
	.directive('item', item);