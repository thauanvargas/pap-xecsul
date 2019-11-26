<!DOCTYPE html>
<?php
session_start();
if(isset($_POST['logout'])){
	session_destroy();
	header('Location: index.php');
}
?>
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
<h3 align="center">Multifuncionais</h3>
<div class="container" >


<!--<div id="myBtnContainer">
  <button class="btn-pesqs active" onclick="filterSelection('all')"> Mostrar Tudo</button>
  <button class="btn-pesqs" onclick="filterSelection('A4p')"> A4 Preto</button>
  <button class="btn-pesqs" onclick="filterSelection('A4c')"> A4 Cores</button>
  <button class="btn-pesqs" onclick="filterSelection('A3p')"> A3 Preto</button>
  <button class="btn-pesqs" onclick="filterSelection('A3c')"> A3 Cores</button>
</div>-->



<!-- Portfolio Gallery Grid -->
<div class="carousel slide" id="myCarousel">

            <div class="carousel-inner">
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
								<img  width="180" height="200" src="img/<?php echo $row['Modelo'] ?>.jpg" class="d-block mx-auto img-fluid" />
							</a>
                            <h4 style="text-align: center"><?php echo $row['Modelo'] ?></h4>
                            <p style="text-align: center"><?php echo $row['Gramagem_Max'] ?></p>
							&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
							<input  data-maquina="<?php echo $row['N_serie']?>"  data-loja="sim" data-toggle="modal" data-target="#item-modal" type="button" style="display:block;margin-right: auto;margin-left: auto;margin:0 auto;padding: 1px 8px;font-size:15px;" class="btn navbar-btn btn-ghost" name="adviser" id="adviser" value='+'>
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
<!-- END GRID
</div>-->

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


<!-- END MAIN 
</div>-->
</section>


    <footer class="footer">
      <div class="footer__block">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-12">
              <h4 class="heading">Sobre a Xecsul</h4>
              <p>A XECSUL Lda é desde 2001 o Concessionário Xerox para os conselhos de Almada, Seixal, Barreiro e Moita.
			  <p>Sediada em Almada, a XECSUL tem como MISSÃO acrescentar valor às atividades dos seus clientes, através do incremento da sua atividade comercial e da implementação de soluções que melhorem os processos de negócio.</p>
			  <p>Para cumprir a sua missão e alcançar a sua visão, a XECSUL definiu um conjunto de princípios que orientam a sua atuação e posicionamento no mercado.</p>
            </div>
            <div class="col-md-4 col-sm-12">
              <h4 class="heading">Morada</h4>
              <p> Rua José Justino Lopes Nr.12-C, Ramalha.<br />2805-320 Almada<br /></p>
			</div>
			<div class="col-md-4 col-sm-12">
              <h4 class="heading" id="Contactos.">Contactos</h4>
              <p> 21 272 0216<br />apoioclientes@xecsul.pt<br />comercial@xecsul.pt<br />consumiveis@xecsul.pt</p>
			</div>
			<div class="col-md-4 col-sm-12">
              <h4 class="heading" id="Contactos.">Links</h4>
              <p><a href="https://www.xerox.com/index/ptpt.html">Xerox</a><br /><a class="fa fa-facebook" href="https://www.facebook.com/XECSUL/"></a>
			</div>
          </div>
        </div>
      </div>
      <div class="footer__copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p><a>Copyright &copy; 2018 Xecsul</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"> </script>
    <script src="js/lightbox.min.js"></script>
    <script src="js/front.js"></script>
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
<script>
    $(document).ready(function(){
        $('#myCarousel').carousel({
            pause: true,
            interval: false
        });

    });
    $('#myCarousel').on('slid', '', function() {
        var $this = $(this);

        $this.find('.carousel-control').show();

        if($('.carousel-inner .item:first').hasClass('active')) {
            $this.find('.left.carousel-control').hide();
        } else if($('.carousel-inner .item:last').hasClass('active')) {
            $this.find('.right.carousel-control').hide();
        }

    });
</script>
  </body>
</html>