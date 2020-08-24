<?php
	
//INSERT EN BBDD HOSPITAL
	
//0.INCORPORAR EL FICHERO DE CONEXION
	require 'conexion.php';

	try{
//1.INFORMAR VARIABLES
		$nif='12345675K';
		$nombre='Paul';
		$apellidos='Atreides';

	//VALIDAR VARIABLES INFORMADAS
		if ($nif=='') {
			throw new Exception("Nif obligatorio", 10);
		}
		if ($nombre=='') {
			throw new Exception("Nombre obligatorio", 10);
		}
		if ($apellidos=='') {
			throw new Exception("Apellidos obligatorios", 10);
		}
//2.CONSTRUIR LA SENTENCIA SQL
	$sql="INSERT INTO paciente VALUES (NULL, '$nif', '$nombre', '$apellidos', CURRENT_TIMESTAMP, NULL)";
//3.EJECUTAR LA SENTENCIA
		$dbh->query($sql);
//4.RECUPERAR LA ULTIMA CLAVE PRIMARIA ASIGNADA
		$id = $dbh->lastInsertId();
//5.MENSAJE ALTA EFECTUADA
		echo 'alta efectuada con el id: $id';
		}
		catch(PDOException $e){		//EXCEPCIONES PDO
			//controlar registro duplicado
			if ($e->ErrorInfo()[1] == 1062) {
				echo "Paciente ya existe en la base de datos";
			}else{
			$mensaje= $e->getMessage();
			$codigo= $e->getCode();
			echo "error $codigo: $mensaje";
			}
		}
		catch(Exception $e){		//EXCEPCIONES GENÉRICAS
			$mensaje= $e->getMessage();
			$codigo= $e->getCode();
			echo "error $codigo: $mensaje";
		}
?>