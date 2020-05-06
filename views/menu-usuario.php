<input for="btn-bars" id="btn-bars" type="checkbox">
<label for="btn-bars"><i class="fa fa-bars"></i></label>
<div class="menu-left">
	<div>
		<div class="menu-cab">
			<div class="menu-cab-img">
				<img src="./public/img/system/iCash-logo-h.png" alt="">
			</div>
		</div>
		<div class="menu-usu">
			<div class="menu-usu-img">
				<div class="usu-img">
					<img src="<?php echo $_SESSION['usua_img']; ?>" alt="">
				</div>
				<span class="usu-rol"><?php echo substr($_SESSION['usua_nom'], 0, 1); ?></span>
			</div>
			<div class="menu-usu-text btn-bars-resp">
				<div>
				    Bienvenido<br/>
				    <span class="usu-nom"><?php echo $_SESSION['usua_nom']; ?></span>
			    </div>
			</div>
		</div>
		<ul class="menu">
			<li class="menu-item"><a href="inicio" ><div class="item-icon"><span class="fa fa-home"></span></div><div class="btn-bars-resp">Inicio</div></a></li>			
			<li class="menu-item <?php echo ($_GET['r']=='kardex')?'item-select':'';?>"><a href="kardex" ><div class="item-icon"><span class="fa fa-money-check-alt"></span></div><div class="btn-bars-resp">Kardex</div></a></li>
			<li class="menu-item <?php echo ($_GET['r']=='registro')?'item-select':'';?>"><a href="registro" ><div class="item-icon"><span class="fa fa-sort"></span></div><div class="btn-bars-resp">Registro</div></a></li>
			<li class="menu-item <?php echo ($_GET['r']=='productos')?'item-select':'';?>"><a href="productos" ><div class="item-icon"><span class="fa fa-shopping-bag"></span></div><div class="btn-bars-resp">Productos</div></a></li>
			<li class="menu-item <?php echo ($_GET['r']=='clientes-proveedores')?'item-select':'';?>"><a href="clientes-proveedores" ><div class="item-icon"><span class="fa fa-user-tie"></span></div><div class="btn-bars-resp">Persona</div></a></li>	
			<?php if ($_SESSION['usua_rol'] == "Super administrador" OR $_SESSION['usua_rol'] == "Administrador") {?>
				<li class="menu-item <?php echo ($_GET['r']=='usuarios')?'item-select':'';?>"><a href="usuarios" ><div class="item-icon"><span class="fa fa-users"></span></div><div class="btn-bars-resp">Usuario</div></a></li>
			<?php } ?>
		</div>
	<div class="copyright">
		<div class="copyright-img">
		  <img src="./public/img/system/iCash-logo-ico.png">
		</div>
		<div class="btn-bars-resp">
			 <a href="/icash.com" title="">iCash © <?php echo date("Y"); ?></a> <!--| <a href="https://develtec.net">Develtec</a>-->
		</div>
	</div>
</div>
