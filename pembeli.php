<?php require_once 'header.php'; ?>
<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">
			<h1 id="fh5co-logo"><a href="index.php"><img src="images/llogo.png" alt="Property Media"></a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="agent.php">Agent</a></li>
					<li class="fh5co-active"><a href="pembeli.php">Pembeli</a></li>
					<li><a href="about.php">Tentang Kami</a></li>
					<li><a href="contact.php">Kontak</a></li>
				</ul>
			</nav>

			<div class="fh5co-footer">
				<p><small>Copyright &copy; PropertyMedia 2017 <?php echo date("Y") > 2017 ? " - ".date("Y") : ""; ?>.</small></p>
				<?php require_once 'sosial_media.php'; ?>
			</div>
		</aside>

		<div id="fh5co-main">
			<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
				<h2 class="fh5co-heading">Data Pembeli</h2>
				<div class="panel panel-primary">
					<div class="panel-heading">Tabel Pembeli</div>
					<div class="panel-body">
						<table class="table table-bordered table-condensed table-striped table-hover">
				      		<thead>
				      			<tr class="info">
				      				<th>No</th>
				      				<th>Nama</th>
				      				<th>Nama Rumah</th>
				      				<th>Blok Rumah</th>
				      				<th>No Rumah</th>
				      				<th>Alamat</th>
				      				<th>Agent</th>
				      			</tr>
				      		</thead>
				      		<tbody>
				      			<tr>
				      				<td>1</td>
				      				<td>Imelda sari nasution</td>
				      				<td>Teratai Permai Indah</td>
				      				<td>AA</td>
				      				<td>23</td>
				      				<td>Jl. Jamin Ginting no.122, Medan padan bulan</td>
				      				<td>Rizal</td>
				      			</tr>
				      			<tr>
				      				<td>2</td>
				      				<td>Imelda sari nasution</td>
				      				<td>Teratai Permai Indah</td>
				      				<td>AA</td>
				      				<td>23</td>
				      				<td>Jl. Jamin Ginting no.122, Medan padan bulan</td>
				      				<td>Rizal</td>
				      			</tr>
				      		</tbody>
				      	</table>
					</div>
				</div>
		      	
		    </div>
		</div>
	</div>
</body>
<?php require_once 'footer.php'; ?>
