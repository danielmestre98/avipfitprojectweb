<?php
require_once '../../PHPMailer-5.2.13/test/vendor/autoload.php';
spl_autoload_register(function ($class) {
    require_once strtr($class, '\\_', '//').'.php';
});
