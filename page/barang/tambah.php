 <script>
 	function sum(){
 	var harga_beli=document.getElementById('harga_beli').value;
 	var harga_jual=document.getElementById('harga_jual').value;
 	var profit= parseInt(harga_jual)-parseInt(harga_beli);
 	if (!isNaN(profit)) {
 		document.getElementById('profit').value = profit;
 	}
 }
 </script>
 <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
        	<div class="header">
                <h2>Tambah Barang</h2>
			<div class="body">
	        	<form action="" method="POST">
	        		<label>Kode Barang</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="text" name="kode_barang" class="form-control" />
		                </div>
		            </div>
		            <label>Nama Barang</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="text" name="nama_barang" class="form-control" />
		                </div>
		            </div>
		            <label>Satuan</label>
		             <div class="form-group">
		                <div class="form-line">
	                        <select class="form-control show-tick" name="satuan">
	                            <option value="">-- Pilih Satuan --</option>
	                            <option value="Pack">PACK</option>
	                            <option value="Pcs">PCS</option>
	                            <option value="lusin">lusin</option>
	                        </select>
                    	</div>
                	</div>
                	<label>Harga Beli</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="number" name="harga_beli" id="harga_beli" onkeyup="sum()" class="form-control" />
		                </div>
		            </div>
		            <label>Stock</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="number" name="stock" class="form-control" />
		                </div>
		            </div>
		            <label>Harga Jual</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="number" name="harga_jual" id="harga_jual" onkeyup="sum()" class="form-control" />
		                </div>
		            </div>
		            <label>Profit</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="number" name="profit" id="profit" class="form-control" style="background-color: #e8e3e3" readonly value="0" />
		                </div>
		            </div>
		            <input type="submit" name="tambah" value="Tambah" class="btn btn-primary">
		            <input type="reset" class="btn btn-danger" value="Reset">
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

		$sql=mysqli_query($koneksi,"INSERT INTO tb_barang VALUES('$kode_barang','$nama_barang','$satuan','$harga_beli','$stock','$harga_jual','$profit')");
		if ($sql) {
			echo "<script>
				alert('Data Berhasil Disimpan');
				window.location.href='?page=barang'
				</script>
			";
		}else{
			echo "<script>
				alert('Data Gagal Disimpan');
				window.location.href='?page=barang&aksi=tambah'
				</script>
			";

		}
	}
 ?>