<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/config.php');

unset($_SESSION['id']);
unset($_SESSION['userId']);
unset($_SESSION['name']);
unset($_SESSION['level']);
unset($_SESSION['phone1']);
unset($_SESSION['phone2']);
unset($_SESSION['profile']);
unset($_SESSION['birth']);
unset($_SESSION['addr1']);
unset($_SESSION['addr2']);
unset($_SESSION['national']);
unset($_SESSION['married']);
unset($_SESSION['isMale']);
unset($_SESSION['sign']);
unset($_SESSION['token']);





?>
<script>
    location.href = "/";
</script>


