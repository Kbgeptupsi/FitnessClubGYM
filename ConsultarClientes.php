<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['Identificacion'])) {
	header("Location: index.php");
}

$Identificacion = $_SESSION['Identificacion'];
$Usuario = $_SESSION['Usuario'];




?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Consultas</title>
	<link href="css/styles.css" rel="stylesheet" />
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php">Control Gym</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
		
		<ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $Usuario; ?><i class="fas fa-user fa-fw"></i></a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<a class="dropdown-item" href="#">Configuración</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="logout.php">Salir</a>
				</div>
			</li>
		</ul>
	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav">
						<div class="sb-sidenav-menu-heading">Consultas</div>
						<a class="nav-link" href="principal.php">
							<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
							Menu Principal
						</a>
					</div>
				</div>
				<div class="sb-sidenav-footer">
					<div class="small">Estas en:</div>
					Consultas
				</div>
			</nav>
		</div>
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid">
					<h1 class="mt-4">Consultas</h1>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item"><a href="principal.php">Menu Principal</a></li>
						<li class="breadcrumb-item active">Consultas</li>
					</ol>
					<div class="card mb-4">
						<div class="card-body">En esta sección podra encontrar información de los clientes registrados en el sistema.</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Identificacion</th>
										<th>Primer Nombre</th>
										<th>Primer Apellido</th>
										<th>Segundo Apellido</th>
										<th>Fecha de Nacimiento</th>
										<th>Sexo</th>
										<th>Celular</th>
										<th>correo</th>
										<th>Tipo de Identificacion</th>
										<th>Direccion</th>
										<th>Eliminar </th>
										<th> Editar </th>
										<th>Facturar </th>
									</tr>
								</thead>
								<tbody>

									<?php
									$query = "SELECT * FROM clientes";
									$result_tasks = mysqli_query($mysqli, $query);

									while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
										<tr>
											<td><?php echo $row['Identificacion']; ?></td>
											<td><?php echo $row['PrimerNombre']; ?></td>
											<td><?php echo $row['PrimerApellido']; ?></td>
											<td><?php echo $row['SegundoApellido']; ?></td>
											<td><?php echo $row['FechaNacimiento']; ?></td>
											<td><?php echo $row['Sexo']; ?></td>
											<td><?php echo $row['Celular']; ?></td>
											<td><?php echo $row['Correo']; ?></td>
											<td><?php echo $row['TipoIdentificacion']; ?></td>
											<td><?php echo $row['Direccion']; ?></td>
										
											<td>
												<a href="EliminarClientes.php?Identificacion=<?php echo $row['Identificacion'] ?>" class="btn btn-danger">
												<i class="fas fa-trash"></i>
												</a>
											</td>
											<td>
												<a href="EditarCliente.php?Identificacion=<?php echo $row['Identificacion'] ?>" class="btn btn-success">
												<i class="fas fa-user-edit"></i>
												</a>
											</td>

											<td>
												<a href="Facturar.php?Identificacion=<?php echo $row['Identificacion'] ?>" class="btn btn-warning">
												<i class="fas fa-user-edit"></i>
												</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</main>
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; Creado por K&K 2022</div>
						<div>
							<a href="Politicas.php">Politicas de privacidad</a>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="js/scripts.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
	<script src="assets/demo/datatables-demo.js"></script>
</body>

</html>