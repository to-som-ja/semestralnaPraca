<?php

namespace App\Config;

/**
 * Class Configuration
 * Main configuration for the application
 * @package App\Config
 */
class Configuration
{
    public const DB_HOST = 'localhost';
    public const DB_NAME = 'tankMuseum';
    public const DB_USER = 'root';
    public const DB_PASS = 'dtb456';

    public const LOGIN_URL = '?c=auth&a=loginForm';
    public const REGISTER_URL = '?c=auth&a=registerForm';


    public const ROOT_LAYOUT = 'root.layout.view.php';

    public const DEBUG_QUERY = false;
    public const UPLOAD_DIR = 'public/files/';
}