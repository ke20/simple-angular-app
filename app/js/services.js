'use strict';

/* Services */


// Demonstrate how to register services
// In this case it is a simple value service.
angular.module('myApp.services', ['ngResource'])
  
	.value('version', '0.1')

 	.factory('Messages', function($resource) {
 		return $resource('../src/MessagesCtrl.php', {},{
            get: { method: 'GET', isArray: true }
        });
  	});
