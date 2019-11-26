<?php
session_start();
include('../php/connect.php');
include('remover.php');
    $N_Serie = $_GET['N_Serie'];

    if (isset($_POST['submit'])) {
    	$con->query("UPDATE `protudos` SET `Tipo` = '$tipo', `N_serie` = '$n_serie', `Modelo`='$modelo', `Velocidade`='$velocidade', 
		`Vol_MedImp`='$vol_medimp', `Qualidade`='$qualidade', `Formato_Max`='$formato_max', 
		`Gramagem_Max`='$gramagem_max', `Duplex`='$duplex', `Capacidade`='$capacidade', 
		`Bandejas`='$bandejas', `Fax`='$fax', `Cores`='$cores', `Preto_Branco`='$peb' WHERE `N_Serie`=$n_serie");
    	header("location: index.php");
    }

    $maquinas = $con->query("SELECT * FROM `produtos` WHERE `N_serie`='$N_Serie'");
    $maqns = mysqli_fetch_assoc($maquinas);
	

?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<link rel="icon" href="img/favicon/favicon.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Xecsul: Loja Online</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
    <!-- Font Awesome and Pixeden Icon Stroke icon fonts-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/pe-icon-7-stroke.css">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- lightbox-->
    <link rel="stylesheet" href="css/lightbox.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
<body>
<form method="post" action="editdata.php" role="form">
	<div class="modal-body">
		<div class="form-group">
			<label for="id">Nº Série</label>
			<input type="text" class="form-control" id="N_Serie" name="N_Serie" value="<?php echo $maqns['N_serie'];?>" readonly="true"/>

		</div>
		<div class="form-group">
			<label for="name">Modelo</label>
			<input type="text" class="form-control" id="name" name="name" value="<?php echo $maqns['Modelo'];?>" />
		</div>
		<div class="form-group">
			<label for="velocidade">Velocidade</label>
				<input type="text" class="form-control" id="velocidade" name="velocidade" value="<?php echo $maqns['Velocidade'];?>" />
		</div>
		<div class="form-group">
			<label for="vol_medimp">Vol_MedImp</label>
			<input type="text" class="form-control" id="vol_medimp" name="vol_medimp" value="<?php echo $maqns['Vol_MedImp'];?>" />

		</div>
		<div class="form-group">
      <label for="qualidade">Qualidade</label>
			<input type="text" class="form-control" id="qualidade" name="qualidade" value="<?php echo $maqns['Qualidade'];?>" />
		</div>
		<div class="form-group">
      <label for="formato_max">Formato_Max</label>
			<input type="text" class="form-control" id="formato_max" name="formato_max" value="<?php echo $maqns['Formato_Max'];?>" />
		</div>
		<div class="form-group">
      <label for="gramagem_max">Gramagem_Max</label>
			<input type="text" class="form-control" id="gramagem_max" name="gramagem_max" value="<?php echo $maqns['Gramagem_Max'];?>" />
		</div>
		<div class="form-group">
      <label for="duplex">Duplex</label>
			<input type="text" class="form-control" id="duplex" name="duplex" value="<?php echo $maqns['Duplex'];?>" />
		</div>
		<div class="form-group">
      <label for="capacidade">Capacidade</label>
			<input type="text" class="form-control" id="capacidade" name="capacidade" value="<?php echo $maqns['Capacidade'];?>" />
		</div>
		<div class="form-group">
      <label for="bandejas">Bandejas</label>
			<input type="text" class="form-control" id="bandejas" name="bandejas" value="<?php echo $maqns['Bandejas'];?>" />
		</div>
		<div class="form-group">
      <label for="fax">Fax</label>
			<input type="text" class="form-control" id="fax" name="fax" value="<?php echo $maqns['Fax'];?>" />
		</div>
		<div class="form-group">
      <label for="cores">Cores</label>
			<input type="text" class="form-control" id="cores" name="cores" value="<?php echo $maqns['Cores'];?>" />
		</div>
		<div class="form-group">
      <label for="peb">Preto e Branco</label>
			<input type="text" class="form-control" id="peb" name="peb" value="<?php echo $maqns['Preto_Branco'];?>" />
		</div>

		</div>
		<div class="modal-footer">
			<input type="submit" class="btn btn-primary" name="submit" value="Update" />&nbsp;
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</form>
</body>
</html>
