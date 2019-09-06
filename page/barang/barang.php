 <!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="font-weight: bold;">
                    DATA BARANG
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Harga Beli</th>
                                <th>Stock</th>
                                <th>Harga Jual</th>
                                <th>Profit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$no=1;
                        		$sql=mysqli_query($koneksi,"SELECT * FROM tb_barang");
                        		while ($data=mysqli_fetch_array($sql)) {
                        		
                        		
                        	 ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['kode_barang']; ?></td>
                                <td><?php echo $data['nama_barang']; ?></td>
                                <td><?php echo $data['satuan']; ?></td>
                                <td><?php echo $data['harga_beli']; ?></td>
                                <td><?php echo $data['stock']; ?></td>
                                <td><?php echo $data['harga_jual']; ?></td>
                                <td><?php echo $data['profit']; ?></td>
                                <td>
                                	<a href="?page=barang&aksi=ubah&id=<?php echo $data['kode_barang'] ?>" class="btn btn-success">Ubah</a>
                                	<a href="?page=barang&aksi=hapus&id=<?php echo $data['kode_barang'] ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                           <?php 
                           		}
                            ?>
                            </tbody>
                    </table>
					<a href="?page=barang&aksi=tambah" class="btn btn-primary">Tambah</a>
                    <a href="page/barang/cetak.php" target="_blank" class="btn btn-info">Cetak</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Examples -->