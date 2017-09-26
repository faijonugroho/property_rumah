<?php 
/**
* 
*/
class Database
{	
	private $config = array(
				"servername"	=>	"sql300.epizy.com",
				"username"		=>	"epiz_20750481",
				"password"		=>	"aOTh5xrjkz",
				"dbname"		=>	"epiz_20750481_property",
			);
	private $db;

	function mySqli()
	{
		$this->db = new mysqli($this->config["servername"], $this->config["username"], $this->config["password"], $this->config["dbname"]);

		if ($this->db->connect_errno) {
			$pesan = "<span style='color:red;'>Gagal Koneksi Database = </span>";
			die($pesan.$this->db->connect_error);
			// echo $pesan." : ".$this->db->connect_error;
		}/* else {
			die("berhasil Koneksi.");
		}*/
		return $this->db;
	}
}


?>