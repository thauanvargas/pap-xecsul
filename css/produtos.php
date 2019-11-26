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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Xecsul: Loja Online</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
    <!-- navbar-->
    <header class="header">
      <div role="navigation" class="navbar navbar-default">
        <div class="container">
	</br>
		
            <div class="navbar-buttons">
              <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle navbar-btn">Menu<i class="fa fa-align-justify"></i></button>
            </div>
          </div>
          <div id="navigation" class="collapse navbar-collapse navbar-right">
		 <li> <a  href="index.php"><img style="margin: 0px 15px 15px 0px;position:absolute;left:10px;top:10px;" src="img/xecsulpic.jpg"/></a></li>
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Página Inicial</a></li>
              <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle">Produtos<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="impressoras.html">Impressoras</a></li>
                  <li><a href="multifuncionais.html">Multifuncionais</a></li>
                </ul>
              </li>
			  <li><a href="campanha.html">Campanha</a></li>
			   <li><a href="assistencia.html">Assistência</a></li>
              <li><a  href="#Contactos.">Contactos</a></li>
			  <?php
			  if(isset($_SESSION['logged'])){
				  $nome = $_SESSION['nome'];
				  echo '</ul><a data-toggle="modal" data-target="#login-modal" class="btn navbar-btn btn-ghost"><i class="fa fa-sign-in"></i>Olá '.$nome.'</a>';
			  }else{
				  echo '</ul><a data-toggle="modal" data-target="#login-modal" class="btn navbar-btn btn-ghost"><i class="fa fa-sign-in"></i>Iniciar Sessão</a>';  
			  }
			  ?>
		  </div>
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
                <input action="index.php" type="submit" class="btn btn-primary" value="Minha Conta" name="account"/>	
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
    <div class="jumbotron main-jumbotron">
      <div class="container">
        <div class="content">
          <h1>XECSUL</h1>
          <p class="margin-bottom" style="font-size:30px;">Equipamentos usados e em ótimo estado com direito a demonstração!</p>
          <p><a href="https://xecsul.pt/" class="btn btn-white">xecsul.pt</a></p>
        </div>
      </div>
    </div>
    <section>
      <div class="container">
        <h2>Concessionário Xerox</h2>
        <p class="lead">A XECSUL pretende ser um parceiro Global de Soluções de negócio que reune um vasto leque de serviços desenhados à medida das necessidades do mercado e dos seus clientes. </p>
      </div>
    </section>
    <!-- Galeria-->
    <section id="portfolio" class="background-gray-lightest">
      <div class="container">
        <div class="row">
          <div class="col-md-14">
            <h1>Galeria</h1>
            <p class="lead">Aqui dispõe de algumas imagens de vários produtos. Para saber mais sobre eles, dirija-se ao menu produtos e veja o que mais se adequa às suas necessidades.</p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row no-space">
          <div class="col-sm-6 col-xs-6">
            <div class="box"><a href="text.html"><img src="img/portfolio-1.jpg" alt="" class="img-responsive"></a></div>
          </div>
          <div class="col-sm-6 col-xs-6">
            <div class="box"><a href=""><img src="img/portfolio-7.jpg" alt="" class="img-responsive"></a></div>
          </div>
          <div class="col-sm-6 col-xs-6">
            <div class="box"><a href=""><img src="img/portfolio-3.jpg" alt="" class="img-responsive"></a></div>
          </div>
          <div class="col-sm-6 col-xs-6">
            <div class="box"><a href=""><img src="img/portfolio-4.jpg" alt="" class="img-responsive"></a></div>
          </div>
          <div class="col-sm-6 col-xs-6">
            <div class="box"><a href=""><img src="img/portfolio-9.jpg" alt="" class="img-responsive"></a></div>
          </div>
          <div class="col-sm-6 col-xs-6">
            <div class="box"><a href=""><img src="img/portfolio-2.jpg" alt="" class="img-responsive"></a></div>
          </div>
        </div>
      </div>
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
	<script src="js/analytics.js"></script>
  </body>
</html>