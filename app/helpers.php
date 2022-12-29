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

function getAllModels()
{
    $modelList = [];

    $paths = [];

    $paths[] = app_path() . "/Models";

    $modules = scandir(app_path() . "/../Modules");
    foreach ($modules as $module) {
        if ($module === '.' or $module === '..') continue;

        if (is_dir(app_path() . "/../Modules/" . $module)) {
            $modelModuleFiles = scandir(app_path() . "/../Modules/" . $module . '/Entities');

            foreach ($modelModuleFiles as $moduleFile) {
                if ($moduleFile === '.' or $moduleFile === '..' or $moduleFile === '.gitkeep') continue;
                $modelList[$module . '\\Entities\\' . substr($moduleFile, 0, -4)] = substr($moduleFile, 0, -4);
            }
        }
    }

    return $modelList;
}
