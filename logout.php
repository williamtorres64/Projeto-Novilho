<?php
echo "Efetuando logoff...";
session_start();
session_destroy();
echo "<meta http-equiv='refresh' content='1; URL=\"index.php\"' />";
?>