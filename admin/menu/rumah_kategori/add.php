<?php 
    if ($admin["role"] != "super_admin") {
        echo "<script> window.location.href = '?menu=rumah_kategori'; </script>";
    }
?>

<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="/property/admin/">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="?menu=rumah_kategori">Rumah Kategori</a>
    </li>
    <li class="breadcrumb-item active">Tambah Data</li>
</ol>


<?php 
    $model = new Model_mysqli();
    $model->setTable("rumah_kategori");

    if (isset($_POST["btnSimpan"])) {
        $type = $_POST["type"];
        $luas = $_POST["luas"];
        $description = $_POST["description"];
    
        $checkType = $model->getByWhere(array("type" => $type));
        if ($checkType) {
            $errorFormData = Helper::spanDanger("Opps, Type rumah <b>".$type."</b> Sudah Terdaftar..!");
            $errorFormData .=  "<br><br>";
        } else {
            $data = array(
                        "type"  =>  trim($type),
                        "luas"   =>  $luas,
                        "description"    =>  $description,
                    );

            if (!empty(trim($type)) && !empty(trim($luas)) && !empty(trim($description)) ) { 
                    $tambah = $model->insert($data);
                    if($tambah){
                        echo "<script> alert('Data berhasil di simpan'); </script>";
                        echo "<script> document.location.href = '?menu=rumah_kategori' </script>";
                    }            } else {
                $errorFormData = Helper::spanDanger("Type, luas, atau description tidak boleh kosong..!");
                $errorFormData .=  "<br><br>";
            }
        }
    }

?>

<div class="card border-success mb-3">
    <div class="card-header text-success"> Form <i class="fa fa-plus"></i> Tambah Data</div>
    <div class="card-body">
        <form action="" method="post">
            <div><?php echo isset($errorFormData) ? $errorFormData : ""; ?></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-2">
                                <label>Type</label>
                            </div>
                            <div class="col-md-10">
                                <i class="text-info">*contoh: 21, 21/60, 21/72, 36, 36/60, 36/72 dll.</i>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="type" value="<?php echo isset($type) ? $type : ""; ?>" placeholder="Type Rumah   *contoh: 21/60" required>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-2">
                                <label>Luas</label>
                            </div>
                            <div class="col-md-10">
                                <i class="text-info">*contoh: 6m x 3,5m = 21 m2, 6m x 10m = 60 m2 dll.</i>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="luas" value="<?php echo isset($luas) ? $luas : ""; ?>" placeholder="Luas Rumah   *contoh: 6m x 10m = 60 m2" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="5" placeholder="Penjelasan Ringkas Type Rumah"><?php echo isset($description) ? $description : ""; ?></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <button type="submit" name="btnSimpan" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan</button>
            &nbsp;&nbsp;&nbsp;
            <a href="?menu=rumah_kategori" class="btn btn-warning btn-lg"><i class="fa fa-ban"></i> Batal</a>
        </form>
    </div>
</div>