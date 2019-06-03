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

    echo str_repeat("<img src=\"tick.png\" width=\"20\">", 3) . "";
}

########### Helper Functions ########

// (Optional) Add any additional functions or code here if needed

########### Part 1 ###########

function encrypt_a_chunk($chunk, $key)
{
    // Add your code here

    // echo strlen($chunk) . " .. " . strlen($key) . "<br/>";
    if (strlen($chunk) > strlen($key)) {
        // $diff_in_length = strlen($chunk) - strlen($key);
        // $key .= str_repeat("*", $diff_in_length);
        $key = str_pad($key, strlen($chunk), "*");

    } elseif (strlen($key) > strlen($chunk)) {
        $key = substr($key, 0, strlen($chunk));
    }
    echo "<hr/>";
    echo "Chunk : " . $chunk . "<br/>";
    echo "Key   : " . $key . "<br/>";

    return base64_encode($chunk ^ $key);
}

// return an array of encrypted chunks
function encrypt($message, $key)
{
    echo "<pre>";
    var_dump($message);
    echo "<hr/>";

    $encrypted_chunks = [];

    // Add your code here
    // a message may be > 100 characters... etc 400 chars
    // maximum size of a chunk is 100 characters
    $raw_chunks = [];

    $one_string_chunk = "";
    // whatever value gets pushed into the chunk should be a complete sentence

    $accum = "";
    for ($i = 0; $i < strlen($message); $i++) {

        $accum .= $message[$i];
        // check length of chunk if add accum
        $length_check = strlen($one_string_chunk) + strlen($accum);
        if ($message[$i] == ".") {
            if ($length_check <= 100) {
                // Okay, push it in
                $one_string_chunk .= $accum;
            } else {
                // push current chunk into main array
                // and keep accumulating in accum
                $encrypted_chunks[] = $one_string_chunk;
                $one_string_chunk = $accum;

//                echo "<pre>";
//                var_dump($raw_chunks);
//                echo "</pre>";
            }
            $accum = "";
        }
        if ($i > 0 and $i % 100 == 0) {
            $raw_chunks[] = $one_string_chunk;
            $one_string_chunk = "";
        }
    }

    if (!empty($one_string_chunk)) {
        $raw_chunks[] = $one_string_chunk;
    }


    echo "Final: <br/>";
    var_dump($raw_chunks);


    foreach ($raw_chunks as $one_raw_chunk) {
        $encrypted_chunks[] = encrypt_a_chunk($one_raw_chunk, $key);
    }

//    for ($i = 0; $i < count($raw_chunks); $i++) {
//        $encrypted_chunks[] = encrypt_a_chunk($one_string_chunk[$i], $key);
//    }

    echo "<hr/>";
    echo "encrypted chunks: <br/>";
    var_dump($encrypted_chunks);
    echo "<hr/>";
    return $encrypted_chunks;
}

########### Part 2 ###########

function decrypt_a_chunk($encrypted_chunk, $key)
{
    // Add your code here
    // Jia Cheng: The code below is to ensure that
    // chunk and key is of the same strlen()

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

    // code to decrypt each chunk in ...chunks[] array
    foreach ($encrypted_chunks as $one_chunk) {
        $message .= decrypt_a_chunk($one_chunk, $key);
    }
    return $message;
}

?>
