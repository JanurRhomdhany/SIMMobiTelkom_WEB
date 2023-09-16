<div class="container-fluid">

	<div class="alert alert-success" role="alert">
        <p>
            <strong>Form Tambah Data Sales</strong>
        </p>
	</div>
	<form method="POST" action="<?php echo base_url('admin/sales/input_aksi') ?>">
		<div class="form-group">
			<label class="font-weight-bold">ID Sales</label>
			<input type="text" name="id_sales" placeholder="Masukkan ID Sales" class="form-control" value="<?php set_value('id_sales') ?>" autofocus required>
			<?php echo form_error('id_sales', '<div class="text-danger small" ml-3>','</div>') ?>
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Nama Sales</label>
			<input value="<?php set_value('nama_sales') ?>" type="text" name="nama_sales" placeholder="Masukkan Nama Sales" class="form-control" autofocus required>
			<?php echo form_error('nama_sales', '<div class="text-danger small" ml-3>','</div>') ?>
		</div>

		<div class="form-group">
			<label class="font-weight-bold">ID Agency</label>
			<select name="id_agency" class="form-control">
                <option value="">--Pilih Agency</option>
                <?php foreach($agency as $ag) : ?>
                <option value="<?php echo $ag->id_agency?>"><?php echo $ag->nama_agency ?></option>

                <?php endforeach; ?>
            </select>
            <?php echo form_error('id_agency', '<div class="text-danger small" ml-3>','</div>')?>

		</div>

		<div class="form-group">
			<label class="font-weight-bold">No Telp</label>
			<input value="<?php set_value('no_telp') ?>"type="text" name="no_telp" placeholder="Masukkan No Telp" class="form-control" autofocus required>
			<?php echo form_error('no_telp', '<div class="text-danger small" ml-3>','</div>') ?>
		</div>

        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
        <button type="reset" class="btn btn-danger mt-4">Reset</button>	


	</form>

</div>