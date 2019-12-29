# marvelheroes.php

marvelheroes é um projeto de consulta a https://developer.marvel.com/docs

<h2>Requerimentos</h2>
<ul>
<li>PHP 5.6 ou superior</li>
<li>Marvel API key</li>
<li>Love for Marvel</li>
</ul>

<h2>Functions</h2>
<h4>http_request_builder</h4>
<p>as_get($url, $query_params = [])</p>
<p> $url => endpoint a ser consultado</p>
<p> $query_params => array chave valor com os paramentros da query_string</p>
<p> retorno => json</p>
<h4>Exemplo:</h4>

    include("http_request_builder.php");
    
    $ts = time();

    $url = $base_url . 'characters/' . $characterId . '?';
                
    $hash = md5($ts . $private_key . $public_key);
    
    $query_params = [
    'apikey' => $public_key,
    'ts' => $ts,
    'hash' => $hash,
    ];
        
    $response = as_get($url, $query_params);





