<?php
//encode the string for database saving
$htmlstring = json_encode($_POST['front']);

//decode for for testing
//echo json_decode($htmlstring);
echo true;