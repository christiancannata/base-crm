<?php

function getSubmenu($menu)
{
    if (!isset($menu['submenu'])) {
        return [];
    }

    $availableMenus = [];
    foreach ($menu['submenu'] as $submenu) {
        if (!isset($submenu['roles'])) {
            $availableMenus[] = $submenu;
            continue;
        }

        if (auth()->user()->hasAnyRole($submenu['roles'])) {
            $availableMenus[] = $submenu;
        }

    }

    return $availableMenus;
}
