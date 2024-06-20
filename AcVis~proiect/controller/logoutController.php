<?php
session_start();
session_unset();
session_destroy();
header("Location: /Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/");
exit;
?>