<?php
session_start();
include('../php/connect.php');
if(isset($_POST['logout'])){
	session_destroy();
	header('Location: ../index.php');
}

if(!isset($_SESSION['adm']) || ($_SESSION['adm'] != 1)){
	echo "<script>alert('Precisa estar logado como administrador.');location.href = '../'</script>";
	return;
}

if(!isset($_GET['add']) && !isset($_GET['numSerie'])){
	echo "<script>alert('Precisa escolher o que deseja adicionar.');history.back()</script>";
	return;
}else{
	$item = $_GET['add'];
}

if(isset($_GET['numSerie'])){

$numSerie=$_GET['numSerie'];
$modelo=$_GET['modelo'];
$velocidade=$_GET['velocidade'];
$vol_medimp=$_GET['vol_medimp'];
$qualidade=$_GET['qualidade'];
$formato_max=$_GET['formato_max'];
$gramagem_max=$_GET['gramagem_max'];
$capacidade=$_GET['capacidade'];
$bandejas=$_GET['bandejas'];
$duplex=$_GET['duplex'];
$fax=$_GET['fax'];
$cores=$_GET['cores'];
$peb=$_GET['peb'];
$tipo=$_GET['tipo'];
$preco=$_GET['preco'];

$order = "INSERT INTO produtos

        VALUES

        ('$tipo',
		 '$numSerie',
		 '$modelo',
		 '$velocidade',
		 '$vol_medimp',
		 '$qualidade',
		 '$formato_max',
		 '$gramagem_max',
		 '$duplex',
		 '$capacidade',
		 '$bandejas',
		 '$fax',
		 '$cores',
		 '$peb',
		 '$preco')
		";

		
	
$result = mysqli_query($con,$order) or die("<script>alert('Ja existe esse numero de serie na base de dados'); history.back()</script>");
if($result){

    echo("<script>alert('Maquina adicionada com Sucesso!')</script>");
	$url = '/add.php?add=Impressoras';
    #echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

} else{

    echo("<script>alert('Tenta novamente...')</script>");
	$url = '/add.php?add=Impressoras';
   # echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}
}


?>
<html>
  <head>
	<link rel="icon" href="../img/favicon/favicon.png">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Xecsul: Loja Online</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Font Awesome and Pixeden Icon Stroke icon fonts-->
	<link href="http://netdna.bootstrapcdn.com//bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/pe-icon-7-stroke.css">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- lightbox-->
    <link rel="stylesheet" href="../css/lightbox.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../css/custom.css">
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
		  <a  href="index.php"><img style="margin: 0px 15px 15px 0px;position:absolute;left:10px;top:10px;" src="../img/xecsulpicadmin.jpg"/></a>
		  <form method="get">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Página Inicial</a></li>
              <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle">Adicionar<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="add.php?add=Impressoras">Impressoras</a></li>
                  <li><a href="add.php?add=Multifuncionais">Multifuncionais</a></li>
                </ul>
              </li>
              <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle">Remover<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="remover.php?remove=Impressoras">Impressoras</a></li>
                  <li><a href="remover.php?remove=Multifuncionais">Multifuncionais</a></li>
                </ul>
              </li>
               <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle">Gerir<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="geririmp.php">Impressoras</a></li>
                  <li><a href="gerirmulti.php">Multifuncionais</a></li>
                  <li><a href="gerircliente.php">Clientes</a></li>
                </ul>
              </li>
			  <?php
			  if(isset($_SESSION['logged'])){
				  $nome = $_SESSION['nome'];
				  echo '</ul><a data-toggle="modal" data-target="#login-modal" class="btn navbar-btn btn-ghost"><i class="fa fa-sign-in"></i>Olá '.$nome.'</a>';
			  }else{
				  echo '</ul><a data-toggle="modal" data-target="#login-modal" class="btn navbar-btn btn-ghost"><i class="fa fa-sign-in"></i>Iniciar Sessão</a>';  
			  }
			  ?>
			  </form>
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
			  <form action="../index.php" method="post">
                <input action="../index.php" type="submit" class="btn btn-primary" value="Terminar Sessão" name="logout"/><br /><br />	
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
                <input action="../index.php" type="submit" class="btn btn-primary" value="Entrar" name="submit"/>
				
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
body {font-family: Arial, Helvetica, sans-serif;}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=password], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=email], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

