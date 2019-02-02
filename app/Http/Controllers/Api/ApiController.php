<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function paypalConnect()
	{
	
		?>
			<script src="https://www.paypal.com/conex/js/client/static/js/zoid.min.js"></script>
			<script src="https://www.paypal.com/conex/js/client/static/advConnectZoid.js"></script>
			<!DOCTYPE html />
			<html>
			
				<body>
					<div id="container"></div>
					<!-- Set up a container for ACC to be rendered into -->

			<script>
				// Render the AAC component
				AdvConnectZoid.render({
					clientId: 'AT2eEiwIkhj57-NbAWBz7evos67BSOkhXVJnZV-vIIp6FoE3h0zEIvSJYaUJtJSZHpXQ4szxn-GvoQ9I',
					pageType: 'signup',
					onLogin: function(response) {
					  if(response.err){
						console.log(response.err);
				   } else {
						console.log(response.body.code + " " + response.body.payerId);
				   }
					}

				}, '#container');
			 </script>	
				</body>
			</html>
		



		<?php
	}
}


?>