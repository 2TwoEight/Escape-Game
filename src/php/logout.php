<?php
session_start();
session_destroy();
header("Location: /Escape-Game/index.php");
exit();
?>