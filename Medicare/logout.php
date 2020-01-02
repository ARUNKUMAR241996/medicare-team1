<?php
session_start();
 unset($_session["sname"]);
 unset($_session["sid"]);
 session_destroy();
 echo"<script> window.location.href = 'index.php' ; </script>";
 exit();
 ?>