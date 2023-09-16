<div class="container-fluid">
	
		<div class="alert alert-success" role="alert">
        <p>
            <strong>Form Update Data Agency</strong>
        </p>
	</div>

	<?php foreach ($agency as $row) : ?>

		<form method="POST" action="<?php echo base_url('admin/agency/update_aksi') ?>">
			
			<div class="form-group">
				<label class="font-weight-bold">ID Agency</label>
				<input type="text" name="id_agency" class="form-control" value="<?php echo $row->id_agency ?>">
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Nama Agency</label>
				<input type="text" name="nama_agency" class="form-control" value="<?php echo $row->nama_agency ?>">
			</div>

			<button type="submit" class="btn btn-primary mt-4">Update</button>							
		</form>


	<?php endforeach; ?>


</div>