<?php

include "../classes/User.php";

// instantiate user class

$user_obj = new User;

// call the method login
$user_obj->login($_POST);


?>