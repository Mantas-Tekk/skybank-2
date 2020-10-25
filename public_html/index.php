<?php
//  create Get tuscia forma 
/*
accounts/create
accounts/eidt/24
accounts/delete/32

create GET rodo tuscia forma
save POST isaugo duomenys is formos
edit GET +id uzpildyta forma
update POST +id redaguoja forma 
delte POST +id 
index GET rodo sarasa
*/

define('INSTALL_DIR', '');
define('DIR', __DIR__);
define('DIR2', str_replace('\\public_html', '', __DIR__));
define('SERVER_NAME', $_SERVER['SERVER_NAME']);

require __DIR__ . '/../bootstrap/bootstrap.php';
require __DIR__ . '/../router/router.php';

