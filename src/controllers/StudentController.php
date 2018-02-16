<?php

require_once '../middleware/Actions.php';
require_once '../models/StudentModel.php';

$actions = new Actions();

if (!empty($_GET['type'])) {
    echo $actions->GetAllResults('students');
}

if (!empty($_POST['type']) && $_POST['type'] == "insert") {
    $StudentModel = new StudentModel(
        $_POST['identificacion'],
        $_POST['nombres'],
        $_POST['apellidos'],
        $_POST['genero']);
    $sql = 'INSERT INTO students (identificacion,nombres,apellidos,genero) VALUES (?,?,?,?)';
    return $actions->RegisterData($sql, $StudentModel, 'students');
}

if (!empty($_POST['type']) && $_POST['type'] == "update") {
    $StudentModel = new StudentModel(
        $_POST['id'],
        $_POST['nombres'],
        $_POST['apellidos'],
        $_POST['genero']);
    $sql = 'UPDATE students SET nombres=?,apellidos=?,genero=? WHERE identificacion=?';
    return $actions->Update_Data($sql, $StudentModel, 'students');
}

if (!empty($_POST['type']) && $_POST['type'] == "delete") {
    $sql = "DELETE FROM students WHERE identificacion =  ?";
    return $actions->Delete_Data($sql,$_POST['id']);
}
