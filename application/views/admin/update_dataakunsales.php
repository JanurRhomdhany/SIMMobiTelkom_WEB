<div class="container-fluid">
	
		<div class="alert alert-success" role="alert">
        <p>
            <strong>Form Update Data Akun Sales</strong>
        </p>
	</div>

	<?php foreach ($akunsales as $sl) : ?>

		<form method="POST" action="<?php echo base_url('admin/akunsales/update_aksi') ?>">
			
			<div class="form-group">
				<label class="font-weight-bold">ID Sales</label>
				<input type="text" name="id_sales" class="form-control" value="<?php echo $sl->id_sales ?>" readonly>
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Password</label>
				<input type="text" name="password" class="form-control" value="<?php echo $sl->password ?>">
			</div>

			<button type="submit" class="btn btn-primary mt-4">Update</button>							
		</form>


	<?php endforeach; ?>


</div>