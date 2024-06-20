<?php
session_start();
session_unset();
session_destroy();
header("Location: /AcVis~proiect/public/");
exit;
?>