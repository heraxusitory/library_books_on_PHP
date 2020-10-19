<?php
$user = user()->getUserById(user()->getUserId());

$isAdmin = user()->isAdmin()?'<span class="badge badge-success text-wrap"> Admin</span>':"";

require ($_SERVER['DOCUMENT_ROOT'] . '/templates/profile.php');
