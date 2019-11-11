<?php
$server = "localhost:3306";
$username = "root";
$password = "";
$database = "cl";


$connection = mysqli_connect ($server,$username,$password,$database);
if (!$connection){
  die("error al conectar a base de datos".mysqli_connect_error());
}
$sql ="select Horario.idHorario , Horario.fecha as 'Horariofecha', Estudiante.IdEstudiante, Estudiante.Nombre as 'EstudianteNombre',
Estudiante_Horario.idEstudiante_Horario
from Estudiante
inner join Estudiante_Horario on Estudiante_Horario.IdEstudiante = Estudiante.idEstudiante
inner join Horario on Estudiante_Horario.idHorario = Horario.idHorario";

$query = mysqli_query($connection, $sql);

if ( mysqli_num_rows($query) > 0 ) {
    while ($row = mysqli_fetch_assoc($query)) {
            echo " Horariofecha : " . $row ["Horariofecha"];
            echo " IdEstudiante: " . $row ["IdEstudiante"];
            echo " EstudianteNombre: " . $row ["EstudianteNombre"];
            echo " idEstudiante_Horario: " . $row ["idEstudiante_Horario"];
            echo '<br>';
    }
}



?>