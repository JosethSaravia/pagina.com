<?php
require_once('../DAL/DBAccess.php');
require_once('../BOL/Personas.php');

class Registrar_Persona
{
	private $pdo;

	public function __CONSTRUCT()
	{
			$dba = new DBAccess();
		$this->pdo = $dba->get_connection();
	}

	public function registrar(Personas $per)
	{
		try
		{
        $nombres=$per->__GET('nombre');
        $apellidos=$per->__GET('apellido');
        $statement = $this->pdo->prepare("call SP_agregar_persona(?,?)");
        $statement->bindParam(1,$nombres);
  		$statement->bindParam(2,$apellidos);
  		$statement->execute();


		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function eliminar (Personas $per)
	{
		try
		{
        $id=$per->__GET('id');
        $statement = $this->pdo->prepare("call SP_eliminar_persona(?)");
        $statement->bindParam(1,$id);
  		$statement->execute();


		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}

?>