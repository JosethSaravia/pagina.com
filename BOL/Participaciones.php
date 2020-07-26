<?php
class Participaciones
{
	private $Id;
	private $Cantidad;
	private $Nombre;
	
	public function __GET($x)
	{
		return $this->$x;
	}   
	public function __SET($x, $y)
	{
		return $this->$x = $y;
	}
}
?>