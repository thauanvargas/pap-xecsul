<?php

include('connect.php');


if(isset($_POST['Nome'])){
$Nome=$_POST['Nome'];
$Apelido=$_POST['Apelido'];
$Email=$_POST['Email'];
$Pass=$_POST['Pass'];
$Pais=$_POST['Country'];
$order = "INSERT INTO user

        (Nome,Apelido,Email,Pass,Country)

        VALUES

        ('$Nome',
		 '$Apelido',
		 '$Email',
		 '$Pass',
		 '$Pais')
		";

	
$result = mysqli_query($con,$order) or die("<script>alert('".mysqli_error($con)."'); location.href = '../registar.php'</script>");
if($result){

    echo("<script>alert('Registado com Sucesso!')</script>");
	$url = '../index.php';
    echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

} else{

    echo("<script>alert('Tenta novamente...')</script>");
	$url = '../registar.php';
    echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}


}
?>