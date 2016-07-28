var postCtrl = ['$rootScope', '$state', '$scope', 'RootService','$stateParams',  function($rootScope, $state, scope,  clubService,$stateParams){

 	scope.init = function(){
 		if($stateParams.id){
 			console.log('stateparams', $stateParams.id);
 			getPost($stateParams.id);
 		}else{
 			$state.go('app.search');
 		}
 	};
 	
 	var getPost = function(id){
 		var request = clubService.sendRequest('get','/post/'+id);
 		request.then(function(response){
 			console.log('response :::', response);
 			scope.post = response;
 		}, function(error){
 			console.log('error', error);
 			$state.go('app.search');
 		});	
 	};	

 

 	scope.leaveComment = function(comment){
 		console.log('comment', comment);
 		if(comment){
	 		var data = {
	 			postId: scope.post.postId,
	 			userId: $rootScope.currentUser.user.userId,
	 			content: comment
	 		};
 			var request = clubService.sendRequest('post', '/post/comment', data);
 			request.then(function(response){
 				scope.post.comments.unshift(response);
 			}, function(error){
 				console.log('error commenting', error);
 			});
 		};	
 	};


 	scope.deleteComment = function(id){
 		if(id){
 			var request = clubService.sendRequest('delete', '/post/comment/'+id);
 			request.then( function(response){
 				removeCommentFromPost(response);
 			}, function(error){
 				console.log('error removing the comment',error );
 			});
 		}
 	};


 	var removeCommentFromPost = function(comment){
 		var array = [];
 		for (var i = 0; i < scope.post.comments.length; i++) {
 			var postComment = scope.post.comments[i];
 			if(comment.commentId != postComment.commentId){
 				array.push(postComment);
 			}
 		};
 		scope.post.comments = array;
 	};


 	scope.showReply = function(comment){
 		comment.showReply = true;
 	};

 	scope.leaveReply = function(content, comment){
 		var data = {
 			commentId : comment.commentId,
 			userId: $rootScope.currentUser.user.userId,
	 		content: content
 		};
 		var request = clubService.sendRequest('post', '/comment/reply', data);
 		request.then(function(response){
 			console.log('reply!', response);
 			comment.replies.unshift(response);
 		}, function(error){
 			console.log('error publishing a reply', error);
 		});
 	};

 	

 	

 	scope.init();

}];


angular.module('app')
	.controller('postCtrl', postCtrl);