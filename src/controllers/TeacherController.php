<?php

require_once('../middleware/Actions.php');
require_once('../models/TeacherModel.php');

$actions = new Actions();

if (!empty($_GET['type'])) {
    echo $actions->GetAllResults('teachers');
}

if (!empty($_POST['type']) && $_POST['type'] == "insert") {
    $TeacherModel = new TeacherModel(
        $_POST['identificacion'],
        $_POST['nombres'],
        $_POST['apellidos'],
        $_POST['genero']);
    $sql = 'INSERT INTO teachers (identificacion,nombres,apellidos,genero) VALUES (?,?,?,?)';
    return $actions->RegisterData($sql, $TeacherModel, 'teachers');
}

if (!empty($_POST['type']) && $_POST['type'] == "update") {
    $TeacherModel = new TeacherModel(
        $_POST['id'],
        $_POST['nombres'],
        $_POST['apellidos'],
        $_POST['genero']);
    $sql = 'UPDATE teachers SET nombres=?,apellidos=?,genero=? WHERE identificacion=?';
    return $actions->Update_Data($sql, $TeacherModel, 'teachers');
}

if (!empty($_POST['type']) && $_POST['type'] == "delete") {
    $sql = "DELETE FROM teachers WHERE identificacion =  ?";
    return $actions->Delete_Data($sql,$_POST['id']);
}
