<?php
require_once('../DAL/DBAccess.php');
require_once('../BOL/login.php');

class Ingreso_Login
{
	private $pdo;

	public function __CONSTRUCT()
	{
			$dba = new DBAccess();
		$this->pdo = $dba->get_connection();
	}

	public function Acceder(login $log)
	{
		try
		{
				$usuario=$log->__GET('Usuario');
				$contrasenia=$log->__GET('Clave');
				$result = array();

				$statement = $this->pdo->prepare("call SP_Ingresar_Login(?,?)");
				$statement->bindParam(1,$usuario);
				$statement->bindParam(2,$contrasenia);
				$statement->execute();
				foreach($statement->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$logg = new login();

				$logg->__SET('Usuario', $r->usuario);
				$logg->__SET('Clave', $r->contrasenia);

				$result[] = $logg;

			}

			return $result;



		} catch (Exception $e)
		{
			die($e->getMessage());
		}
    }
    public function Registrar_Login(Login $log)
	{
		try
		{
            $Usuario=$log->__GET('Usuario');
            $Clave=$log->__GET('Clave');    
            $Nombre=$log->__GET('Nombre');
            $Apellido=$log->__GET('Apellido');
            $statement = $this->pdo->prepare("call SP_agregar_login(?,?,?,?)");
            $statement->bindParam(1,$Usuario);
            $statement->bindParam(2,$Clave);
            $statement->bindParam(3,$Nombre);
            $statement->bindParam(4,$Apellido);
            $statement->execute();


		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
    

}

?>