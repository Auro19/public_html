<?php

/*

 include('../Acceso_a_datos/accConexion.php'); 

     error_reporting(1);
	 $idConexion=AbrirConexion("personas");
	 


if (!$mysqli->query("CALL USP_TEST_NIDIA(1)")) {
    echo "Fall� CALL: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!($resultado = $mysqli->query("SELECT id FROM test"))) {
    echo "Fall� SELECT: (" . $mysqli->errno . ") " . $mysqli->error;
}

var_dump($resultado->fetch_assoc());

  //cerrar conexion
	  CerrarConexion("personas");

*/

$mysqli = new mysqli("localhost", "root", "nidia", "personas");
if ($mysqli->connect_errno) {
    echo "Fall� la conexi�n a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
/*
if (!$mysqli->query("DROP PROCEDURE IF EXISTS p") ||
    !$mysqli->query('CREATE PROCEDURE p(OUT msg VARCHAR(50)) BEGIN SELECT "�Hola!" INTO msg; END;')) {
    echo "Fall� la creaci�n del procedimiento almacenado: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$mysqli->query("SET @msg = ''") || !$mysqli->query("CALL p(@msg)")) {
    echo "Fall� CALL: (" . $mysqli->errno . ") " . $mysqli->error;
}
*/
/*if (!($resultado = $mysqli->query("SELECT @msg as _p_out"))) {
    echo "Fall� la obtenci�n: (" . $mysqli->errno . ") " . $mysqli->error;
}
*/

if (!($resultado = $mysqli->query("CALL USP_TEST_NIDIA(2)"))) {
    echo "Fall� la obtenci�n: (" . $mysqli->errno . ") " . $mysqli->error;
}

do {
    if ($resultado = $mysqli->store_result()) {
        printf("---\n");
        var_dump($resultado->fetch_all());
		echo $resultado;
        $resultado->free();
    } else {
        if ($mysqli->errno) {
            echo "Store failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
    }
} while ($mysqli->more_results() && $mysqli->next_result());

/*

if (!$mysqli->query("DROP TABLE IF EXISTS test") ||
    !$mysqli->query("CREATE TABLE test(id INT)") ||
    !$mysqli->query("INSERT INTO test(id) VALUES (1), (2), (3)")) {
    echo "Fall� la creaci�n de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!$mysqli->query("DROP PROCEDURE IF EXISTS p") ||
    !$mysqli->query('CREATE PROCEDURE p() READS SQL DATA BEGIN SELECT id FROM test; SELECT id + 1 FROM test; END;')) {
    echo "Fall� la creaci�n del procedimiento almacenado: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!$mysqli->multi_query("CALL p()")) {
    echo "Fall� CALL: (" . $mysqli->errno . ") " . $mysqli->error;
}

do {
    if ($resultado = $mysqli->store_result()) {
        printf("---\n");
        var_dump($resultado->fetch_all());
        $resultado->free();
    } else {
        if ($mysqli->errno) {
            echo "Store failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
    }
} while ($mysqli->more_results() && $mysqli->next_result());*/

?>
