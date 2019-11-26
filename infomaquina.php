<?php
session_start();
include('php/connect.php');
    $N_Serie = $_REQUEST['N_Serie'];
    $Loja = $_REQUEST['Loja'];

    if (isset($_POST['comprar'])) {
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
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Xecsul: Loja Online</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Font Awesome and Pixeden Icon Stroke icon fonts-->
	<link href="http://netdna.bootstrapcdn.com//bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
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
    <link rel="shortcut icon" href="img/favicon/favicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
<body>

<form class="product-form" id="product-form">
	<div style="width:800px;" class="modal-body">
		<div class="container">
    <div class="row">
        <div id="member" class="col-lg-12">
			<input name="N_serie" type="hidden" value="<?php echo $maqns["N_serie"]; ?>">
			<img style="width:300px;height:300px;"  src="img/<?php echo $maqns['Modelo'] ?>.jpg">
            <table style="width:800px;max-width:800px;" class="table table-striped table-bordered">
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
                    <th>Preço</th>
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
							if($maqns['Preco'] != 0){
                               echo '<td>'.$maqns['Preco'].' €</td>';
							}else{
								echo '<td>Negociável</td>';
							}
                            echo '</tr>';
                         $maquinas->close();
                    ?>
                </tbody>
            </table><br />
            <?php if($Loja == "sim"){ ?>
			<button style="width:50%px;" type="submit" class="btn btn-primary" >Adicionar ao Carrinho</button>
			<input name="product_qty" style="width:50%px;" type="number" value="1" class="btn btn-primary" />
            <?php } ?>
        </div>
    </div>
	</div>
	</div>
</form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/carrinho.js"></script>

</body>
</html>
