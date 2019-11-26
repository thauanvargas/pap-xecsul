<?php
session_start();
include('../php/connect.php');
    $N_Serie = $_REQUEST['N_Serie'];

    if (isset($_POST['submit'])) {
    	$con->query("DELETE FROM produtos WHERE `N_serie`= '".$N_Serie."'");
    	echo "<script>alert('Maquina apagada!');history.back();</script>";
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
<form method="post" action="removemaquina.php" role="form">
<input type="hidden" name="N_Serie" value="<?php echo $maqns['N_serie'] ?>"/>
	<div style="width:800px;" class="modal-body">
		<div class="container">
    <div class="row">
        <div id="member" class="col-lg-12">
            <table style="width:700px;max-width:700px;" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Nº Série</th>
                    <th>Modelo</th>
                    <th>Velocidade</th>
                    <th>Volume Med Impressão</th>
                    <th>Qualidade</th>
                    <th>Formato Máximo</th>
                    <th>Gramagem Máxima</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                            echo '<tr>';
                               echo '<td>'.$maqns['N_serie'].'</td>';
                               echo '<td>'.$maqns['Modelo'].'</td>';
                               echo '<td>'.$maqns['Velocidade'].'</td>';
                               echo '<td>'.$maqns['Vol_MedImp'].'</td>';
                               echo '<td>'.$maqns['Qualidade'].'</td>';
                               echo '<td>'.$maqns['Formato_Max'].'</td>';
                               echo '<td>'.$maqns['Gramagem_Max'].'</td>';
                            echo '</tr>';
                    ?>
                </tbody>
            </table>
            <table style="width:700px;" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Duplex</th>
                    <th>Capacidade</th>
                    <th>Bandejas</th>
                    <th>Fax</th>
                    <th>Cores</th>
                    <th>Preto e Branco</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                            echo '<tr>';
                               echo '<td>'.$maqns['Duplex'].'</td>';
                               echo '<td>'.$maqns['Capacidade'].'</td>';
                               echo '<td>'.$maqns['Bandejas'].'</td>';
                               echo '<td>'.$maqns['Fax'].'</td>';
                               echo '<td>'.$maqns['Cores'].'</td>';
                               echo '<td>'.$maqns['Preto_Branco'].'</td>';
                            echo '</tr>';
                         $maquinas->close();
                    ?>
                </tbody>
            </table>
			<input href="javascript:void(0);" name="submit" style="width:800px;" type="submit" class="btn btn-primary" value="Eliminar" />
        </div>
    </div>
	</div>
	</div>
	</form>
</body>
</html>
