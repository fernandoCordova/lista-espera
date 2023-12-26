<?php

namespace App\Models;

class Home_model
{
    private $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function insertar($tabla, $datos)
    {
        $resultado = $this->db->table($tabla)->insert($datos);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizar($tabla, $comparar, $valor, $datos)
    {
        $resultado = $this->db->table($tabla)->where($comparar, $valor)->update($datos);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerUsuario($where = 1,  $clauses = [])
    {
        $sql = "select u.idusuario, u.idtipousuario, u.nombre, u.rut, u.telefono, u.correo
                from usuario u
                where u.estado = 1 and $where";

        $query = $this->db->query($sql, $clauses);

        // print_r((string) $this->db->getLastQuery());
        // die;

        if ($query->getNumRows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
}
