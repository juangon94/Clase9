<?php
$server = "localhost:3306";
$username = "root";
$password = "";
$database = "cl";


$connection = mysqli_connect ($server,$username,$password,$database);
if (!$connection){
  die("error al conectar a base de datos".mysqli_connect_error());
}
$sql ="select Subject.idsubject , Subject.Nombre as 'NombreSubject', Estudiante.IdEstudiante, Estudiante.Nombre as 'EstudianteNombre',
Horario.idHorario, Horario.Fecha as 'HorarioFecha',
Estudiante_Subject.IdEstudiante_Subject, Profesor.Nombre as 'NombreProfesor', Profesor.IdProfesor, Profesor_Subject.IdProfesor_Subject,
Estudiante_Horario.idEstudiante_Horario, Profesor_Horario.idProfesor_Horario
From Subject
inner join Estudiante_Subject on Estudiante_Subject.IdSubject = Subject.IdSubject
inner join Estudiante on Estudiante_Subject.idEstudiante = Estudiante.IdEstudiante
Inner join Profesor_Subject on Profesor_Subject.IdSubject = Subject.IdSubject
inner join Profesor on Profesor_Subject.IdProfesor = Profesor.idProfesor
inner join Profesor_Horario on Profesor_Horario.idProfesor = Profesor.idProfesor
inner join Horario on Profesor_Horario.idHorario = Horario.idHorario
inner join Estudiante_Horario on Estudiante_Horario.idEstudiante = Estudiante.idEstudiante 
and Estudiante_Horario.idHorario = Horario.idHorario;";

$query = mysqli_query($connection, $sql);

if ( mysqli_num_rows($query) > 0 ) {
    while ($row = mysqli_fetch_assoc($query)) {
            echo " NombreSubject : " . $row ["NombreSubject"];
            echo " IdEstudiante: " . $row ["IdEstudiante"];
            echo " EstudianteNombre: " . $row ["EstudianteNombre"];
            echo " idHorario: " . $row ["idHorario"];
            echo " HorarioFecha : " . $row ["HorarioFecha"];
            echo " IdEstudiante_Subject: " . $row ["IdEstudiante_Subject"];
            echo " NombreProfesor: " . $row ["NombreProfesor"];
            echo " IdProfesor: " . $row ["IdProfesor"];
            echo " IdProfesor_Subject " .$row ["IdProfesor_Subject"];
            echo " idEstudiante_Horario: " . $row ["idEstudiante_Horario"];
            echo " idProfesor_Horario: " . $row ["idProfesor_Horario"];
            echo '<br>';
    }
}



?>