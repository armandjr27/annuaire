<?php
namespace Controllers\Base;

class BaseController
{
    public static function home(): string
    {
        require_once dirname(dirname(__DIR__)) . '/views/home.php';
        return "home";
    }

    public static function error404(): void
    {
        require_once dirname(dirname(__DIR__)) . '/views/error/e404.php';
    }

	protected function verifyInput(mixed $input): mixed
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);

        return $input;
    }

}