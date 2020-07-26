<?php
class Login
{
    private $Usuario;
	private $Clave;
    private $Nombre;
    private $Apellido;

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