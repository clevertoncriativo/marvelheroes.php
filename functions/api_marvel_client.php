
<?php 

include_once "http_request_builder.php";

if(!empty($_GET["function"]) ){

    $function = $_GET["function"];
    
    if ($function == 'get_characters_by_name' && !empty($_POST["searchTerm"])){
        
        $searchTerm = $_POST["searchTerm"];
        
        get_characters_by_name($searchTerm);
    }

    if ($function == 'get_stories_by_character_id' && !empty($_GET["characterId"])){
         
        $characterId = $_GET["characterId"];
        
        get_stories_by_character_id($characterId);
    }

    if ($function == 'get_characters_by_id' && !empty($_GET["characterId"])){
         
        $characterId = $_GET["characterId"];
        
        get_characters_by_id($characterId);
    }
}

function get_characters_by_id($characterId){
    
    include_once "../config/api_marvel_config.php";

    $ts = time();

    $url = $base_url . 'characters/' . $characterId . '?';
                
    $hash = md5($ts . $private_key . $public_key);
    
    $query_params = [
    'apikey' => $public_key,
    'ts' => $ts,
    'hash' => $hash,
    ];
        
    $response = as_get($url, $query_params);

    echo $response;
}

function get_stories_by_character_id($characterId){
    
    include_once "../config/api_marvel_config.php";

    $ts = time();

    $url = $base_url . 'characters/' . $characterId . '/stories?';
                
    $hash = md5($ts . $private_key . $public_key);
    
    $query_params = [
    'apikey' => $public_key,
    'ts' => $ts,
    'hash' => $hash,
    ];
    
    $response = as_get($url, $query_params);

    echo $response;
}

function get_characters_by_name($searchTerm){    

    include_once "../config/api_marvel_config.php";
    
    $ts = time();

    $url = $base_url. 'characters?';
                
    $hash = md5($ts . $private_key . $public_key);
    
    $query_params = [
        'apikey' => $public_key,
        'ts' => $ts,
        'hash' => $hash,
        'nameStartsWith' => $searchTerm,
    ];
        
    $response = as_get($url, $query_params);

    echo $response;
                            
    }
?>