<?php
<<<<<<< HEAD
$secret_key = "1m@g3h0sTinG"; // Secret key, to prevent other people from uploading
$sharexdir = "files/"; // Directory for images
$domain_url = 'https://thedudeinthecorner.xyz/'; // URL of the image site
=======
$secret_key = "imagehosting"; //Set this as your secret key, to prevent others uploading to your server.
$sharexdir = "files/"; //This is your file dir, also the link..
$domain_url = 'https://thedudeinthecorner.xyz/';
>>>>>>> parent of 7e4182b... stuff
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
 
if(isset($_POST['secret']))
{
    if($_POST['secret'] == $secret_key)
    {
        $filename = generateRandomString($lengthofstring);
        $target_file = $_FILES["sharex"]["name"];
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
 
        if (move_uploaded_file($_FILES["sharex"]["tmp_name"], $sharexdir.$filename.'.'.$fileType))
        {
            echo $domain_url.$sharexdir.$filename.'.'.$fileType;
<<<<<<< HEAD
        } else {
           echo 'File upload failed - configured folder does not exist';
=======
        }
            else
        {
           echo 'File upload failed - CHMOD/Folder doesn\'t exist?';
>>>>>>> parent of 7e4182b... stuff
        }  
    }
    else
    {
        echo 'Invalid Secret Key';
    }
}
else
{
    echo 'Failed to upload, reason unknown';
<<<<<<< HEAD
} ?>
=======
}
?>
>>>>>>> parent of 7e4182b... stuff
