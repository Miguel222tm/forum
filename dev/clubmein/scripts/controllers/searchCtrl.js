var searchCtrl =  ['$rootScope', '$state', '$scope', 'RootService', function($rootScope, $state, scope,  clubService){
	
	console.log('searchCtrl');

	scope.searchText = "test";

	scope.post = {
		title: '',
		type: '',
		tags: [],
		content: ""
	};

	scope.init = function(){
		console.log('init');
		loadTags();
	};

	scope.createPost = function(){
		console.log('post', scope.post);
		scope.post.tags = scope.selectedTags;

		var request = clubService.sendRequest('post', '/post', scope.post);
		request.then(function(response) {
			console.log('response', response );
		}, function(error){

		});
	};


    function loadTags() {
      	scope.tags = [];

      	var request = clubService.sendRequest('get', '/v1/tags');
      	request.then(function(response) {
      		scope.tags = response;
      		console.log('scope.tags', scope.tags);
      	}, function(error){
      		console.log('error', error);
      	});

    }


    scope.init();


}];


angular.module('app')
	.controller('searchCtrl', searchCtrl);
