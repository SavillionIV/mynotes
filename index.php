<html>
<head>
</head>
<body>
<?php
// index.php
require __DIR__ . '/db.php';
require __DIR__ . '/includes/functions.php';
$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');


if ($path === '' || $path === 'index.php') {
header('Location: /wiki/Main_Page');
exit;
}


$parts = explode('/', $path);
if ($parts[0] === 'wiki') {
$slug = urldecode(implode('/', array_slice($parts,1)));
$_GET['page'] = $slug;
require __DIR__ . '/view.php';
exit;
}


// admin, api, uploads, etc.
if ($parts[0] === 'api') {
// route to api files
$_GET['path'] = implode('/', array_slice($parts,1));
require __DIR__ . '/api/' . basename($parts[1] ?? 'index') . '.php';
exit;
}


// default 404
http_response_code(404);
echo 'Not found';
?>
</body>
</html>