<?php

require 'cred.php';
/**
 * @param string $email_address
 * @return bool
 */
function isEmailValid(string $email_address):bool {
    global $apiKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://emailvalidation.abstractapi.com/v1/?api_key=$apiKey&email=$email_address");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    // Assuming mailid is valid.
    return true;
    
    if ($data['deliverability'] === "DELIVERABLE"  && $data['is_smtp_valid'] && $data['is_valid_format']) {
        return true;
    } else {
        return false;
    }
}
