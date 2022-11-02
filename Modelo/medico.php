<?php



class medico

{
	private $id;
	private $identificacion;
	private $nombres;
	private $apellidos;
	private $especialidad;
	private $telefono;
    private $correo;
	Private $Conexion;
    
	
	public function setId($identificacion)
	{
		$this->identificacion=$identificacion;
	}
	
	public function getId()
	{
		return ($this->identificacion);
	}
	
	public function setIdentificacion($identificacion)
	{
		$this->identificacion=$identificacion;
	}
	
	public function getIdentificacion()
	{
		return ($this->identificacion);
	}
	
	public function setNombres($nombres)
	{
		$this->nombres=$nombres;
	}
	
	public function getNombres()
	{
		return ($this->nombres);
	}
	
	public function setApellidos($apellidos)
	{
		$this->apellidos=$apellidos;
	}
	
	public function getApellidos()
	{
		return ($this->apellidos);
	}
	
	public function setEspecialidad($especialidad)
	{
		$this->especialidad=$especialidad;
	}
	
	public function getEspecialidad()
	{
		return ($this->especialidad);
	}
	public function setTelefono($telefono)
	{
		$this->telefono=$telefono;
	}
	
	public function getTelefono()
	{
		return ($this->telefono);
	}
    public function setCorreo($correo)
	{
		$this->correo=$correo;
	}
	
	public function getCorreo()
	{
		return ($this->correo);
	}
	



	public function edicionMedico($identificacion, $nombres, $apellidos, $especialidad, $telefono, $correo, $id)
	{
		$this->id=$id;
		$this->identificacion=$identificacion;
		$this->nombres=$nombres;
		$this->apellidos=$apellidos;
		$this->especialidad=$especialidad;
		$this->telefono=$telefono;
        $this->correo=$correo;
	}
	
	public function crearMedico($identificacion, $nombres, $apellidos, $especialidad, $telefono, $correo)
	{
		$this->identificacion=$identificacion;
		$this->nombres=$nombres;
		$this->apellidos=$apellidos;
		$this->especialidad=$especialidad;
		$this->telefono=$telefono;
        $this->correo=$correo;
	}
	
	public function agregarMedico()
	{	

		include("../modelo/dataBase.php");

		$this->Conexion=$conn;
		$sql="INSERT INTO medico(medIdentificacion, medNombres, medApellidos, medEspecialidad, medTelefono, medCorreo)
		VALUES ('$this->identificacion','$this->nombres','$this->apellidos','$this->especialidad', '$this->telefono', '$this->correo')";
		$resultado = mysqli_query($conn, $sql);
		$this->Conexion->close();
		return $resultado;	
	}

	
	public function editarMedico()
	{
	    include("../modelo/dataBase.php");

	    $this->Conexion=$conn;
	    $query = "UPDATE medico SET medIdentificacion='$this->identificacion', medNombres='$this->nombres', medApellidos='$this->apellidos', 
        medEspecialidad='$this->especialidad', medTelefono='$this->telefono', medCorreo='$this->correo' WHERE idMedico = '$this->id'";
	    $resultado = mysqli_query($conn, $query);
	    $this->Conexion->close();
	    return $resultado;	
    }
}
	


?>