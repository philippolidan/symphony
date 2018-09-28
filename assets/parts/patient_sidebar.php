<?php
$url = $_SERVER['REQUEST_URI'];

?>
<!-- Sidebar  -->
<nav id="sidebar" class="active ">
	<div class="sidebar-header">
		<h3>ALPAX | Hospital and Medical Center</h3>
		<strong><img src="assets/img/icons/pharmacy.svg" style="height: 30px; width: 100%"></strong>
	</div>

	<ul class="list-unstyled components">
		<li class="active">
			<a href="patient_dashboard.php">
				<i class="fas fa-home"></i>
				Dashboard
			</a>
		</li>

		<!-- <li>
			<a href="#">
				<i class="fas fa-copy"></i>
				Medical Journal
			</a>
		</li> -->

	</ul>


	<ul class="list-unstyled">
		<li>
			<a href="#" class="text-danger-200">
				<i class="fas fa-cogs"></i>
				Settings
			</a>
		</li>

		<li>
			<a href="logout.php" class="text-danger-200">
				<i class="fas fa-sign-out-alt"></i>
				Log out
			</a>
		</li>
	</ul>
</nav>
