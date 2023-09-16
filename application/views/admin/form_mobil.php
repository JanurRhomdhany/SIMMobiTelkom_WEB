<div class="container-fluid">

	<div class="alert alert-success" role="alert">
        <p>
            <strong>Form Tambah Data Mobil</strong>
        </p>
	</div>
	<form method="POST" action="<?php echo base_url('admin/mobil/input_aksi') ?>">
		<div class="form-group">
			<label class="font-weight-bold">ID Mobil</label>
			<input type="text" name="id_mobil" placeholder="Masukkan ID Mobil" class="form-control" value="<?php echo $kode ?>" readonly>
			<?php echo form_error('id_mobil', '<div class="text-danger small" ml-3>','</div>') ?>
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Plat Mobil</label>
			<input value="<?php set_value('plat_mobil') ?>" type="text" name="plat_mobil" placeholder="Masukkan Plat Mobil" class="form-control" autofocus required>
			<?php echo form_error('plat_mobil', '<div class="text-danger small" ml-3>','</div>') ?>
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Status</label>
			<select name="status" class="form-control">
                <option value="Tersedia">Tersedia</option>
                <option value="Tidak Tersedia">Tidak Tersedia</option>
            </select>
            <!-- <?php echo form_error('status', '<div class="text-danger small" ml-3>','</div>')?> -->

		</div>

        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
        <button type="reset" class="btn btn-danger mt-4">Reset</button>	


	</form>

</div>