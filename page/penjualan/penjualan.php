<?php 
	$kode=$_GET['kodepj'];
	$kasir=$data['nama'];
 ?>
<div class="row clearfix">
	<form action="" method="POST">
		 <div class="body">
        	<div class="col-sm-2">
            	<input type="text" name="kode" value="<?php echo $kode ?>" class="form-control" readonly />
        	</div>
        	<div class="col-sm-2">
            	<input type="text" name="kode_barang" placeholder="Input Kode Barang" autofocus class="form-control" />
        	</div>
			<div class="col-sm-2">
            	<input type="submit" name="tambah" value="Tambah" class="btn btn-primary" />
        	</div>
        </div>
    </form>
</div>

<?php 
	if (isset($_POST['tambah'])) {
		$kodepj=$_POST['kode'];
		$kode_barang=$_POST['kode_barang'];
		$tgl=date("m-d-Y");
		$sql=mysqli_query($koneksi,"SELECT * FROM tb_barang WHERE kode_barang='$kode_barang'");
		$data=mysqli_fetch_array($sql);
		$jumlah=1;
		$harga_jual=$data['harga_jual'];
		$total=$jumlah * $harga_jual;

		$sql2=mysqli_query($koneksi,"SELECT * FROM tb_barang WHERE kode_barang='$kode_barang'");
		while ($data2=mysqli_fetch_array($sql2)) {
			$stok=$data2['stock'];
			if ($stok==0) {
			?>
					<script>
						alert('Stok Barang Habis');
						window.location.href="?page=penjualan&kodepj=<?php echo $kode ?>"
					</script>
<?php 
			}else{
				$sql3=mysqli_query($koneksi,"INSERT INTO tb_penjualan VALUES('','$kodepj','$kode_barang','$jumlah','$total','$tgl','')");
			}
		}
	}
 ?>

<br><br><br><br>
  <!-- Basic Examples -->
