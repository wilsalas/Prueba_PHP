<?php

require_once '../models/ConexionModel.php';
class Actions
{
    private $con;
    public function __construct()
    {
        $this->con = ConexionModel::ConexionDB();
    }

    public function GetAllResults($nameTable)
    {
        $sql = "SELECT * FROM " . $nameTable;
        $query = $this->con->prepare($sql);
        $query->execute();
        if ($query->rowCount() > 0) {
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $this->lista[] = $row;
            }
            return $this->lista > 0 ? json_encode($this->lista) : json_encode([]);
        } else {
            return $this->lista[] = json_encode([]);
        }
    }

    public function RegisterData($sql, $model_identi, $type)
    {
        try {
            $query = $this->con->prepare($sql);
            if ($type == "students" || $type == "teachers") {
                // prepare sql and bind parameters
                $query->bindParam(1, $model_identi->getIdentificacion());
                $query->bindParam(2, $model_identi->getNombres());
                $query->bindParam(3, $model_identi->getApellidos());
                $query->bindParam(4, $model_identi->getGenero());
            } else if ($type == "courses") {
                $query->bindParam(1, $model_identi->getCodigo());
                $query->bindParam(2, $model_identi->getNombre());
                $query->bindParam(3, $model_identi->getObservaciones());
            }
            if ($query->execute()) {
                echo "Registro exitoso!";
            } else {
                echo "Error al registrar";
            }
            $this->con = null;
        } catch (PDOException $e) {
            echo 'ERROR', $e->getMessage();
        }
    }

    public function Update_Data($sql, $model_identi, $type)
    {
        try {
            $query = $this->con->prepare($sql);
            if ($type == "students" || $type == "teachers") {
                // prepare sql and bind parameters
                $query->bindParam(1, $model_identi->getNombres());
                $query->bindParam(2, $model_identi->getApellidos());
                $query->bindParam(3, $model_identi->getGenero());
                $query->bindParam(4, $model_identi->getIdentificacion());
            } else if ($type == "courses") {
                $query->bindParam(1, $model_identi->getNombre());
                $query->bindParam(2, $model_identi->getObservaciones());
                $query->bindParam(3, $model_identi->getCodigo());
            }
            if ($query->execute()) {
                echo "Registro Actualizado!";
            } else {
                echo "Error al Actualizar";
            }
            $this->con = null;
        } catch (PDOException $e) {
            echo 'ERROR', $e->getMessage();
        }
    }

    public function Delete_Data($sql, $id)
    {
        try {
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $id, PDO::PARAM_INT);
            if ($query->execute()) {
                echo "Registro Eliminado!";
            } else {
                echo "Error al eliminar el registro";
            }
            $this->con = null;
        } catch (PDOException $e) {
            echo 'ERROR', $e->getMessage();
        }
    }

}
