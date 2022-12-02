<?php

namespace App\Helpers;

class LinkedinHelperHTML {
    public static function getBadge(string $state): string {
        $bg = "bg-secondary";
        $textContent = "Brouillon";

        if ($state == 'ready') {
            $bg = "bg-primary";
            $textContent = "Prêt";

        } else if ($state == 'published') {
            $bg = "bg-success";
            $textContent = "Publié";

        }

        return "<span class=\"badge {$bg}\">{$textContent}</span>";
    }
}
