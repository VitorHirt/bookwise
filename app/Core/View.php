<?php

namespace App\Core;

class View {
    protected static array $sections = [];
    protected static array $stacks   = [];

    /* =========================
     | Sections
     ========================= */

    public static function start(string $name): void {
        ob_start();
        self::$sections['__current'] = $name;
    }

    public static function end(): void {
        $name = self::$sections['__current'];
        self::$sections[$name] = ob_get_clean();
        unset(self::$sections['__current']);
    }

    public static function yield(string $name, string $default = ''): void {
        echo self::$sections[$name] ?? $default;
    }

    /* =========================
     | Stacks
     ========================= */

    public static function push(string $name): void {
        ob_start();
        self::$stacks['__current'] = $name;
    }

    public static function endPush(): void {
        $name = self::$stacks['__current'];
        self::$stacks[$name][] = ob_get_clean();
        unset(self::$stacks['__current']);
    }

    public static function stack(string $name): void {
        echo self::stackPlaceholder($name);
    }

    public static function renderStacks(string $content): string {
        return preg_replace_callback(
            '/<!--\s*__STACK__:([a-zA-Z0-9_\-]+)\s*-->/',
            static function (array $matches): string {
                $name = $matches[1];

                if (empty(self::$stacks[$name])) {
                    return '';
                }

                return implode('', self::$stacks[$name]);
            },
            $content
        );
    }

    protected static function stackPlaceholder(string $name): string {
        return "<!-- __STACK__:{$name} -->";
    }
}
