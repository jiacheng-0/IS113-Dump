<?php
/*
    Name:  Teo Jia Cheng
    Email: jcteo.2018
*/

if (isset($_GET["action"])) {
    if ($_GET["action"] == 'Encrypt' && $_GET["message"] != '') {
        $message = $_GET["message"];
        $key = $_GET["key"];
        $encrypted_chunks = encrypt($message, $key);

        foreach ($encrypted_chunks as $encrypted_chunk) {
            echo $encrypted_chunk . "<br/>";
        }
    }
    if ($_GET["action"] == 'Decrypt') {
        $encrypted_chunks = [];
        $encrypted_chunks[] = $_GET['chunk1'];
        $encrypted_chunks[] = $_GET['chunk2'];
        $encrypted_chunks[] = $_GET['chunk3'];
        $encrypted_chunks[] = $_GET['chunk4'];
        $key = $_GET["key"];

        echo decrypt($encrypted_chunks, $key);
    }
}

########### Helper Functions ########

// (Optional) Add any additional functions or code here if needed

########### Part 1 ###########

function encrypt_a_chunk($chunk, $key)
{
    // Add your code here

    // echo strlen($chunk) . " .. " . strlen($key) . "<br/>";
    if (strlen($chunk) > strlen($key)) {

        $diff_in_length = strlen($chunk) - strlen($key);
        $key .= str_repeat("*", $diff_in_length);

    } elseif (strlen($key) > strlen($chunk)) {
        $chunk = substr($chunk, 0, strlen($key));
    }

    return base64_encode($chunk ^ $key);
}

// return an array of encrypted chunks
function encrypt($message, $key)
{
    $encrypted_chunks = [];

    // Add your code here
    // maximum size of a chunk is 100 characters
    $raw_chunks = [];

    $accum = "";
    for ($i = 0; $i < strlen($message); $i++) {
        if (strlen($accum) == 100) {
            $raw_chunks[] = $accum;
            $accum = "";
        }
        $accum .= $message[$i];
    }

    if (strlen($accum) > 0) {
        $raw_chunks[] = $accum;
    }

//    echo "<pre>";
//    var_dump($raw_chunks);
//    echo "</pre>";

    for ($i = 0; $i < count($raw_chunks); $i++) {
        $encrypted_chunks[$i] = encrypt_a_chunk($raw_chunks[$i], $key);
    }

//    echo "<pre>";
//    var_dump($raw_chunks);
//    echo "</pre>";

    return $encrypted_chunks;
}

########### Part 2 ###########

function decrypt_a_chunk($encrypted_chunk, $key)
{
    // Add your code here

    if (strlen($encrypted_chunk) > strlen($key)) {

        $diff_in_length = strlen($encrypted_chunk) - strlen($key);
        $key .= str_repeat("*", $diff_in_length);

    } elseif (strlen($key) > strlen($encrypted_chunk)) {
        $encrypted_chunk = substr($encrypted_chunk, 0, strlen($key));
    }

    return base64_decode($encrypted_chunk) ^ $key;
}

// return the decrypted message
function decrypt($encrypted_chunks, $key)
{
    $message = "";

    foreach ($encrypted_chunks as $one_chunk) {
        $message .= decrypt_a_chunk($one_chunk, $key);
    }

    return $message;

}

?>
