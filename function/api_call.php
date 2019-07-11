<?php

ini_set('display_errors', 1);
include 'inc/config.php';




if (!isset($_GET['case']) or $_GET['case'] == 'get_all_menu') 
	

		   {
			$request_url="http://api.walmartlabs.com/v1/taxonomy?format=json&apiKey=".$api_key;
		   } 
		   
		   else 
		   
				   {
				   
					  $case =  $_GET['case'];
					if ($case == 'get_menu_items')
				   {		
					$cat_id = $_GET['cat_id'];
					$start = 20;
					$max_item = "10";
					$request_url="http://api.walmartlabs.com/v1/paginated/items?apiKey=".$api_key."&category=".$cat_id."&start=10&count=".$max_item;
				   }
					if ($case == 'display_item')
				   {			   
					$ids = $_GET['ids'];
					$request_url="http://api.walmartlabs.com/v1/items?format=json&apiKey=".$api_key."&ids=".$ids;
				   }
				   }
		   
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
                    $error_message = curl_strerror($errno);
                    echo "cURL error ({$errno}):\n {$error_message}";
                }   
                curl_close($ch);

                $arr = json_decode($retValue,true);

            //    echo "<pre>";
            //    print_r($level_1rr);
             //    echo "<pre>";

?>

