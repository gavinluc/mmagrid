<?php
// your-php-page.php

// Access data sent via POST
$buttonId = $_POST['buttonId'];
$inputData = $_POST['inputData'];

// Perform some logic based on buttonId and inputData
// For demonstration purposes, let's say if inputData is not empty, return true
// Otherwise, return false

if (!empty($inputData)) {
    echo 'truee';
} else {
    echo 'faelse';
}

?>
