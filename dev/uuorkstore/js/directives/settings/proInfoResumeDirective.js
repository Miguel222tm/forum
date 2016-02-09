var proInfoResume = ['$state','RootService','Upload','$timeout','$mdDialog','settingsService', function($state, RootService, Upload, $timeout, $mdDialog, settingsService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/pro-info-resume.html',
		scope: {
			user: '=',
			resumes: '='
		},
		link: function(scope){

			var originatorEv;
		    scope.openMenu = function($mdOpenMenu, ev) {
		      originatorEv = ev;
		      $mdOpenMenu(ev);
		    };
			/**
			 * Init - set all the values to default and get the initial user -> Resumes
			 * @return {[type]} [description]
			 * @author Miguel Trevino
			 */
			scope.init = function (){
				scope.bshow = true;
				scope.bProgressBar = false;
				//scope.getUserResumes();
				scope.progressPercentage=0;
			};
			/**
			 * showContent - returns boolean to see if you need to hide or show this section 
			 * @return {boolean} [return scope.bshow]
			 * @author Miguel Trevino
			 */
			scope.showContent = function (){
				return scope.bshow;
			};
			/**
			 * [setShowContent - change the boolean value of scope.bshow]
			 * @author Miguel Trevino
			 */
			scope.setShowContent = function (){
				scope.bshow = !scope.bshow;
			};
			/**
			 * [getUserResumes - get all the resumes of the user logged in]
			 * @return {[object]} [scope.resumes]
			 * @author Miguel Trevino
			 */
			scope.getUserResumes = function (){
				scope.resumes = settingsService.getUserResumes();
				console.log('scope.resumes', scope.resumes);
			};

		    /*============================================
		    =            upload pdf            =
		    ============================================*/
		    
		    /**
		     * [watch - checks if you drop a file into the box]
		     * @param  {[array]} [ array of files]
		     * @author Miguel Trevino
		     */
		    scope.$watch('files', function () {
        		scope.upload(scope.files);
    		});
    		/**
    		 * [upload - upload the files(.pdf) dropped to the box]
    		 * @param  {[file]} files [array of files]
    		 * @author Miguel Trevino
    		 */
    		scope.upload = function (files) {
		        if (files && files.length) {
		            for (var i = 0; i < files.length; i++) {
		            	//for to upload file by file to the server
		              	var file = files[i];
		              	if (!file.$error) {
		                	Upload.upload({
		                    	url: '/resumes',
		                    	data: {
			                      current: false,
			                      private: false,
			                      file: file  
			                    }
		                	}).progress(function (evt) {
			                	scope.bProgressBar  = true;
			                	//set progress bar to the % completed
			                    scope.progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
			                }).success(function(data){
			                	// the whole process of sending the file to the server is complete and it will return the resume model object OR
			                	// an error telling you that you cant upload the file.
			                    $timeout(function() {
			                    	console.log('data', data);
			                    	if(data[1] != 500)
			                        	scope.resumes.push(data);
			                        else
			                        	RootService.addNotification(' you cant add more than 3 resumes to your profile');
			                        scope.bProgressBar = false;

			                    }, 500);
			                });
		              }
		            }
		        }
		    };


		    scope.resumeOption = function (option, resume){
		    	if (option === 'current') {
		    		scope.setMainResume(resume);
		    	}
		    	else if (option === 'private') {
		    		scope.setPrivateResume(resume, true);
		    	}
		    	else if (option  === 'public') {
		    		scope.setPrivateResume(resume, false);
		    	}

		    	else if (option === 'delete'){ 
		    		scope.deleteResume(resume);
		    	}


		    };

		    scope.setMainResume = function(resume){
		    	angular.forEach(scope.resumes, function(res, key){
		    		if(res.jobSeekerResumeId === resume.jobSeekerResumeId){
		    			res.current = true;
		    		}else{
		    			res.current = false;
		    		}
		    	});
		    	scope.updateResume(scope.resumes, false);

		    };

		    scope.setPrivateResume = function(resume, boo){
		    	angular.forEach(scope.resumes, function(res, key){
		    		if(boo){
			    		if(res.jobSeekerResumeId === resume.jobSeekerResumeId){
			    			res.private = true;
			    			scope.updateResume(res, true);	
			    		}
		    		}else {
		    			if(res.jobSeekerResumeId === resume.jobSeekerResumeId){
			    			res.private = false;
			    			scope.updateResume(res, true);
			    		}
		    		}
		    	});
		    	
		    };

		    scope.updateResume = function (resumes, boo){
		    	var data = {
		    		resumes: resumes,
		    		individual: boo
		    	};
		    	var request = RootService.sendRequest('PUT', '/resumes', data);

		    	request.then(function(response){
		    		console.log('resumes updated', response);
		    		scope.resumes = response;
		    		RootService.addNotification('resume(s) updated.', 'success');
		    	}, function(error){
		    		RootService.addNotification('error, couldnt update your resumes.', 'error');
		    	});
		    };

		    /*=====  End of new way of uploading  ======*/
		    /**
		     * [deleteResume - delete a resume from the table and server]
		     * @param  {[object]} resume [resume to be deleted]
		     * @author Miguel Trevino
		     */
		    scope.deleteResume = function(resume)
		    {
		    	//we send a request to the server, a DELETE one sending the id of the resume to be deleted
		    	var request = RootService.sendRequest('DELETE','/resumes/'+resume.jobSeekerResumeId);
		    	request.then(function(response){
		    		//returns a promise and response means that everything went ok.
		    		//console.log('response deleting resume', response);
		    		scope.removeResumeFromTable(response);
		    		RootService.addNotification('resume deleted', 'success');
		    	}, function(error){
		    		//the server couldnt delete that resume and it shows a notification
		    		RootService.addNotification('error deleting '+ resume.original_name, 'error');
		    	});
		    };
		    /**
		     * [removeResumeFromTable - just delete the resume from the table]
		     * @param  {[object]} resume [resume that needs to be deleted on the table]
		     * @author Miguel Trevino
		     */
		    scope.removeResumeFromTable = function (resume){
		    	var newResumeList = [];
		    	angular.forEach(scope.resumes, function(res, key){
		    		if(res.jobSeekerResumeId !== resume.jobSeekerResumeId){
		    			newResumeList.push(res);
		    		}
		    	});
		    	scope.resumes = newResumeList;
		    };


		    
		    /**
		     * [showProgressBar - shows the progress bar ]
		     * @return {[boolean]} [if returns true the bar will still visible, otherwise it will be hidden.]
		     */
		    scope.showProgressBar = function (){
		    	return scope.bProgressBar;
		    };

		    //trigger the method init and all the values will be set to the default ones.
		    scope.init();
		}// </link>

	};
}];






