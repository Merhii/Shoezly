<?php
session_start();
if(isset($_SESSION['User']))
{
    echo $_SESSION['User'];

}
?>