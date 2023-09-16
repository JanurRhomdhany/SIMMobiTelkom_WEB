<div class="container-fluid">
	
		<div class="alert alert-success" role="alert">
        <p>
            <strong>Form Update Data Lokasi</strong>
        </p>
	</div>

	<?php foreach ($lokasi as $row) : ?>

		<form method="POST" action="<?php echo base_url('admin/lokasi/update_aksi') ?>">
			
			<div class="form-group">
				<label class="font-weight-bold">ID Lokasi</label>
				<input type="text" name="id_lokasi" class="form-control" value="<?php echo $row->id_lokasi ?>">
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Nama Lokasi</label>
				<input type="text" name="nama_lokasi" class="form-control" value="<?php echo $row->nama_lokasi ?>">
			</div>

			<button type="submit" class="btn btn-primary mt-4">Update</button>							
		</form>


	<?php endforeach; ?>


</div>