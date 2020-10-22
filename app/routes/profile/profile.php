<?php

$user = getNameAndLoginUser();

$isAdmin = isAdmin()?'<span class="badge badge-success text-wrap"> Admin</span>':"";

require ($_SERVER['DOCUMENT_ROOT'] . '/templates/profile.php');
