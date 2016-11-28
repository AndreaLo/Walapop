	
<?php
	echo '<nav class="navbar navbar-default" role="navigation">';
			echo '<!-- Brand and toggle get grouped for better mobile display -->';
			echo '<div class="navbar-header">';
			echo '<div class="brand-wrapper">';
				echo '<!-- Hamburger -->';
				echo '<button type="button" class="navbar-toggle">';
					echo '<span class="sr-only">Toggle navigation</span>';
					echo '<span class="icon-bar"></span>';
					echo '<span class="icon-bar"></span>';
					echo '<span class="icon-bar"></span>';
				echo '</button>';
				echo '<!-- Brand -->';
					echo '<div class="brand-name-wrapper">';
						echo '<a class="navbar-brand" href="#">
							Brand';
						echo '</a>';
					echo '</div>';
				echo '<!-- Search -->';
				echo '<a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">';
				echo '<span class="glyphicon glyphicon-search"></span>';
				echo '</a>';
					echo '<!-- Search body -->';
					echo '<div id="search" class="panel-collapse collapse">';
						echo '<div class="panel-body">';
							echo '<form class="navbar-form" role="search">';
								echo '<div class="form-group">';
									echo '<input type="text" class="form-control" placeholder="Search">';
								echo '</div>';
								echo '<button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-ok"></span></button>';
							echo '</form>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

			
			echo '<!-- Main Menu -->';
			echo '<div class="side-menu-container">';
			echo '<ul class="nav navbar-nav">';

			echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span>UserName<br>2 productos</a></li>';
			echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-envelope"></span>Mensajes</a></li>';
			echo '<li><a href="#"><span class="glyphicon glyphicon-th-list"></span>Categorias</a></li>';

			echo '<!-- Dropdown-->';
			echo '<li class="panel panel-default" id="dropdown">';
			echo '<a data-toggle="collapse" href="#dropdown-lvl1">';
				echo '<span class="glyphicon glyphicon-user"></span> Sub Level <span class="caret"></span>';
			echo '</a>';
			echo '<!-- Dropdown level 1 -->';
			echo '<div id="dropdown-lvl1" class="panel-collapse collapse">';
				echo '<div class="panel-body">';
					echo '<ul class="nav navbar-nav">';
						echo '<li><a href="#">Link</a></li>';
						echo '<li><a href="#">Link</a></li>';
						echo '<li><a href="#">Link</a></li>';
						echo '<!-- Dropdown level 2 -->';
						echo '<li class="panel panel-default" id="dropdown">';
							echo '<a data-toggle="collapse" href="#dropdown-lvl2">';
								echo '<span class="glyphicon glyphicon-off"></span> Sub Level <span class="caret"></span>';
							echo '</a>';
							echo '<div id="dropdown-lvl2" class="panel-collapse collapse">';
								echo '<div class="panel-body">';
									echo '<ul class="nav navbar-nav">';
										echo '<li><a href="#">Link</a></li>';
										echo '<li><a href="#">Link</a></li>';
										echo '<li><a href="#">Link</a></li>';
									echo '</ul>';
								echo '</div>';
							echo '</div>';
						echo '</li>';
					echo '</ul>';
				echo '</div>';
			echo '</div>';
			echo '</li>';
			echo '<li><a href="#"><span class="glyphicon glyphicon-map-marker"></span>Nuevo en tu zona</a></li>';
			echo '<li><a href="#"><span class="fa fa-smile-o"></span> Invita a amigos</a></li>';
			echo '<li><a href="#"><span class="fa fa-question-circle"></span> Ajuda</a></li>';
			echo '</ul>';
			echo '</div><!-- /.navbar-collapse -->';
		echo '</nav>';

		?>