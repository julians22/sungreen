<?php


if (!function_exists('activeRoute')) {
    function activeRoute(string $routeName, string $activeClass = 'active'): string
    {
        return request()->routeIs($routeName) ? $activeClass : '';
    }
}
