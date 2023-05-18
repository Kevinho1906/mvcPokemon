<?php

namespace Modelo;

include_once "conexion.php";

class Rol {
    private $id;
    private $nombreRol;
    private $estado = 'A';
    public $con; //Objeto de la clase conexión...

    public function __construct() {
        $this->con = new \Conexion();
    }

    public function create() {

        try {

            $request = $this->con->getCon()->prepare("INSERT INTO roles(nombreRol, estado) VALUES(:nombre, :estado)");
            $request->bindParam(':nombre', $this->nombreRol);
            $request->bindParam(':estado', $this->estado);
            $request->execute();
            return "Rol Creado Exitosamente...";

        } catch (PDOException $e) {
            
            return "Error al Crear el Rol... Revise " . $e->getMessage();

        }        
        
    }

    public function read() {

        try {
            
            $request = $this->con->getCon()->prepare("SELECT * FROM roles");
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;

        } catch (PDOException $e) {
            
            return "Error al Consultar los Roles... | ¡Revise! " . $e->getMessage();

        }

    }

    public function readOne($id)
    {
        try {
            
            $request = $this->con->getCon()->prepare("SELECT * FROM roles WHERE estado = 'A' AND id = :id");
            $request->bindParam(":id", $id);
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;

        } catch (PDOException $e) {

            return "Error al consultar los roles " . $e->getMessage();

        } 
    }

    public function estado() {

        try {

            $request = $this->con->getCon()->prepare("UPDATE roles SET estado=? WHERE id=?");
            $request->bindParam(1, $this->estado);
            $request->bindParam(2, $this->id);
            $request->execute();

            return "Estado Modificado Exitosamnete...";            

        } catch (PDOException $e) {

            return "Error" . $e->getMessage();

        }

    }

    public function update() {

        try {

            $request = $this->con->getCon()->prepare("UPDATE roles SET nombreRol=? WHERE id=?");
            $request->bindParam(1, $this->nombreRol);
            $request->bindParam(2, $this->id);
            $request->execute();

            return "Roles Modificado Exitosamnete...";
            
        } catch (PDOException $e) {

            return "Error" . $e->getMessage();

        }

    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombreRol
     */
    public function getNombreRol()
    {
        return $this->nombreRol;
    }


    /**
     * Set the value of nombreRol
     */
    public function setNombreRol($nombreRol): self
    {
        $this->nombreRol = $nombreRol;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }


    /**
     * Set the value of estado
     */
    public function setEstado($estado): self
    {
        $this->estado = $estado;

        return $this;
    }
}

?>