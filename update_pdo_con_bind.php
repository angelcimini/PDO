<?php
	
//UPDATE EN BBDD HOSPITAL
	
//0.INCORPORAR EL FICHERO DE CONEXION
	require 'conexion.php';

	try{
//1.PREPARAR LA SENTENCIA SQL
		$stmt=$dbh->prepare("UPDATE paciente SET fechaalta = :fecha WHERE idpaciente = :id");
//2.BIND DE LOS PARAMETROS (INFORMAR PARAMETROS)
		// $nif='12345675K';
		// $nombre='Paul';
		// $apellidos='Atreides';
		//$fecha= '2019-03-13';
		$id=4;
		$fecha= '2020-01-31';

		$stmt->bindParam(':id',$id);
		$stmt->bindParam(':fecha',$fecha);

//3.EJECUTAR LA SENTENCIA
		$stmt->execute();
//4.NUMERO DE FILAS MODIFICADAS
		$numreg=$stmt->rowCount();
//5.MENSAJE MODIFICACIÓN EFECTUADA
		echo "Se han modificado $numreg filas";
		echo '<br>';
//6.MENSAJE MODIFICACIÓN EFECTUADA
		echo 'alta efectuada con el id: $id';
		}
		catch(PDOException $e){		//EXCEPCIONES PDO
			//print_r($stmt->ErrorInfo());
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