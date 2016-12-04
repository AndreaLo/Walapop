<div class="side-menu">
	<nav class="navbar navbar-default" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		<div class="brand-wrapper">
			<!-- Hamburger -->
			<button type="button" class="navbar-toggle">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!-- Brand -->
				<div class="brand-name-wrapper">
					<a class="navbar-brand" href="#">
						Wallapop
					</a>
				</div>
			<!-- Search -->
			<a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">
			<span class="glyphicon glyphicon-search"></span>
			</a>
				<!-- Search body -->
				<div id="search" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="navbar-form" role="search">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Search">
							</div>
							<button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-ok"></span></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Main Menu -->
		<div class="side-menu-container">
		<ul class="nav navbar-nav">
			<li>
				<?php
					if($_SESSION["email"]==null){
						echo "<a href='login.php'><span class='glyphicon glyphicon-user'></span>Login</a>";
					}
					else echo "<a href='usuario.php'><span class='glyphicon glyphicon-user'></span>Usuario<br>2 productos</a>";
				?>
					
			</li>
			<li class="active"><a href="#"><span class="glyphicon glyphicon-envelope"></span>Mensajes</a></li>
			<!--<li><a href="#"><span class="glyphicon glyphicon-th-list"></span>Categorias</a></li>-->
			<li class="panel panel-default" id="dropdown">
				<a data-toggle="collapse" href="#dropdown-lvl1">
					<span class="glyphicon glyphicon-th-list"></span> Categorias <span class="caret"></span>
				</a>
				<!-- Dropdown level 1 -->
				<div id="dropdown-lvl1" class="panel-collapse collapse">
					<div class="panel-body">
						<ul class="nav navbar-nav">
							<?php
								mostrarCategoria();
							?>	
						</ul>
					</div>
				</div>
			</li>
		
			<li><a href="#"><span class="glyphicon glyphicon-map-marker"></span>Nuevo en tu zona</a></li>
			<li><a href="#"><span class="fa fa-smile-o"></span> Invita a amigos</a></li>
			<li><a href="#"><span class="fa fa-question-circle"></span> Ajuda</a></li>
		</ul>
		</div><!-- /.navbar-collapse -->
	</nav>
</div>