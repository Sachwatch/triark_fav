<?php
session_start();
session_destroy();
header('Location: select.php');
exit();