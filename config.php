<?php
// config.php
return [
'db' => [
'host' => '127.0.0.1',
'dbname' => 'wiki',
'user' => 'wiki_user',
'pass' => 'secret',
'charset' => 'utf8mb4'
],
'base_url' => 'https://yourdomain.example',
'upload_dir' => __DIR__ . '/uploads',
'allowed_uploads' => ['image/png','image/jpeg','image/gif','application/pdf'],
'csrf_key' => 'random_generated_secret_key_here'
];