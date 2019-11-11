<?php
$server = "localhost:3306";
$username = "root";
$password = "";
$database = "cl";


$connection = mysqli_connect ($server,$username,$password,$database);
if (!$connection){
  die("error al conectar a base de datos".mysqli_connect_error());
}
$sql ="select Subject.idSubject , Subject.Nombre as 'NombreSubject', Profesor.idProfesor , Profesor.Nombre as 'NombreProfesor',
Profesor_Subject.IdProfesor_Subject
from Profesor
inner join Profesor_Subject on Profesor_Subject.idProfesor = Profesor.idProfesor 
inner join Subject on Profesor_Subject.idSubject = Subject.idSubject";

$query = mysqli_query($connection, $sql);

if ( mysqli_num_rows($query) > 0 ) {
    while ($row = mysqli_fetch_assoc($query)) {
            echo " NombreSubject: " . $row ["NombreSubject"];
            echo " idProfesort: " . $row ["idProfesor"];
            echo " NombreProfesor: " . $row ["NombreProfesor"];
            echo " IdProfesor_Subject: " . $row ["IdProfesor_Subject"];
            echo " idSubject: " . $row ["idSubject"];
            echo '<br>';
    }
}



?>