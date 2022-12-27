<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config
set('repository', 'git@bitbucket.org:andry11/crm.vitranoeco.it.git');

add('shared_files', []);

// Hosts

host('86.107.98.17')
    ->set('remote_user', 'root')
    ->set('deploy_path', '/var/www/crm')
    ->set('env_file', '.env.prod');


// Hooks
task('environment', function () {
    upload('{{env_file}}', '{{release_path}}/.env');
})->desc('Environment setup');

task('reload:php', function () {
    run('sudo /usr/sbin/service php8.2-fpm restart');
    run('{{release_path}}/artisan queue:restart');
});

after('deploy:prepare', 'environment');
after('deploy:publish', 'reload:php');

after('deploy:failed', 'deploy:unlock');
