<div class="container-fluid">

	<div class="alert alert-success" role="alert">
        <p>
            <strong>Form Tambah Data User</strong>
        </p>
	</div>
	<form method="POST" action="<?php echo base_url('admin/user/input_aksi') ?>">
		<div class="form-group">
			<label class="font-weight-bold">Username</label>
			<input type="text" name="username" placeholder="Masukkan Username" class="form-control" value="<?php set_value('username') ?>" autofocus required>
			<?php echo form_error('username', '<div class="text-danger small" ml-3>','</div>') ?>
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Password</label>
			<input value="<?php set_value('password') ?>" type="text" name="password" placeholder="Masukkan Password" class="form-control" autofocus required>
			<?php echo form_error('password', '<div class="text-danger small" ml-3>','</div>') ?>
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Hak Akses</label>
			<select name="hak_akses" class="form-control">
                <option value="manajer">Manajer</option>
                <option value="operator">Operator</option>

            </select>
            <?php echo form_error('hak_akses', '<div class="text-danger small" ml-3>','</div>')?>

		</div>

        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
        <button type="reset" class="btn btn-danger mt-4">Reset</button>	


	</form>

</div>