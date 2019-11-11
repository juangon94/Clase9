<?php
$server = "localhost:3306";
$username = "root";
$password = "";
$database = "cl";


$connection = mysqli_connect ($server,$username,$password,$database);
if (!$connection){
  die("error al conectar a base de datos".mysqli_connect_error());
}
$sql ="select Subject.idSubject , Subject.Nombre as 'NombreSubject', Estudiante.idEstudiante, Estudiante.Nombre as 'NombreEstudiante',
Estudiante_Subject.IdEstudiante_Subject
from Estudiante
inner join Estudiante_Subject on Estudiante_Subject.idEstudiante = Estudiante.idEstudiante
inner join subject on Estudiante_Subject.idSubject = Subject.idSubject;";

$query = mysqli_query($connection, $sql);

if ( mysqli_num_rows($query) > 0 ) {
    while ($row = mysqli_fetch_assoc($query)) {
            echo " NombreSubject: " . $row ["NombreSubject"];
            echo " idEstudiante: " . $row ["idEstudiante"];
            echo " NombreEstudiante: " . $row ["NombreEstudiante"];
            echo " IdEstudiante_Subject: " . $row ["IdEstudiante_Subject"];
            echo " idSubject: " . $row ["idSubject"];
            echo '<br>';
    }
}



?>