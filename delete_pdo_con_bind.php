<?php
	
//DELETE EN BBDD HOSPITAL
	
//0.INCORPORAR EL FICHERO DE CONEXION
	require 'conexion.php';

	try{
//1.PREPARAR LA SENTENCIA SQL
		$stmt=$dbh->prepare("DELETE FROM paciente SET fechaalta = :fecha WHERE idpaciente = :id");
//2.BIND DE LOS PARAMETROS (INFORMAR PARAMETROS)
		// $nif='12345675K';
		// $nombre='Paul';
		// $apellidos='Atreides';
		//$fecha= '2019-03-13';
		$id=7;

		$stmt->bindParam(':id',$id);

//3.EJECUTAR LA SENTENCIA
		$stmt->execute();
//4.NUMERO DE FILAS MODIFICADAS
		$numreg=$stmt->rowCount();
//5.MENSAJE MODIFICACIÓN EFECTUADA
		echo "Se han borrado $numreg filas";
		echo '<br>';
//6.MENSAJE MODIFICACIÓN EFECTUADA
		echo 'alta efectuada con el id: $id';
		}
		catch(PDOException $e){		//EXCEPCIONES PDO
			//print_r($stmt->ErrorInfo());
			if ($stmt->ErrorInfo()[1] == 1451) {
				echo "El paciente no se puede borrar porque tiene relaciones con clave foránea";
			}else{
			$mensaje= $e->getMessage();
			$codigo= $e->getCode();
			echo "error $codigo: $mensaje";
			}
		catch(Exception $e){		//EXCEPCIONES GENÉRICAS
			$mensaje= $e->getMessage();
			$codigo= $e->getCode();
			echo "error $codigo: $mensaje";
		}
?>