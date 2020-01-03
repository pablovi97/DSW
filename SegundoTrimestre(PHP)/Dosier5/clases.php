<?php
class Persona{
private $nombre;
private $apellidos;
function __construct(string $nombre="", string $apellidos="") {
$this->nombre = $nombre;
$this->apellidos = $apellidos;
}
public function __toString():string{
return $this->nombre . " " . $this->apellidos;
}
public function setNombre(string $nombre):void{
$this->nombre = $nombre;
}
}
$p = new Persona("Alfon","Martín" );
$p->setNombre("Armando");
echo "<br>
{$p} ";
?>