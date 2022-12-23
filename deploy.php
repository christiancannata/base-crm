<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config
set('repository', 'git@github.com:christiancannata/base-crm.git');

add('shared_files', []);
add('shared_dirs', ['storage']);
add('writable_dirs', []);

// Hosts

host('86.107.98.17')
    ->set('remote_user', 'root')
    ->set('deploy_path', '/var/www/crm');

// Hooks

after('deploy:failed', 'deploy:unlock');
