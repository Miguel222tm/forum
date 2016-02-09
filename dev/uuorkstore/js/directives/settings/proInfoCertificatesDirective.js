var proInfoCertificates = ['$state','settingsService', function($state, settingsService){
	return {
		restrict: 'E',
		templateUrl: 'views/pages/settings/pro-info-certificates.html',
		scope: {
			user: '=',
			certificates: '='
		},
		link: function(scope){
			
			scope.bshow = true;
			
			scope.showContent = function (){
				return scope.bshow;
			};

			scope.setShowContent = function (){
				scope.bshow = !scope.bshow;
			};

			scope.addCertificate = function (){
				
				var cert = {
					jobSeekerId: scope.user.jobSeekerId,
					name: null, 
					authority_name: null,
					number: null, 
					start_date: null, 
					end_date: null
				};
				settingsService.addJsCertificate(cert);
				scope.certificates = settingsService.getJsCertificates();
				console.log('scope.certificates', scope.certificates);
			};
			

		}

	};
}];