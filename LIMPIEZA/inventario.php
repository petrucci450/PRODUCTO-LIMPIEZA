<!DOCTYPE html>
<html>
<head>
	<title>Inventario</title>
    <meta charset="UTF-8">
  <title>Inventario</title>

  <!-- Enlaces para Bootstrap CSS y JS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <!-- Enlace para DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

  <!-- Enlaces para Bootstrap CSS y JS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <!-- Enlace para DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

 

</head>
 <!-- Enlaces para jsPDF -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.16/jspdf.plugin.autotable.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


<!-- Enlace para Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="estilos.css">
<body>
<script>
    $(document).ready(function() {
      // Inicializar DataTables en la tabla del inventario
      $('#tabla-inventario').DataTable();
      
      // Agregar evento "click" al botón de descarga
      $('#descargar-pdf').on('click', function() {
        // Obtener contenido HTML de la tabla
        var html = $('#tabla-inventario').html();
        
        // Crear objeto jsPDF
        var doc = new jsPDF();
        
        // Agregar tabla a PDF
        doc.autoTable({ html: html });
        
        // Descargar archivo PDF
        doc.save('inventario.pdf');
      });
    });
  </script>

	<h1>Inventario</h1>
	<table >
		<tr>
			<th>Nombre del producto</th>
			<th>Cantidad</th>
			<th>Precio</th>
		</tr>
        
     
		<?php
		// Conectarse a la base de datos
		$host = "localhost";
        $user = "root";
        $pass = "";
        $db = "myDB";
        $conn = new mysqli($host, $user, $pass, $db);

	// Verificar la conexión
	if ($conn->connect_error) {
	    die("Conexión fallida: " . $conn->connect_error);
	} 

	// Obtener los datos de la tabla "productos"
	$sql = "SELECT * FROM productos";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // Mostrar los datos en una tabla
	    while($row = $result->fetch_assoc()) {
	        echo "<tr><td>" . $row["nombre_producto"] . "</td><td>" . $row["cantidad"] . "</td><td>" . $row["precio"] . "</td></tr>";
	    }
	} else {
	    echo "No hay productos en el inventario";
	}

	$conn->close();
	?>
    <a href="formulario.html" class="btn btn-primary">Ir al formulario</a> <br>

    
</table>
</body>

</html>
