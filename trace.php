<?php
// EXAMPLE HOW TO query the traceability system



$par = $_GET['tracecode'];
//$par='71617';
$method='GET';
$apikey='m9U59ZQlF59ph480OQlP2VpfnJLyqP1x';
$url='https://agrinova.dolifarm.com/sandbox/htdocs/api/index.php/dolitraceapi/harvests?sqlfilters=t.tracecode%3D'.$par;

$result=callAPI($method, $apikey, $url);
$json = json_decode($result, true);

// print_r ($json);
echo $json[0]["farm_name"].'<br>';
echo $json[0]["date"].'<br>';
echo $json[0]["ref"].'<br>';
echo $json[0]["label"].'<br>';
echo $json[0]["yield"].'<br>';
echo $json[0]["tracecode"].'<br>';
echo $json[0]["fk_cropplan"].'<br>';
echo $json[0]["refshipment"].'<br>';


// Example of function to call a REST API
function callAPI($method, $apikey, $url, $data = false)
{
    $curl = curl_init();
    $httpheader = ['DOLAPIKEY: '.$apikey];

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            $httpheader[] = "Content-Type:application/json";

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

            break;
        case "PUT":

	    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            $httpheader[] = "Content-Type:application/json";

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    //    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $httpheader);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}


?>
