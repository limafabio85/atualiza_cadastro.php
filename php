
	<?php include_once("conexao/conexao.php");?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<h2>Atualiza os dados do formulário</h2>

<?php 
	
	$id_consulta=$_GET['id_update'];
	
	$consulta="select * from tb_projeto where id_cadastro='$id_consulta'";
	
	$executar=mysql_query($consulta,$con);
	
	$dados=mysql_fetch_array($executar);
?>

<form name="form1" method="post" action="">
  <table width="600" border="1" cellpadding="5">
    <tr>
      <td>Nome:</td>
      <td><label for="nome2"></label>
        <input type="text" name="nome" id="nome2" value="<?php echo $dados['nome'];?>" required></td>
    </tr>
    <tr>
      <td>E-mail:</td>
      <td><label for="email"></label>
        <input type="email" name="email" id="email" value="<?php echo $dados['email'];?>" required></td>
    </tr>
    <tr>
      <td>Telefone:</td>
      <td><label for="telefone"></label>
        <input type="tel" name="telefone" id="telefone" value="<?php echo $dados['telefone'];?>" required></td>
    </tr>
    <tr>
      <td colspan="2">Mensagem:</td>
    </tr>
    <tr>
      <td colspan="2"><label for="mensagem"></label>
        <textarea name="mensagem" cols="60" rows="5" id="mensagem" value="" required><?php echo $dados['mensagem'];?></textarea></td>
    </tr>
    <tr>
      <td><input type="submit" name="atualizar" id="atualizar" value="Atualizar"></td>
      <td><input type="reset" name="cancelar" id="button" value="Cancelar">
      
      <input type="hidden" name="data_cadastro" id="data_cadastro" value="<?php echo date('d/n/Y');?>">
      
       <input type="hidden" name="id_cadastro" id="id_cadastro" value="<?php echo $dados['id_cadastro'];?>">
      </td>
    </tr>
  </table>
</form>
<p><?php 
	
	if(isset($_POST['atualizar'])){
		
		$id_atualizar=$_POST['id_cadastro'];
		$nome=$_POST['nome'];
		$email=$_POST['email'];
		$telefone=$_POST['telefone'];
		$mensagem=$_POST['mensagem'];
		$data=$_POST['data_cadastro'];
		
		$sql_update="update tb_projeto set nome='$nome', email='$email', telefone='$telefone', mensagem='$mensagem', data_cadastro='$data' where id_cadastro='$id_atualizar'";
		
		$executar_update=mysql_query($sql_update,$con);
		
		echo "Dados atualizados";
		echo "<script>window.location='atualiza_contato.php?id_update=$id_atualizar';</script>";
		
		}

?></p>
</body>
</html>
