<?php

echo $_POST['user'];
echo $_POST['pass'];
echo md5($_POST['pass'] . "!");
echo md5("GBu25rifle!");

?>