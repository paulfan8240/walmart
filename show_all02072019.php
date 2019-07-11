<?php
            ini_set('display_errors', 1);
  

            $api_key="8246y6b9d7gphdxy2fjb8y6d";  //https://developer.walmartlabs.com/apps/mykeys
			$request_url="http://api.walmartlabs.com/v1/taxonomy?format=json&apiKey=".$api_key;
			

			
			echo $request_url;
			echo "<br>";
			
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$request_url);
                curl_setopt($ch, CURLOPT_FAILONERROR,1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch, CURLOPT_TIMEOUT, 15);
                $retValue = curl_exec($ch);       
                // Check for errors and display the error message
                if($errno = curl_errno($ch)) {
                   // $error_message = curl_strerror($errno);
                   // echo "cURL error ({$errno}):\n {$error_message}";
                }   
                curl_close($ch);

                $arr = json_decode($retValue,true);

                echo "<pre>";
                print_r($arr);
                 echo "<pre>";
              //   var_dump($retValue);
			  




			  
?>