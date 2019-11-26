<?php
session_start();
include('php/connect.php');
?><!DOCTYPE html>
<html>
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
    <!-- navbar-->
<header class="header">
      <div role="navigation" class="navbar navbar-fixed-top navbar-default">
        <div class="container">
		<a class="" href="index.php"><img style="margin: 0px 15px 15px 0px;position:absolute;left:10px;top:5px;width:9%;" src="img/xecsulpic.jpg"/></a>
		
            <div class="navbar-buttons">
              <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle navbar-btn">Menu<i class="fa fa-align-justify"></i></button>
            </div>
          </div>
          <div id="navigation" class="collapse navbar-collapse navbar-right">
		  <form method="get">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Página Inicial</a></li>
              <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle">Produtos<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="impressoras.php">Impressoras</a></li>
                  <li><a href="multifuncionais.php">Multifuncionais</a></li>
                </ul>
              </li>
			  <li><a href="campanha.php">Campanha</a></li>
			  <li><a href="assistencia.php">Assistência</a></li>
              <li><a  href="#Contactos.">Contactos</a></li>
				<li>
				<a id="cart_button" href="carrinho.php" class="compras-link"><img style="display:block !important;margin-right:auto !important;margin-left:auto !important;width:50%;"src="img/cart.png">
					<span class="carrinho" id="cart-container">
					<?php 
          if(isset($_SESSION["products"])){
            echo "<span style='position:relative;float:right;'>(".count($_SESSION["products"]).")</span>"; 
          } else {
            echo "<span style='position:relative;float:right;'>(0)</span>"; 
          }
					?>
			</span>
		</a></li>
			  <?php
			  if(isset($_SESSION['logged'])){
				  $nome = $_SESSION['nome'];
				  echo '<a style="position: static;" data-toggle="modal" data-target="#login-modal" class="btn navbar-btn btn-ghost"><i class="fa fa-sign-in"></i>Olá '.$nome.'</a>';
			  }else{
				  echo '<a data-toggle="modal" data-target="#login-modal" class="btn navbar-btn btn-ghost"><i class="fa fa-sign-in"></i>Iniciar Sessão</a>';  
			  }
			  ?>
				</ul>
			  </form>
		  </div>
        </div>
    </header>
    <!-- *** LOGIN MODAL ***_________________________________________________________
    -->
	<?php
	if(isset($_SESSION['logged'])){
    echo '<div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
      <div class="modal-dialog modal-sm">
        <div class="modal-content"><div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
            <h4 id="Login" class="modal-title">Opções</h4>
          </div>
          <div class="modal-body">
              <p class="text-center">
			  <form action="index.php" method="post">
                <input action="index.php" type="submit" class="btn btn-primary" value="Terminar Sessão" name="logout"/><br /><br />
			  </form>
              </p>
          </div>
        </div>
      </div>
    </div>';
	}else{
    echo '<div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
      <div class="modal-dialog modal-sm">
        <div class="modal-content"><div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
            <h4 id="Login" class="modal-title">Inicie Sessão</h4>
          </div>
          <div class="modal-body">
            <form action="php/login.php" method="post">
              <div class="form-group">
                <input name="email" id="email_modal" type="text" placeholder="email" class="form-control" required>
              </div>
              <div class="form-group">
                <input name="password" id="password_modal" type="password" placeholder="palavra-passe" class="form-control" required>
              </div>
              <p class="text-center">
                <input action="index.html" type="submit" class="btn btn-primary" value="Entrar" name="submit"/>
				
              </p>
            </form>
            <p class="text-center text-muted">Ainda não se registou ?</p>
            <p class="text-center text-muted"><a href="registar.php"><strong>Registe-se já </strong></a>! É fácil, rápido e poderá usufruir do nosso suporte sempre que necessitar.</p>
          </div>
        </div>
      </div>
    </div>';
	}
	?>
    <!-- *** LOGIN MODAL END ***-->
    <style>


/* Center website */
.main {
    max-width: 1000px;
    margin: auto;
}

.row {
    margin: 10px -16px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
    padding: 8px;
}

/* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 33.33%;
    display: none; /* Hide all elements by default */
}

/* Clear floats after rows */ 
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Content */
.content {
    background-color: white;
    padding: 10px;
}

/* The "show" class is added to the filtered elements */
.show {
  display: block;
}

/* Style the buttons */
.btn-pesqs {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: white;
  cursor: pointer;
}

.btn-pesqs:hover {
  background-color: #ddd;
}

.btn-pesqs.active {
  background-color: #666;
  color: white;
}

.plussign{
	display: block;
	vertical-align:middle;
}

.carousel-inner > .item {
  height: 40vh;
}

.carousel-inner > .item > img {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  max-height: 300px;
  width: auto;
  margin: auto;
}
</style>
<body>
<br/>

