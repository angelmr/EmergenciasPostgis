<?php
require_once 'templates/funciones/funciones.php';

// Gets data from URL parameters.
if(isset($_GET['add_location'])) {
    add_location();
}

function add_location(){
   $host= "localhost";
   $port= "5432";
   $user= "postgres";
   $database="emergencias";
   $password ="postgres"; 
   $con = pg_connect("host=$host  port=$port user=$user dbname=$database password=$password");
    if (!$con) {
        die('Not connected : ' . pg_connect_error());
    }
    $nombres = $_GET['nombres'];
    $apellidos = $_GET['apellidos'];
    $fecha_nacimiento = $_GET['fecha_nacimiento'];
    $sexo = $_GET['sexo'];
    $direccion = $_GET['direccion'];
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    $cedula = $_GET['cedula'];
    $convencional = $_GET['convencional'];
    $celular =$_GET['celular'];
    $correo = $_GET['correo'];
    $geom = $_GET['geom'];
    // Inserts new row with place data.
    $query = sprintf("INSERT INTO public.paciente".
        "(nombres, apellidos, fecha_nacimiento, sexo, direccion, lat, lng, cedula, convencional, celular, correo, geom)".
        "VALUES ('%s', '%s', '%s', '%s', '%s','%s', '%s', '%s', '%s', '%s', '%s', ST_GeomFromText('POINT(%s)',32717));",
        pg_escape_string($con,$nombres),
        pg_escape_string($con,$apellidos),
        pg_escape_string($con,$fecha_nacimiento),
        pg_escape_string($con,$sexo),
        pg_escape_string($con,$direccion),
        pg_escape_string($con,$lat),
        pg_escape_string($con,$lng),
        pg_escape_string($con,$cedula),
        pg_escape_string($con,$convencional),
        pg_escape_string($con,$celular),
        pg_escape_string($con,$correo),
        pg_escape_string($con,$geom));
    $result = pg_query($con,$query);
    if (!$result) {       die('Invalid query: ' . pg_error($con));
    }
}
function get_all_locations(){
    $host= "localhost";
   $port= "5432";
   $user= "postgres";
   $database="emergencias";
   $password ="postgres"; 
   $con = pg_connect("host=$host  port=$port user=$user dbname=$database password=$password");
    if (!$con) {
        die('Not connected : ' . pg_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = pg_query($con,"SELECT p.nombres, p.apellidos, p.fecha_nacimiento, p.sexo, p.direccion, p.lat, p.lng, p.cedula, 
    p.convencional, p.celular, p.correo, g.nombre_contacto_emergencia,g.celular_contacto_emergencia FROM paciente p
    LEFT JOIN gestion_pandemia g ON p.cedula = g.id_paciente");
    $rows = array();
    while($r = pg_fetch_assoc($sqldata)) {
        $rows[] = $r;
    }
  $indexed = array_map('array_values', $rows);
  //  $array = array_filter($indexed);
    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }

}
function get_location_paciente(){
    $host= "localhost";
   $port= "5432";
   $user= "postgres";
   $database="emergencias";
   $password ="postgres"; 
   $con = pg_connect("host=$host  port=$port user=$user dbname=$database password=$password");
    if (!$con) {
        die('Not connected : ' . pg_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = pg_query($con,"SELECT p.nombres, p.apellidos, p.fecha_nacimiento, p.sexo, p.direccion, p.lat, p.lng, p.cedula, 
    p.convencional, p.celular, p.correo, g.nombre_contacto_emergencia,g.celular_contacto_emergencia FROM paciente p
    LEFT JOIN gestion_pandemia g ON p.cedula = g.id_paciente");
    $rows = array();
    while($r = pg_fetch_assoc($sqldata)) {
        $rows[] = $r;
    }
  $indexed = array_map('array_values', $rows);
  //  $array = array_filter($indexed);
    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}
?>