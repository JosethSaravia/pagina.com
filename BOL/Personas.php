
<?php
class Personas
{
	private $Id;
	private $Nombres;
    private $Apellidos;
    private $Grado_Academico;

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