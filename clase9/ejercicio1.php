<?php
$server = "localhost:3306";
$username = "root";
$password = "";
$database = "cl";


$connection = mysqli_connect ($server,$username,$password,$database);
if (!$connection){
  die("error al conectar a base de datos".mysqli_connect_error());
}
$sql ="select Estudiante.*, Sede.Nombre as 'NombreSede', Sede.Direccion as 'DireccionSede' from Sede
inner join Estudiante on Sede.idSede = Estudiante.idSede";

$query = mysqli_query($connection, $sql);

if ( mysqli_num_rows($query) > 0 ) {
    while ($row = mysqli_fetch_assoc($query)) {
            echo "idEstudiante: ". $row ["idEstudiante"];
            echo "Nombre: ". $row ["Nombre"];
            echo "Apellido: ". $row ["Apellido"];
            echo "DOB: ". $row ["DOB"];
            echo "Direccion: ". $row ["Direccion"];
            echo "Estado: ". $row ["Estado"];
            echo "Ciudad: ". $row ["Ciudad"];
            echo "Codigo_Postal: ". $row ["Codigo_Postal"];
            echo "Grado: ". $row ["Grado"];
            echo "idSede: ". $row ["idSede"];
            echo "NombreSede: ". $row ["NombreSede"];
            echo "DireccionSede: ". $row ["DireccionSede"];
            echo '<br>';
    }
}



?>