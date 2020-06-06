<title>Inicio | iCash</title>
<div class="header-cont header-inicio">
	<div class="header-color">
		<div class="menu-top">
			<div class="header-logo">
				<img src="./public/img/system/iCash-logo-h.png" alt="">
			</div>
			<ul class="menu-prin">				
				<li><a href="inicio" title="">Inicio</a></li>
				<li>
				<?php if ($_SESSION['Sesion'] == true) {
					echo "<a class='btn-sesion' href='kardex' title=''>Administrar</a>";
				}else{
					echo "<a class='btn-sesion' href='login' title=''>Iniciar Sesión</a>";
				} ?>
				</li>
			</ul>
		</div>
		<div class="bar-title">
			<div class="cont-left">
				<h1 class="tit-uno">Sistema contable<br>para pequeñas y medianas Empresas</h1>
				<p>¡La mejor manera de llevar tus cuentas empresariales!</p>
			</div>
			<div class="cont-left">
				<img class="img-banner" src="./public/img/system/iCash-banner.png" alt="">
			</div>			
		</div>
	</div>
</div>
<div class="width-100-pto cont-flex cont-just-saro cont-app">
		<h1>Caracteristicas básicas</h1>
		<div class="width-100-pto cont-flex cont-just-saro">
			<div class="width-70-pto">
				<ul class="cont-cara-items">
					<li class="cara-item">
						<div class="cara-item-ico">
							<i class="fas fa-shield-alt"></i>
						</div>
						<div class="cara-item-tit">
							<h3>Seguridad</h3>
						</div>
					</li>
					<li class="cara-item">
						<div class="cara-item-ico">
							<i class="fas fa-file-invoice-dollar"></i>
						</div>
						<div class="cara-item-tit">
							<h3>Digital</h3>
						</div>
					</li>
					<li class="cara-item">
						<div class="cara-item-ico">
							<i class="fas fa-mail-bulk"></i>
						</div>
						<div class="cara-item-tit">
							<h3>Correo Electronico</h3>
						</div>
					</li>
					<li class="cara-item">
						<div class="cara-item-ico">
							<i class="fas fa-history"></i>
						</div>
						<div class="cara-item-tit">
							<h3>Historial</h3>
						</div>
					</li>
					<li class="cara-item">
						<div class="cara-item-ico">
							<i class="fas fa-chart-line"></i>
						</div>
						<div class="cara-item-tit">
							<h3>Estadisticas</h3>
						</div>
					</li>
					<li class="cara-item">
						<div class="cara-item-ico">
							<i class="fas fa-users"></i>
						</div>
						<div class="cara-item-tit">
							<h3>Multiusuario</h3>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
<div class="vs-cont-quien">
	<div class="vs-quien">
		<div class="vs-left">
			<h2>iCash</h2>
			<p>Es un sistema web que se adapta a cualquier tipo de empresa, en el cual se lleve a cabo un control de inventario, manejando el método promedio ponderado. La aplicación web contara con la información necesaria para llevar acabo un control adecuado en suministros, con los movimientos de compra, venta y posibles devoluciones de las anteriores.</p>
		</div>
		<div class="vs-right">
			<img src="public/img/system/icash-logo-h.png" alt="">
		</div>
	</div>
</div>
