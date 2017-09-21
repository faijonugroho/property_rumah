<!-- Breadcrumbs -->
<ol class="breadcrumb">
  	<li class="breadcrumb-item">
    	<a href="/property/admin/">Dashboard</a>
 	</li>
  	<li class="breadcrumb-item active">Rumah</li>
</ol>

<?php 
	$model = new Model_mysqli();
	$model->setTable("rumah");

	$orderBy = array(
			"nama"	=>	"ASC",
		);
	$search = array(
			"nama"		=>	isset($_GET["search"]) ? $_GET["search"] : '',
			"harga"		=>	isset($_GET["search"]) ? $_GET["search"] : '',
			"lokasi"	=>	isset($_GET["search"]) ? $_GET["search"] : '',
		);
	$page = isset($_GET["page"]) ? $_GET["page"] : 1;

	$result = $model->findDataPaging($page,10,false,false,$orderBy,$search);
	$total_pages = $model->getCountPaging(10,false,$search);	// for pagination

	/* for delete */
	if (isset($_GET["delete"])) {
		$idDelete = $_GET["delete"];
		$hapus = $model->delete($idDelete);
		if ($hapus) {
			echo "<script> document.location.href = '".$backRedirect."'; </script>";
		}
	}
?>

<div class="card border-info ">
  	<div class="card-header"><i class="fa fa-table"></i> Table Rumah</div>
  	<div class="card-body ">
  		<div class="row">
		  	<div class="col-md-4">
		  		<h4 class="card-title">
		  			<?php if($admin["role"] == "super_admin") : ?>
			    	<a href="?menu=rumah/add" class="btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i>	Tambah Data</a>
			    	<?php endif; ?>
			    </h4>
		  	</div>
		  	<div class="col-md-8">
		  		<form method="get" class="form-inline pull-right">
					<div class="form-group">
					    <div class="input-group">
					    	<input type="hidden" name="menu" value="rumah">
					    	<input type="hidden" name="page" value="1">
						    <input type="text" name="search" value="<?php echo isset($_GET["search"]) ? $_GET["search"] : ''; ?>" class="form-control" placeholder="Cari">
						    <button type="submit" class="btn btn-outline-info btn-sm"><i class="fa fa-search"></i> Cari</button>
					    </div>
					</div>
				</form>
		  	</div>
		</div>
	    <table id="tableRumah" class="table table-striped table-bordered table-sm table-responsive" style="width:100%">
			<thead class="">
				<tr>
    				<th>No</th>
    				<th>Photo</th>
					<th>Nama</th>
					<th>Type</th>
					<th>Harga</th>
					<th>Lokasi</th>
					<th>Blok</th>
					<th>Jumlah</th>
    				<?php if($admin["role"] == "super_admin") : ?>
    				<th>Action</th>
    				<?php endif; ?>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = ($page - 1) * 10;
					foreach($result as $item) : 
						$no++;
				?>
						<tr>
							<td><?php echo $no; ?></td>
							<td>
								<?php $img = $item["photo"] == "" ? "img/omah_omahan.png" : "upload/rumah/".$item["photo"]; ?>
								<img src="<?php echo $img; ?>" class="img-responsive img-thumbnail" style="width:50px; height:55px;">		
							</td>
							<td><?php echo $item["nama"]; ?></td>
							<td>type</td>
							<td><?php echo $item["harga"]; ?></td>
							<td><?php echo $item["lokasi"]; ?></td>
							<td><?php echo $item["blok_rumah"]; ?></td>
							<td><?php echo $item["jumlah_rumah"]; ?></td>

							<?php if($admin["role"] == "super_admin") : ?>
							<td style="width: 18%;">
								<a href="?menu=rumah/update/<?php echo $item["id"].$redirect; ?>" class="btn btn-outline-warning btn-sm"><i class="fa fa-edit"></i> Edit</a> &nbsp; &nbsp;
								<a href="?menu=rumah&delete=<?php echo $item["id"].$redirect; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini.?')"><i class="fa fa-trash-o"></i> Hapus</a>
							</td>
							<?php endif; ?>
						</tr>
				<?php 
					endforeach; 

					if($result == []) :
				?>
					<tr><td colspan="9" align="center" class="text-danger"><b><i>Data tidak di temukan..</i></b></td></tr>
				<?php 
					endif;
				?>
			</tbody>
		</table>
		<?php 
			/* For Pagination */
			Helper::pagination($result,$total_pages,"rumah",$page,"left");
		?>
  	</div>
</div>