<section class="background-gray-lightest">
	<div class="container" >
	<div class="text-center">					
	<h2>O Meu Carrinho</h2>
			<?php		
			if(isset($_SESSION["products"]) && count($_SESSION["products"])>0) { 
			?>
				<table class="table" id="cart-results" class="cart-results">
				<thead>
				<tr>
				<th style="text-align:center;">Nº Série</th>
				<th style="text-align:center;">Modelo</th>
				<th style="text-align:center;">Quantidade</th>
				<th style="text-align:center;">Preço</th>
				<th style="text-align:center;">Subtotal</th>
				<th>&nbsp;</th>
				</tr>
				</thead>
				<tbody>
			<?php
				$total = 0;
				foreach($_SESSION["products"] as $product){					
					$product_nserie = $product["product_n_serie"]; 
					$product_model = $product["product_model"];
					$product_price = $product["product_price"];
					$product_qty = $product["product_qty"];					
					$subtotal = ($product_price * $product_qty);
					$total = ($total + $subtotal);
				?>
				<tr>
				<td style="width:5%;" ><input  data-maquina="<?php echo $product_nserie ?>"  data-loja="nao" data-toggle="modal" data-target="#item-modal" type="button" style="display:block;margin-right: auto;margin-left: auto;margin:0 auto;font-size:15px;border: none;" class="btn navbar-btn btn-ghost" value='<?php echo $product_nserie ?>' /></td>
				<td style="vertical-align:middle;"><?php echo $product_model; ?></td>
				<td><input type="number" data-code="<?php echo $product_nserie; ?>" class="btn btn-primary Quantidade" value="<?php echo $product_qty; ?>"></td>
				<td style="vertical-align:middle;"><?php echo sprintf("%01.2f", ($product_price * $product_qty)); ?> €</td>
				<td style="vertical-align:middle;"><?php echo ($product_price * $product_qty). " €"; ?></td>
				<td style="vertical-align:middle;">				
				<a href="javascript:void(0);" style="padding: 2px 1px 1px 2px;" class="btn btn-default remover-item" data-code="<?php echo $product_nserie; ?>"><i class="fa fa-trash "></i></a>
				</td>
				</tr>
			 <?php } ?>
			<tfoot>
			<br>
			<tr>
				<td style="border:none;"></td>
			</tr>
			<tr>
			<td><input  href="javascript:void(0)" onclick="window.history.back();" type="button" style="display:block;margin-right: auto;margin-left: auto;margin:0 auto;padding: 1px 8px;font-size:15px;" class="btn navbar-btn btn-ghost" value='Voltar' /></td>
			<td><a href="javascript:void(0);" style="padding: 2px 1px 1px 2px;" class="btn btn-default limpar-carrinho" data-limpar="sim">Limpar Carrinho</a></td>
			<td colspan="2"></td>
			<?php 
			if(isset($total)) {
			?>	
			<td class="text-center cart-products-total"><strong>Total <?php echo sprintf("%01.2f",$total); ?> €</strong></td>
			<td><a href="payment.php" class="wow fadeInUp smoothScroll btn btn-default">Checkout</a></td>
			<?php } ?>
			</tr>
			</tfoot>			
			<?php		
			} else {
				echo "Carrinho vazio.";
			?>
			<tfoot>
			<br>
			<br>
			<tr>
			</tr>
			</tfoot>
			<?php } ?>				
			</tbody>
			</table>


	</div>
</div>
<br />
<br />
<br />
<div class="carousel slide" id="myCarousel">

            <div  class="carousel-inner">
                <?php
				include('php/connect.php');

				$query = "SELECT * FROM produtos WHERE Tipo LIKE '%multifuncoes%'";
				$result = mysqli_query($con, $query);
                $i = 1;
                $next_item = true;
                while ($row = mysqli_fetch_assoc($result)) {
                if ($i == 1) {
                    echo '<div class="item active">';
                } elseif ($next_item == true) {
                    echo '<div class="item">';
                }

                ?>
				
                <div class="col-sm-3 col-xs-10">
							<br><br><br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							<a href="#" rel="tooltip" data-placement="top" data-toggle="tooltip" data-title="">
								<img  style="margin-left:20%;" width="180" height="200" src="img/<?php echo $row['Modelo'] ?>.jpg" class="d-block mx-auto img-fluid" />
							</a>
                            <h4 style="text-align: center"><?php echo $row['Modelo'] ?></h4>
                            <p style="text-align: center"><?php echo $row['Gramagem_Max'] ?></p>
							&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
							<input data-maquina="<?php echo $row['N_serie']?>" data-loja="sim" data-toggle="modal" data-target="#item-modal" type="button" style="display:block;margin-right: auto;margin-left: auto;margin:0 auto;padding: 1px 8px;font-size:15px;" class="btn navbar-btn btn-ghost" name="adviser" id="adviser" value='+'>
				</div>


            <?php
            $next_item = false;

            if ($i % 4 == 0) {
                echo '</div>';
                $next_item = true;
            }

            $i++;
            }
            ?>
			</div>

	  <a style="width:5%;" class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Anterior</span>
	  </a>
		
		  <a style="width:5%;" class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Seguinte</span>
		  </a>
        </div>
</div>
</div>
</section>

<div id="item-modal" tabindex="-1" role="dialog" aria-labelledby="Item" aria-hidden="true" class="modal fade">
  <div style="width:1000px;"class="modal-dialog modal-sm">
	<div class="modal-content">
    <div class="modal-header">
		<button type="button" data-dismiss="modal" class="close">×</button>
		<h4 id="Item" class="modal-title">Maquina Selecionada:</h4>
	  </div>
    <form name="product-form" id="product-form">
	<div class="dash">

	</div>
  </form>
	</div>
  </div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/carrinho.js"></script>
<script>
	$(document).ready(function(){
		$('#item-modal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget)
        var recipient = button.data('maquina')
			  var recipient2 = button.data('loja')
			  var modal = $(this);
			  var dataString = 'N_Serie=' + recipient + '&Loja=' + recipient2;
				$.ajax({
					type: "GET",
					url: "infomaquina.php",
					data: dataString,
					cache: false,
					success: function (data) {
						console.log(data);
						modal.find('.dash').html(data);
					},
					error: function(err) {
						console.log(err);
					}
				});
		});
	});
</script>

</body>
</html>