/*var contentType;
			window.saveImage = function() {
		        var textToWrite = document.getElementById("inputTextToSave").value;
		        var textFileAsBlob = new Blob([textToWrite], {type: contentType});
		        var fileNameToSaveAs = document.getElementById("inputFileNameToSaveAs").value;

		        var downloadLink = document.createElement("a");
		        downloadLink.download = fileNameToSaveAs;
		        downloadLink.innerHTML = "Download File";
		        if (window.webkitURL !== null) {
		          // Chrome allows the link to be clicked
		          // without actually adding it to the DOM.
		          downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
		        }
		        else {
		          // Firefox requires the link to be added to the DOM
		          // before it can be clicked.
		          downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
		          downloadLink.onclick = destroyClickedElement;
		          downloadLink.style.display = "none";
		          document.body.appendChild(downloadLink);
		        }

		        downloadLink.click();
      		}

      		function destroyClickedElement(event) {
		    	document.body.removeChild(event.target);
		    }

		    window.loadImage = function() {
		        var file = document.getElementById("fileToLoad").files[0];

		        var reader = new FileReader();
		        reader.onloadend = function(event) {
		          var data = event.target.result;
		          document.getElementById("inputTextToSave").value = data;

		          var imagePreview = document.getElementById("imagePreview");
		          imagePreview.innerHTML = '';

		          var dataURLReader = new FileReader();
		          dataURLReader.onloadend = function(event) {
		            // Parse image properties
		            var dataURL = event.target.result;
		            console.log('dataURL', dataURL);
		            contentType = dataURL.split(",")[0].split(":")[1].split(";")[0];
		            console.log('content type', contentType);
		            var image = new Image();
		            image.src = dataURL;
		            image.onload = function() {
		              console.log("Image type: " + contentType);
		              console.log("Image width: " + this.width);
		              console.log("Image height: " + this.height);

		              imagePreview.appendChild(this);
		            };
		          };
		          dataURLReader.readAsDataURL(file);


		        };
		        reader.readAsBinaryString(file);
		    };*/