<?php

ini_set('display_errors', 1);
session_start();

require_once 'scripts/functions.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/SMTP.php';