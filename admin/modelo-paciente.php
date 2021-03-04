<?php
  require_once 'templates/funciones/funciones.php';
//Eliminar
if ($_POST['registro'] == 'eliminar'){
    $id_borrar = $_POST['id'];
    try {
        $stmt = $conn->prepare('DELETE FROM paciente WHERE cedula= ?');
        $stmt->bindParam(1, $id_borrar, PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->AFFECTED_ROWS){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar 
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
    } catch (Exception $e) {
        $respuesta = array(
        'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}