 <script>
 	function sum(){
 	var harga_beli=document.getElementById('harga_beli').value;
 	var harga_jual=document.getElementById('harga_jual').value;
 	var profit= parseInt(harga_jual)-parseInt(harga_beli);
 	if (!isNaN(profit)) {
 		document.getElementById('profit').value = profit;
 	}
 }

 <?php 
 	$id=$_GET['id'];
 	$sql=mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE kode_barang='$id'");
 	$data=mysqli_fetch_array($sql);
  ?>
 </script>
 <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
        	<div class="header">
                <h2>Ubah Barang</h2>
			<div class="body">
	        	<form action="" method="POST">
	        		<label>Kode Barang</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="text" name="kode_barang" value="<?php echo $data['kode_barang'] ?>" class="form-control" />
		                </div>
		            </div>
		            <label>Nama Barang</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="text" name="nama_barang" value="<?php echo $data['nama_barang'] ?>" class="form-control" />
		                </div>
		            </div>
		            <label>Satuan</label>
		             <div class="form-group">
		                <div class="form-line">
	                        <select class="form-control show-tick" name="satuan">
	                            <option value="">-- Pilih Satuan --</option>
	                            <option value="Pack" <?php if ($data["satuan"]=="Pack") { echo "SELECTED";} ?>>PACK</option>
	                            <option value="Pcs" <?php if ($data["satuan"]=="Pcs") { echo "SELECTED";} ?>>PCS</option>
	                            <option value="lusin" <?php if ($data["satuan"]=="lusin") { echo "SELECTED";} ?>>lusin</option>
	                        </select>
                    	</div>
                	</div>
                	<label>Harga Beli</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="number" name="harga_beli" id="harga_beli" value="<?php echo $data['harga_beli'] ?>" onkeyup="sum()" class="form-control" />
		                </div>
		            </div>
		            <label>Stock</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="number" name="stock" value="<?php echo $data['stock'] ?>" class="form-control" />
		                </div>
		            </div>
		            <label>Harga Jual</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="number" name="harga_jual" id="harga_jual" value="<?php echo $data['harga_jual'] ?>" onkeyup="sum()" class="form-control" />
		                </div>
		            </div>
		            <label>Profit</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="number" name="profit" id="profit" value="<?php echo $data['profit'] ?>" class="form-control" style="background-color: #e8e3e3" readonly />
		                </div>
		            </div>
		            <input type="submit" name="tambah" value="tambah" class="btn btn-primary">
	            </form>
			</div>
		</div>
	</div>
</div>
</div>
<?php 
	if (isset($_POST['tambah'])) {
		$kode_barang=$_POST['kode_barang'];
		$nama_barang=$_POST['nama_barang'];
		$satuan=$_POST['satuan'];
		$harga_beli=$_POST['harga_beli'];
		$stock=$_POST['stock'];
		$harga_jual=$_POST['harga_jual'];
		$profit=$_POST['profit'];

		$sql=mysqli_query($koneksi, "UPDATE tb_barang SET kode_barang='$kode_barang',nama_barang='$nama_barang',satuan='$satuan',harga_beli='$harga_beli',stock='$stock', harga_jual='$harga_jual', profit='$profit' WHERE kode_barang='$id' ");
		if ($sql) {
			echo "<script>
				alert('Data Berhasil Diubah');
				window.location.href='?page=barang'
				</script>
			";
		}else{
			echo "<script>
				alert('Data Gagal Diubah');
				window.location.href='?page=barang&aksi=ubah&id=$id'
				</script>
			";

		}
	}
 ?>