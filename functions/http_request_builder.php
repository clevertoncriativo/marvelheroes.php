<?php 

function as_get($url, $query_params = []){

    try{

        $ch = curl_init();
        
        $query = http_build_query($query_params);

        curl_setopt($ch, CURLOPT_URL, $url . $query);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json')                                                                       
        );   
        
        $output= curl_exec($ch) or die(curl_error()); 

        curl_close($ch);

    }catch(Exception $e){
        return $e->getMessage();    
    }
    
    return $output;
}
?>