<form method="POST" action="">
	<div class="col-md-2">
		<label>Pelanggan</label>
		<select name="pelanggan" class="form-control show-tick">
			<?php 
				$sql=mysqli_query($koneksi, "SELECT * FROM tb_pelanggan ORDER BY kode_pelanggan");
				while ($data=mysqli_fetch_array($sql)) {
			?>		
			<option value="<?php echo $data['kode_pelanggan'] ?>"><?php echo $data['nama']; ?></option>
			<?php 
				}
			 ?>
		</select>
		<br><br><br>
	</div>
	<div class="row clearfix">
	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	        <div class="card">
	            <div class="header">
	                <h2 style="font-weight: bold;">
	                    DATA BELANJAAN
	                </h2>
	            </div>
	            <div class="body">
	                <div class="table-responsive">
	                    <table class="table table-striped">
	                        <thead>
	                            <tr>
	                                <th>No</th>
	                                <th>Kode Barang</th>
	                                <th>Nama Barang</th>
	                                <th>Harga</th>
	                                <th>Jumlah</th>
	                                <th>Total</th>
	                                <th>Aksi</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	<?php 
	                        		$no=1;
	                        		$sql=mysqli_query($koneksi,"SELECT * FROM tb_penjualan, tb_barang WHERE tb_penjualan.kode_barang=tb_barang.kode_barang AND kode_penjualan='$kode'");
	                        		while ($data=mysqli_fetch_array($sql)) {
	                        		
	                        		
	                        	 ?>
	                            <tr>
	                                <td><?php echo $no++ ?></td>
	                                <td><?php echo $data['kode_barang']; ?></td>
	                                <td><?php echo $data['nama_barang']; ?></td>
	                                <td><?php echo $data['harga_jual']; ?></td>
	                                <td><?php echo $data['jumlah']; ?></td>
	                                <td><?php echo number_format( $data['total']) ?></td>
	                                <td>
	                                	<a href="?page=penjualan&aksi=tambah&id=<?php echo $data['id'] ?>&hrg_jual=<?php echo$data['harga_jual'] ?>&kod_brng=<?php echo $data['kode_barang'] ?>&kodepj=<?php echo $kode ?>" class="btn btn-success" title="tambah"><i class="material-icons">add</i></a>

	                                	<a href="?page=penjualan&aksi=kurang&id=<?php echo $data['id'] ?>&hrg_jual=<?php echo$data['harga_jual'] ?>&kod_brng=<?php echo $data['kode_barang'] ?>&kodepj=<?php echo $kode ?>" class="btn btn-success" title="kurang"><i class="material-icons">remove</i></a>

	                                	<a href="?page=penjualan&aksi=hapus&id=<?php echo $data['id'] ?>&kod_brng=<?php echo $data['kode_barang'] ?>&kodepj=<?php echo $kode ?>&jml=<?php echo $data['jumlah'] ?>" class="btn btn-danger" title="hapus"><i class="material-icons">clear</i></a>
	                                </td>

	                            </tr>
	                           <?php 
	                          		$total_bayar=$total_bayar+$data['total'];
	                           		}	
	                           	?>
	                        </tbody>
								<tr>
									<th colspan="5" style="text-align: right;">Total</th>
									<td> 
										<input type="number" style="width: 100px;text-align: right;" id="total_bayar" name="total_bayar" value="<?php echo $total_bayar ?>"  readonly>
									</td>
								</tr>
								<tr>
									<th colspan="5" style="text-align: right;">Diskon</th>
									<td> <input type="number" style="width: 100px;text-align: right;" name="diskon" id="diskon" onkeyup="hitung()">
									</td>
								</tr>
								<tr>
									<th colspan="5" style="text-align: right;">Potongan</th>
									<td> 
										<input type="number" style="width: 100px;text-align: right;" id="potongan" name="potongan" readonly>
									</td>
								</tr>
								<tr>
									<th colspan="5" style="text-align: right;">Sub Total</th>
									<td> 
										<input type="number" style="width: 100px;text-align: right;" id="sub_total" name="sub_total" readonly>
									</td>
								</tr>
								<tr>
									<th colspan="5" style="text-align: right;">Bayar</th>
									<td> 
										<input type="number" style="width: 100px;text-align: right;" onkeyup="hitung()" id="bayar" name="bayar" >
									</td>
								</tr>
								<tr>
									<th colspan="5" style="text-align: right;">Kembalian</th>
									<td> 
										<input type="number" style="width: 100px;text-align: right;" id="kembali" name="kembali" readonly>
										<input type="submit" name="simpan" value="simpan" class="btn btn-primary" > 
										<button class="btn btn-success" onclick="window.open('page/penjualan/cetak.php?kodepj=<?php echo $kode ?>&kasir=<?php echo $kasir ?>','cetak','width=500px, height=600px, left=300px, top=20px')">Cetak</button>
									</td>
								</tr>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</form>
<?php 
	if (isset($_POST['simpan'])) {
		$pelanggan=$_POST['pelanggan'];
		$diskon=$_POST['diskon'];
		$potongan=$_POST['potongan'];
		$sub_total=$_POST['sub_total'];
		$bayar=$_POST['bayar'];
		$kembali=$_POST['kembali'];

		$sql5=mysqli_query($koneksi, "INSERT INTO tb_penjualan_detail VALUES('$kode','$bayar','$kembali','$diskon','$potongan','$sub_total')");
		$sql6=mysqli_query($koneksi, "UPDATE tb_penjualan SET id_pelanggan=$pelanggan WHERE kode_penjualan='$kode'");

	}
 ?>
<!-- #END# Basic Examples -->
<script>
	function hitung(){
		var diskon= document.getElementById('diskon').value;
		var total_bayar= document.getElementById('total_bayar').value;
		var potongan = parseInt(total_bayar) * parseInt(diskon) / parseInt(100);
		if (!isNaN(potongan)) {
			var potongan= document.getElementById('potongan').value=potongan;
		}
		var sub_total= parseInt(total_bayar)-parseInt(potongan)
		if (!isNaN(sub_total)) {
			var jml_total=document.getElementById('sub_total').value=sub_total
		}
		var bayar=document.getElementById('bayar').value
		var kembalian=parseInt(bayar)-parseInt(jml_total)
		if (!isNaN(kembalian)) {
			document.getElementById('kembali').value=kembalian
		}
	}
</script>