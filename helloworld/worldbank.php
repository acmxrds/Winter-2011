<?php 
        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "http://api.worldbank.org/countries?per_page=500"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 
        
        // close curl resource to free up system resources 
        curl_close($ch);      
        
        $xml = new SimpleXMLElement($output);
        $result = $xml->xpath('/wb:countries/wb:country/wb:name | /wb:countries/wb:country/wb:capitalCity');
        
        $no_of_countries = count($result)/2;
        
        echo "Country:Capital City<br>";
        for($i = 0;$i<=$no_of_countries;$i++){
            echo $result[2*$i].':'.$result[2*$i+1].'<br>';
        }
?>