<?php

require_once __DIR__ . '/../model/user.model.php';

if (preg_match('/^\/api\/user\/events\/get/', $uri)) {
    require_once __DIR__ . '/../model/guest.model.php';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        GuestModel::getEvents();
        exit();
    }
} else if (preg_match('/^\/api\/user\/events\/add/', $uri)) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        UserModel::addEvent($json_body);
        exit();
    }
} else if (preg_match('/^\/api\/user\/attendances\/add/', $uri)) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        UserModel::addAttendance($json_body);
        exit();
    }
} else if (preg_match('/^\/api\/user\/attendances\/get/', $uri)) {

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        UserModel::getAttendances();
        exit();
    }
} else if (preg_match('/^\/api\/user\/complaints\/add/', $uri)) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        UserModel::addComplaint($json_body);
        exit();
    }
} else {
    header('HTTP/1.1 500 @user.index.php');
    echo '{"http":"500","at":"user.index.php"}';
}
