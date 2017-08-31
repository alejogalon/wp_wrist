<?php
//encode the string for database saving
$htmlstring = json_encode($_POST['htmlstring']);

//decode for for testing
//echo json_decode($htmlstring);
echo true;