<?php
namespace Deployer;

require 'recipe/yii.php';

// Config

set('repository', 'git@github.com:tamas516/autopalyamatrica.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('127.0.0.1')
    ->set('remote_user', 'tamas516')
    ->set('deploy_path', '~/autopalyamatrica');

// Hooks

after('deploy:failed', 'deploy:unlock');
