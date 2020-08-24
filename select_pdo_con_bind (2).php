<?php
	
//SELECT EN BBDD HOSPITAL
	
//0.INCORPORAR EL FICHERO DE CONEXION
	require 'conexion.php';

	try{
//1.PREPARAR LA SENTENCIA SQL
		$stmt=$dbh->prepare("SELECT * FROM paciente WHERE fechaingreso > :fecha");
//2.BIND DE LOS PARAMETROS (INFORMAR PARAMETROS)
		// $nif='12345675K';
		// $nombre='Paul';
		// $apellidos='Atreides';
		$fecha= '2019-03-13';

		$stmt->bindParam(':fecha',$fecha);
//3.ESPECIFICAR EL TIPO DE SALIDAS QUE QUEREMOS
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

//4.EJECUTAR LA SENTENCIA
		$stmt->execute();
//5.RECORRER LA SENTENCIA EN UN WHILE
		while ($fila = $stmt->fetch()){
		print_r($fila);
		echo '<br>';
		}
//6.NUMERO DE REGISTROS RECUPERADOS
		$numreg=$stmt->rowCount();
		echo "Se han recuperado $numreg filas";
		echo '<br>';

//7.MENSAJE ALTA EFECTUADA
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