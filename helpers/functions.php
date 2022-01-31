<?php

use Recman\Enums\ResponseStatusEnum;
use Recman\Enums\AuthStatusEnum as Auth;

if (!function_exists('config')) {
    /**
     * @param string $config
     * @return array
     */
    function config(string $config): array {
        return require __DIR__ . '/../config/' . $config . '.php';
    }
}

if (!function_exists('view')) {
    /**
     * @param string $view
     * @param array $data
     * @return false|string
     */
    function view(string $view, array $data = []) {
        ob_start();

        require __DIR__ . '/../resources/views/partials/header.php';
        require __DIR__ . '/../resources/views/pages/' . $view . '.php';
        require __DIR__ . '/../resources/views/partials/footer.php';

        $content = ob_get_contents();

        ob_end_clean();

        return $content;
    }
}

if (!function_exists('response')) {
    /**
     * @param string $content
     * @param int $statusCode
     * @param array $headers
     */
    function response(string $content = '', $statusCode = ResponseStatusEnum::HTTP_OK, array $headers = []): void
    {
        foreach ($headers as $header) {
            header($header);
        }

        http_response_code($statusCode);

        echo $content;
    }
}

if (!function_exists('userAuthenticated')) {
    /**
     * @return bool
     */
    function userAuthenticated(): bool
    {
        return isset($_SESSION[Auth::AUTHENTICATED])
            && $_SESSION[Auth::AUTHENTICATED] === true
            ?? false;
    }
}

if (!function_exists('redirect')) {
    /**
     * @param string $page
     */
    function redirect(string $page): void
    {
        header("Location: $page");
        die();
    }
}