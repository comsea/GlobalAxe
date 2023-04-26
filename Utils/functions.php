<?php

function callAPI($method, $url, $data)
{
    $curl = curl_init();
    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        default:
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'User-Agent: Other'
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BEARER);
    // EXECUTE:
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($curl);
    if (!$result) {
        return null;
    }
    curl_close($curl);
    return $result;
}

function callRecaptchaAPI($token)
{
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array("secret" => "6Ld-OKQkAAAAAAGViKC6uSLTOGgjD6lLT5Tw7DFF", "response" => $token);

    $make_call = callAPI(null, $url, $data);
    return json_decode($make_call, true);
}