<div class="container-fluid">
	
		<div class="alert alert-success" role="alert">
        <p>
            <strong>Form Update Data Mobil</strong>
        </p>
	</div>

	<?php foreach ($mobil as $row) : ?>

		<form method="POST" action="<?php echo base_url('admin/mobil/update_aksi') ?>">
			
			<div class="form-group">
				<label class="font-weight-bold">ID Mobil</label>
				<input type="text" name="id_mobil" class="form-control" value="<?php echo $row->id_mobil ?>">
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Plat Mobil</label>
				<input type="text" name="plat_mobil" class="form-control" value="<?php echo $row->plat_mobil ?>">
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Status</label>
				<select name="status" class="form-control">
	                <option value="Tersedia">Tersedia</option>
	                <option value="Tidak Tersedia">Tidak Tersedia</option>
	            </select>
	            

			</div>

			<button type="submit" class="btn btn-primary mt-4">Update</button>							
		</form>


	<?php endforeach; ?>


</div>