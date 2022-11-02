<?php



class consultorio

{
	private $id;
	private $nombre;
	Private $Conexion;
	


	public function setNombre($nombre)
	{
		$this->nombre=$nombre;
	}
	
	public function getNombre()
	{
		return ($this->nombre);
	}
	

	public function conN1($nombre)
	{
		
		$this->nombre=$nombre;
		
	}
	
	public function consultorioN($nombre,$id)
	{
		$this->id=$id;
		$this->nombre=$nombre;
		
	}
	
	public function agregarConsultorio()
	{	

		include("../modelo/dataBase.php");

		$this->Conexion=$conn;
		$sql="INSERT INTO consultorio (conNombre) VALUES ('$this->nombre')";
		$resultado = mysqli_query($conn, $sql);
		$this->Conexion->close();
		return $resultado;	
	}

	public function editarConsultorio()
	{

		include("../modelo/dataBase.php");

		$this->Conexion=$conn;
		$query=" UPDATE consultorio SET conNombre ='$this->nombre' WHERE idConsultorio = '$this->id'";
		$resultado = mysqli_query($conn, $query);
		$this->Conexion->close();
		return $resultado;	
	}
	
}

?>