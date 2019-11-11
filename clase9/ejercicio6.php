<?php
$server = "localhost:3306";
$username = "root";
$password = "";
$database = "cl";


$connection = mysqli_connect ($server,$username,$password,$database);
if (!$connection){
  die("error al conectar a base de datos".mysqli_connect_error());
}
$sql ="select Horario.idHorario, Horario.Fecha as 'HorarioFecha', Profesor.idProfesor, Profesor.Nombre as 'ProfesorNombre',
Profesor_Horario.IdProfesor_Horario
from Profesor
inner join Profesor_Horario on Profesor_Horario.idProfesor = Profesor.idProfesor
inner join Horario on Profesor_Horario.idHorario = Horario.idHorario";

$query = mysqli_query($connection, $sql);

if ( mysqli_num_rows($query) > 0 ) {
    while ($row = mysqli_fetch_assoc($query)) {
            echo " HorarioFecha : " . $row ["HorarioFecha"];
            echo " idProfesor: " . $row ["idProfesor"];
            echo " ProfesorNombre: " . $row ["ProfesorNombre"];
            echo " IdProfesor_Horario: " . $row ["IdProfesor_Horario"];
            echo '<br>';
    }
}



?>