var searchCtrl =  ['$rootScope', '$state', '$scope', 'RootService', function($rootScope, $state, scope,  clubService){
	
	console.log('searchCtrl');

	scope.searchText = "";

	scope.selectedType = 'All';

	scope.searchTags = [{name: 'All'}];

	scope.post = {
		title: '',
		type: '',
		tags: [],
		content: ""
	};
	var query = {};
	scope.loading = false;
	scope.init = function(){
		console.log('init');
		getPosts(query);
		loadTags();
	};

	var getPosts = function(query){
		console.log('query', query);
		if(!scope.loading){
			scope.loading = true;
			var config = {
				params: {},
				type: query.type
			};
			if(query){
				if(query.where){
					config.params.where = query.where;
				}
				if(query.orWhere){
					config.params.orWhere = query.orWhere;
				}
				if(query.type){
					config.type = query.type;
				}
			}

			console.log('config', config);
			var request = clubService.sendRequest('get', '/posts', config);
			request.then(function(response){
				scope.loading = false;
				console.log('getPosts', response);
				scope.posts = response;
			}, function(error){
				console.log('error', error);
			});
		}
	};

	scope.search = function(){
		console.log('keyword', scope.searchText);
		console.log('selectedType', scope.selectedType);

		if(scope.searchText){
			query.where = angular.toJson([
				{
					func: 'where',
	            	field: 'title', 
	            	operator: 'LIKE',
	            	value: '%'+scope.searchText+'%'
		        }
			]);
		}else{
			query.where = null;
		}
		if(scope.selectedType != 'All'){
			if(query.where){
				query.orWhere = angular.toJson([
					{
						func: 'orWhere',
		            	field: 'type', 
		            	operator: '=',
		            	value: scope.selectedType
					}
				]);
			}else{
				query.where = angular.toJson([
				{
						func: 'where',
		            	field: 'type', 
		            	operator: '=',
		            	value: scope.selectedType
			        }
				]);
			}
			query.type = scope.selectedType;
		}else{
			query.type = '';
			query.orWhere = null;
		}
		getPosts(query);
	};

	scope.checkUser = function(){
		console.log('error check user',$rootScope.currentUser);
		if(!$rootScope.currentUser){
			$state.go('access.signin');
		}
	};

	scope.createPost = function(){
		console.log('post', scope.post);
		scope.post.tags = scope.selectedTags;

		var request = clubService.sendRequest('post', '/post', scope.post);
		request.then(function(response) {
			scope.posts.unshift(response);
			scope.postCreated = true;
			console.log('response', response );
		}, function(error){

		});
	};

	scope.cleanPost = function(){
		scope.postCreated = false;
	};


    function loadTags() {
      	scope.tags = [];

      	var request = clubService.sendRequest('get', '/v1/tags');
      	request.then(function(response) {
      		scope.tags = response;
      		scope.searchTags = scope.searchTags.concat(response);
      		console.log('scope.tags', scope.tags);
      	}, function(error){
      		console.log('error', error);
      	});

    }


    scope.init();


}];


angular.module('app')
	.controller('searchCtrl', searchCtrl);
