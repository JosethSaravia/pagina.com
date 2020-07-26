<?php
require_once ('../DAL/DBAccess.php');
require_once ('../BOL/Personas.php');
require_once ('../BOL/Participaciones.php');


class Mostrar_Participantes
{
	private $pdo;

	public function __CONSTRUCT()
	{
			$dba = new DBAccess();
		$this->pdo = $dba->get_connection();
	}

  public function Mostrar()
  	{
  		try
  		{
  			$result = array();
  			$statement = $this->pdo->prepare("call SP_Mostrar_Persona()");
  			$statement->execute();

  			foreach($statement->fetchAll(PDO::FETCH_OBJ) as $r)
  			{
  				$per = new Personas();

  				$per->__SET('nombre', $r->nombre);
                $per->__SET('apellido', $r->apellido);
                $per->__SET('Grado_Academico', $r->Grado_Academico);
  				$result[] = $per;
  			}

  			return $result;
  		}
  		catch(Exception $e)
  		{
  			die($e->getMessage());
  		}
      }
      
      public function Mostrar_Participaciones()
  	{
  		try
  		{
  			$result = array();
  			$statement = $this->pdo->prepare("call SP_Mostrar_Participaciones()");
  			$statement->execute();

  			foreach($statement->fetchAll(PDO::FETCH_OBJ) as $r)
  			{
                  
                  $can = new Participaciones();
                  $can->__SET('id',$r->id);
                  $can->__SET('cantidad',$r->cantidad);
                  $can->__SET('nombres',$r->nombres);
                  

               
                  $result[] = $can;
                  
  			}

  			return $result;
  		}
  		catch(Exception $e)
  		{
  			die($e->getMessage());
  		}
      }
      public function participar (Participaciones $par)
      {
          try
          {
          $id=$par->__GET('Id');
          $statement = $this->pdo->prepare("call SP_Agregar_Participaciones(?)");
          $statement->bindParam(1,$id);
          $statement->execute();
  
  
          } catch (Exception $e)
          {
              die($e->getMessage());
          }
      }
}

?>