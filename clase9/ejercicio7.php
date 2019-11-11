<?php
$server = "localhost:3306";
$username = "root";
$password = "";
$database = "cl";


$connection = mysqli_connect ($server,$username,$password,$database);
if (!$connection){
  die("error al conectar a base de datos".mysqli_connect_error());
}
$sql ="select Horario.idHorario, Horario.fecha as 'HorarioFecha', Profesor.idProfesor, Profesor.Nombre as 'ProfesorNombre',
Estudiante.idEstudiante, Estudiante.Nombre as 'EstudianteNombre', Profesor_Horario.idProfesor_Horario, 
Estudiante_Horario.idEstudiante_Horario
from Horario 
inner join Profesor_Horario on Profesor_Horario.idHorario = Horario.idHorario
inner join Profesor on Profesor_Horario.idProfesor = Profesor.idProfesor
inner join Estudiante_Horario on Estudiante_Horario.idHorario = Horario.idHorario
inner join Estudiante on Estudiante_Horario.idEstudiante = Estudiante.idEstudiante;";

$query = mysqli_query($connection, $sql);

if ( mysqli_num_rows($query) > 0 ) {
    while ($row = mysqli_fetch_assoc($query)) {
            echo " HorarioFecha : " . $row ["HorarioFecha"];
            echo " idProfesor: " . $row ["idProfesor"];
            echo " ProfesorNombre: " . $row ["ProfesorNombre"];
            echo " idEstudiante: " . $row ["idEstudiante"];
            echo " EstudianteNombre: " . $row ["EstudianteNombre"];
            echo " idProfesor_Horario: " . $row ["idProfesor_Horario"];
            echo " idEstudiante_Horario: " . $row ["idEstudiante_Horario"];
            echo '<br>';
    }
}



?>