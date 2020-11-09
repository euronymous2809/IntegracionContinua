<?php

Class Carro extends Controlador{
	public $marca;
	function __construct(){

		$this->marca = $marca;

	}
}

$vehiculo = new Carro("sirve para transportar pesonas");
$concesionario = $vehiculo;
$concesionario->marca = "Mazda";
echo $vehiculo->marca;
?>