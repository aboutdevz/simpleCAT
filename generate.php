<?php

$plain = "mahasiswa";
$hash = password_hash($plain,PASSWORD_DEFAULT);

echo $hash;