.add-button {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

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


<!--<div id="myBtnContainer">
  <button class="btn-pesqs active" onclick="filterSelection('all')"> Mostrar Tudo</button>
  <button class="btn-pesqs" onclick="filterSelection('A4p')"> A4 Preto</button>
  <button class="btn-pesqs" onclick="filterSelection('A4c')"> A4 Cores</button>
  <button class="btn-pesqs" onclick="filterSelection('A3p')"> A3 Preto</button>
  <button class="btn-pesqs" onclick="filterSelection('A3c')"> A3 Cores</button>
</div>-->



<!-- Portfolio Gallery Grid -->
<div class="container">
<h1 style="text-align:center;">Adicionar <?php echo $item; ?></h1>
  <form id="add-form" method="get" enctype="multipart/form-data">
    <input type="hidden" name="add" value="<?php $item ?>">
    <label for="numSerie">Nº Série</label>
    <input id="numSerie" type="text" name="numSerie" placeholder="Número de Série.." required>

    <label for="modelo">Modelo</label>
    <input id="modelo" type="text" name="modelo" placeholder="Modelo.." required>

    <label for="velocidade">Velocidade</label>
    <input type="text" name="velocidade" placeholder="Velocidade.." required>
	
    <label for="vol_medimp">Volume médio Impressão</label>
    <input type="text" name="vol_medimp" placeholder="Volume médio Impressão.." required>
    <label for="qualidade">Qualidade</label>
    <input type="text" name="qualidade" placeholder="Qualidade.." required>
    <label for="formato_max">Formato Máximo</label>
    <input type="text" name="formato_max" placeholder="Formato Máximo.." required>
    <label for="gramagem_max">Gramagem Máxima</label>
    <input type="text" name="gramagem_max" placeholder="Gramagem Máxima.." required>
    <label for="capacidade">Capacidade</label>
    <input type="text" name="capacidade" placeholder="Capacidade.." required>
    <label for="bandejas">Bandejas</label>
    <input type="text" name="bandejas" placeholder="Formato Máximo.." required>
    <label for="duplex">Duplex</label>
    <select name="duplex">
	<option value="Sim">Sim</option>
	<option value="Não">Não</option>
	</select>
    <label for="fax">Fax</label>
    <select name="fax">
	<option value="Sim">Sim</option>
	<option value="Não">Não</option>
	</select>
	
    <label for="cores">Cores</label>
    <select name="cores">
	<option value="Sim">Sim</option>
	<option value="Não">Não</option>
	</select>
	
    <label for="peb">Preto e Branco</label>
    <select name="peb">
	<option value="Sim">Sim</option>
	<option value="Não">Não</option>
	</select>
    <label for="preco">Preço (0 para negociável)</label>
    <input type="text" name="preco" placeholder="Preço.." required>
	<input type="hidden" name="tipo" value="impressora	">
	</br>
	</br>
  </form>
	<input type="file" name="file" id="file">
   <br />
   <span id="uploaded_image"></span>
	<a class="add-button" href="javascript:{}" onclick="document.getElementById('add-form').submit();">Adicionar</a>
</div>
<!-- END GRID
</div>-->

<!-- END MAIN 
</div>-->
</section>
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.cookie.js"> </script>
    <script src="../js/lightbox.min.js"></script>
    <script src="../js/front.js"></script>
<script>
$(document).ready(function(){

document.getElementById("file").disabled = true;
$('#modelo').blur(function(){
    if($(this).val().length != 0){
        $('#file').removeAttr('disabled');
    }else{
		$("#file").attr('disabled','disabled');
	}
	
});
	
 $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Imagem inválida");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Imagem muito grande!");
  }
  else
  {
   form_data.append("nome", document.getElementById("modelo").value);
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Imagem a carregar...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image').html(data);
    }
   });
  }
 });
});
</script>
  </body>
</html>