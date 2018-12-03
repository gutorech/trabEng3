<!DOCTYPE HTML>
<html lang="en">
<head>
		<?php  include('server.php'); ?>
		<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM pessoa WHERE idPessoa=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$cpf = $n['cpf'];
			$nome = $n['nome'];
			$horario = $n['horario'];
		}
	}
?>
        <title>Capitólio</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css"/>

        <!-- Stylesheets -->
        <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
        <link href="plugin-frameworks/swiper.css" rel="stylesheet">
        <link href="fonts/ionicons.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="common/styles.css">
        <link href="common/styles.css" rel="stylesheet">

</head>
<body>

<header>
        <div class="container">

                <div class="right-area">
                        <h6><a class="plr-20 color-white btn-fill-primary" href="04_blog.php">Login</a></h6>
                </div><!-- right-area -->

                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

                <ul class="main-menu font-mountainsre" id="main-menu">
                        <li><a href="index.php">INICIO</a></li>
                        <li><a href="05_contact.php">MARCAR HORARIO</a></li>
                </ul>

                <div class="clearfix"></div>
        </div><!-- container -->
</header>


<section class="bg-6 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white pt-90">
                                <h5><b>Marque aqui o seu corte de cabelo:</b></h5>
                                <h3 class="mt-30 mb-15"></h3>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>


<section class="story-area left-text center-sm-text">
        <div class="container">
                <div class="heading">
                        <h2></h2>
                        <h5 class="mt-10 mb-30">Escolha o horário que preferir</h5>
                        <p class="mx-w-700x mlr-auto"></p>
                </div>

					<form method="post" action="server.php" >
					<input type="hidden" name="idPessoa" value="<?php echo $id; ?>">				
					
					
						<div class="input-group">
							<label> CPF</label>
							<input type="text" name="cpf" value="<?php echo $cpf; ?>">
						</div>
						<div class="input-group">
							<label>Nome</label>
							<input type="text" name="nome" value="<?php echo $nome; ?>">
						</div>
						<div class="input-group">
							<label>Horario</label>
							<input type="datetime-local" name="horario" value="<?php echo $horario; ?>">
						</div>
						<div class="input-group">
							<?php if ($update == true): ?>
							<button class="btn" type="submit" name="update" style="background: #556B2F;" >Editar horario</button>
						<?php else: ?>
							<button class="btn" type="submit" name="save" >Marcar horario</button>
						<?php endif ?>
						</div>
					</form>							

								
                        </div><!-- row -->
						
						
                </form>
        </div><!-- container -->
</section>
<?php $results = mysqli_query($db, "SELECT * FROM pessoa"); ?>

<table>
	<thead>
		<tr>
			<th>CPF</th>
			<th>Nome</th>
			<th>Horário</th>
			<th colspan="2">Ações</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['cpf']; ?></td>
			<td><?php echo $row['nome']; ?></td>
			<td><?php echo $row['horario']; ?></td>
			<td>
				<a href="05_contact.php?edit=<?php echo $row['idPessoa']; ?>" class="edit_btn" >Editar Horario</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['idPessoa']; ?>" class="del_btn">Deletar Horario</a>
			</td>
		</tr>
	<?php } ?>
</table>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<form>




<!-- SCIPTS -->
<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
<script src="plugin-frameworks/bootstrap.min.js"></script>
<script src="plugin-frameworks/swiper.js"></script>
<script src="common/scripts.js"></script>
<!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-oEyU88bRR6xcbV1gI_Cahc8ugKC_JPE&callback=initMap"></script>-->

</body>
</html>