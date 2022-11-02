<?php



class cita

{
	private $id;
	private $fecha;
	private $hora;
	private $paciente;
	private $medico;
	private $consultorio;
	private $estado;
	private $observaciones;
	

	public function setId($id)
	{
		$this->id=$id;
	}
	
	public function getId()
	{
		return ($this->id);
	}
	
	
	public function setFecha($fecha)
	{
		$this->fecha=$fecha;
	}
	
	public function getFecha()
	{
		return ($this->fecha);
	}
	
	public function setHora($hora)
	{
		$this->hora=$hora;
	}
	
	public function getHora()
	{
		return ($this->hora);
	}
	
	public function setPaciente($paciente)
	{
		$this->paciente=$paciente;
	}
	
	public function getPaciente()
	{
		return ($this->paciente);
	}
	
	public function setMedico($medico)
	{
		$this->medico=$medico;
	}
	
	public function getMedico()
	{
		return ($this->medico);
	}
	
	public function setConsultorio($consultorio)
	{
		$this->consultorio=$consultorio;
	}
	
	public function getConsultorio()
	{
		return ($this->consultorio);
	}
	
	public function setEstado($estado)
	{
		$this->estado=$estado;
	}
	
	public function getEstado()
	{
		return ($this->estado);
	}
	
	public function setObservaciones($observaciones)
	{
		$this->observaciones=$observaciones;
	}
	
	public function getObservaciones()
	{
		return ($this->observaciones);
	}

	public function citasD($id)
	{
		
		$this->id=$id; 
		
	}
	
	public function citasA($fecha, $hora, $paciente, $medico, $consultorio, $estado, $observaciones, $id)
	{
		$this->id=$id;
		$this->fecha=$fecha;
		$this->hora=$hora;
		$this->paciente=$paciente;
		$this->medico=$medico;
		$this->consultorio=$consultorio;
		$this->estado=$estado;
		$this->observaciones=$observaciones;
	}
	
	public function citasN($fecha, $hora, $paciente, $medico, $consultorio, $estado, $observaciones)
	{
		
		$this->fecha=$fecha;
		$this->hora=$hora;
		$this->paciente=$paciente;
		$this->medico=$medico;
		$this->consultorio=$consultorio;
		$this->estado=$estado;
		$this->observaciones=$observaciones;
	}
	
	public function agregarCita()
	{	

		include("../modelo/dataBase.php");

		$this->Conexion=$conn;
		$sql="INSERT INTO cita (citFecha, citHora, citPaciente, citMedico, citConsultorio, citEstado, citObservaciones)
		VALUES ('$this->fecha','$this->hora','$this->paciente','$this->medico','$this->consultorio','$this->estado','$this->observaciones' )";
		$resultado = mysqli_query($conn, $sql);
		$this->Conexion->close();
		return $resultado;	
	}

	public function editarCita()
	{

		include("../modelo/dataBase.php");

		$this->Conexion=$conn;
		$query="UPDATE cita SET citFecha ='$this->fecha', citHora = '$this->hora', citPaciente = '$this->paciente',  
		citMedico = '$this->medico', citConsultorio = '$this->consultorio', citEstado = '$this->estado', citObservaciones = '$this->observaciones'
		WHERE idCita = '$this->id'";
		$resultado = mysqli_query($conn, $query);
		$this->Conexion->close();
		return $resultado;	
	}
	public function eliminarCita(){

		include("../modelo/dataBase.php");

		$this->Conexion=$conn;
		$query =" DELETE  FROM  cita WHERE idCita = '$this->id'";
		$resultado = mysqli_query($conn, $query);
		$this->Conexion->close();
		return $resultado;


	}
}

?>