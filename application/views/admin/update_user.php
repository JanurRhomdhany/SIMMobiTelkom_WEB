<div class="container-fluid">
	
		<div class="alert alert-success" role="alert">
        <p>
            <strong>Form Update Data User</strong>
        </p>
	</div>

	<?php foreach ($user as $u) : ?>

		<form method="POST" action="<?php echo base_url('admin/user/update_aksi') ?>">
			
			<div class="form-group">
				<label class="font-weight-bold">Username</label>
				<input type="text" name="username" class="form-control" value="<?php echo $u->username ?>" readonly>
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Password</label>
				<input type="text" name="password" class="form-control" value="<?php echo $u->password ?>">
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Hak Akses</label>
				<select name="akses" class="form-control">
	                <option value="<?php echo $u->akses?>"><?php echo $u->akses?></option>
	                <option value="manajer">Manajer</option>
	                <option value="operator">Operator</option>
            	</select>
            </div>

			<button type="submit" class="btn btn-primary mt-4">Update</button>							
		</form>


	<?php endforeach; ?>


</div>