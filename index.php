<?php 
	require 'connect.php';
?>
<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>To Do List</title>
	<!-- CSS bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- CSS  -->
	<link rel="stylesheet" href="css/main.css">

</head>
<body>
	<header>
		<div class="container-fluid">
			<div class="row">
				<div class="col">
				<!--------------- Nav bar  --------------------->
					<div class="menu">
						<nav class="navbar navbar-dark" style="background-color: #ce89c3;">
							<a class="navbar-brand">To Do List</a>
							<form class="form-inline">
								<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
								<button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Cerca</button>
							</form>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<div class="header-content">
			<!--------------- Cartela per inserire i dati --------------------->	
			<div class="header_item">
				<div class="information">
					<p><b>To do List</b> promuove una maggiore collaborazione e maggiore efficienza.</p>
					<p>Con le schede e gli elenchi,  gli utenti possono organizzare e dare priorità ai progetti
						 per un'esperienza di lavoro molto più comoda e piacevole!</p>
				</div>
				<form action="action.php" method="POST" autocomplet="off">
					<?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
						<input type="text" name="titolo" placeholder="Campo obbligatorio" />
						<button type="submit">Aggiunge alla lista</button>									
					<?php } else { ?>
						<input type="text" name="titolo" placeholder="Aggiunge alla lista un nuovo ToDo" />
						<button type="submit">Aggiunge alla lista</button>	
					<?php } ?>				
				</form>
			</div>

			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<!--------------- To Do section --------------------->	
						<?php $list = $conn->query("SELECT * FROM todos ORDER BY id DESC"); ?>			
						<div class="show-todo-section">
							<?php if($list->rowCount() <= 0){ ?>
								<div class="todo-item">
									<p class="empty">Non ci sono i temi nella lista</p>
								</div>
							<?php } while($reck = $list->fetch(PDO::FETCH_ASSOC)){ ?> 
								<div class="todo-item">
										<div class="remove-to-do" id="<?php echo $reck['id']; ?>">x</div>
									<?php if($reck['fatto']) { ?>
										<input type="checkbox" class="check-box" data-todo-id="<?php echo $reck['id']; ?>" checked/>
										<h2 class="checked"><?php echo $reck['titolo'] ?></h2>
									<?php }else{ ?>
										<input type="checkbox" class="check-box" data-todo-id="<?php echo $reck['id']; ?>"/>
										<h2><?php echo $reck['titolo']; ?></h2>
									<?php } ?>
										<p class="small">created: <?php echo $reck['tempo']; ?></p>
								</div>
							<?php } ?>
						</div>

					</div>
				</div>
			</div>	

		</div>		
	</header>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>