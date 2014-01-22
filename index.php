<?
include("global.php");

if($_SESSION["usuario"]["logado"] != 1)
{
	header('Location: login.php');
	exit;	
	
}
?>
<!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />		
		<meta http-equiv="Pragma" content="no-cache" />
		<meta name="Description" content="description" />
		<meta name="Keywords" content="keywords" />
		<link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
	</head>
	<body>
		<div id="outer-wrapper">
			<div id="inner-wrapper">
				<div id="content-wrapper">

					<!-- Begin Content -->
					<div id="content">
						<!-- Body Content -->
						<div id="content-inner">
						<?
						include("inc_mensagem.php");
        				if(isset($_GET["area"]))
        				{
            				if(file_exists("ct_".$_GET["area"].".php"))
            				{
                				include("ct_".$_GET["area"].".php");
            				}
        					else
        					{
        						include("ct_inicial.php");
        					}
        				}
        				else
        				{
        					include("ct_inicial.php");
        				}
        				?>
						</div>						
					</div>
	
					<!-- Begin Left Column -->
					<div id="sidebar">
						<div id="logo"></div>

						<h4>Cadastros</h4>
						<ul class="side-nav">
							<li><a href="index.php?area=usuarios">Usuarios</a></li>
							<li><a href="index.php?area=alunos">Alunos</a></li>
							<li><a href="index.php?area=livros">Livros</a></li>
							<li><a href="index.php?area=autores">Autores</a></li>
						</ul>

						<h4>Consultas</h4>
						<ul class="side-nav">
                                                        <li><a href="index.php?area=consalunosxlivros">Alunos X Livros</a></li>
							<li><a href="index.php?area=conslivrosxalunos">Livros X Alunos</a></li>
						</ul>

						<h4>Operacoes</h4>
						<ul class="side-nav">
                                                        <li><a href="index.php?area=multa">Multa</a></li>
							<li><a href="index.php?area=locacao">Locacoes</a></li>
							<li><a href="index.php?area=devolucao">Devolucoes</a></li>
							<li><a href="sair.php">Sair</a></li>
						</ul>						
					</div>

				</div><!-- End Content-Wrapper -->

				<!-- Begin Footer -->
				<div id="footer">					
					<p class="copyright">LibCECB - 2009</p>
			  	</div>				
			</div>
		</div>
	</body>
</html>