<!DOCTYPE html>
 <?php 
 session_start();
Include('connect.php');
if (isset($_REQUEST['submit']))
{
	$email = mysqli_real_escape_string($con,$_REQUEST['email'] );
	$password = mysqli_real_escape_string($con,$_REQUEST['password'] );
	if($email == "" || $password == "")
	{
	
	echo "<script>alert( 'Os campos tem de estar prenchidos');</script>";
	
	}
	else
	{
	    $sql= "SELECT * FROM user where Email = '".$email."' and  Pass ='".$password."'";
		$result= mysqli_query($con,$sql) or die("Sql Error".mysql_error());
	    $num_rows= mysqli_num_rows($result);
	   if($num_rows>0)
	   {	
		   while($dados = mysqli_fetch_array($result)){
		  if($dados['Cargo'] == 'Cliente'){
		$_SESSION['logged'] = true;
		$_SESSION['nome'] = $dados['Nome'];
		$_SESSION['adm'] = 0;
		$url = '../index.php';
		echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
		   }else if ($dados['Cargo'] == 'Admin'){	
		$_SESSION['logged'] = true;
		$_SESSION['nome'] = $dados['Nome'];
		$_SESSION['adm'] = 1;
		$url = '../backoffice';
		echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';   	
		   }
	   }
        }
	    else
		{
			echo "<script>alert('email ou password incorreto')</script>";
            $url = '../index.php';
		echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';  
            
		}
	}
}	
?>


