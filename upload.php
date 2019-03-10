<?php
$secret_key = "1m@g3h0sTinG"; // Secret key, to prevent other people from uploading
$sharexdir = "files/"; // Directory for images
$domain_url = 'https://thedudeinthecorner.xyz/'; // URL of the image site
$lengthofstring = 5; //Length of the file name
 
function generateRandomString($length = 10) { // Generate a random string for the image URL
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
 
if(isset($_POST['secret'])) {
    if($_POST['secret'] == $secret_key) {
        $filename = generateRandomString($lengthofstring);
        $target_file = $_FILES["sharex"]["name"];
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
 
        if (move_uploaded_file($_FILES["sharex"]["tmp_name"], $sharexdir.$filename.'.'.$fileType)) {
            echo $domain_url.$sharexdir.$filename.'.'.$fileType;
        } else {
           echo 'File upload failed - configured folder doesn''t exist';
        }  
    } else {
        echo 'Your key is invalid!';
    }
} else {
    echo 'Failed to upload, reason unknown';
} ?>