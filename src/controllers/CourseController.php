<?php

require_once('../middleware/Actions.php');
require_once('../models/CourseModel.php');

$actions = new Actions();

if (!empty($_GET['type'])) {
    echo $actions->GetAllResults('courses');
}

if (!empty($_POST['type']) && $_POST['type'] == "insert") {
    $CourseModel = new CourseModel(
        $_POST['codigo'],
        $_POST['nombre'],
        $_POST['observaciones']);
    $sql = 'INSERT INTO courses (codigo,nombre,observaciones) VALUES (?,?,?)';
    return $actions->RegisterData($sql, $CourseModel, 'courses');
}

if (!empty($_POST['type']) && $_POST['type'] == "update") {
    $CourseModel = new CourseModel(
        $_POST['id'],
        $_POST['nombre'],
        $_POST['observaciones']);
    $sql = 'UPDATE courses SET nombre=?,observaciones=? WHERE codigo=?';
    return $actions->Update_Data($sql, $CourseModel, 'courses');
}

if (!empty($_POST['type']) && $_POST['type'] == "delete") {
    $sql = "DELETE FROM courses WHERE codigo =  ?";
    return $actions->Delete_Data($sql,$_POST['id']);
}
