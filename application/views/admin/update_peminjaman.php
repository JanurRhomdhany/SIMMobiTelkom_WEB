<div class="container-fluid">
	
		<div class="alert alert-success" role="alert">
        <p>
            <strong>Form Update Data Peminjaman</strong>
        </p>
	</div>

	<?php foreach ($peminjaman as $row) : ?>

		<form method="POST" action="<?php echo base_url('admin/peminjaman/update_aksi') ?>">
			
			<div class="form-group">
				<label class="font-weight-bold">Tanggal</label>
				<input type="hidden" name="id_peminjaman" value="<?php echo $row->id_peminjaman ?>" class="form-control">
				<input type="date" name="tanggal" class="form-control" value="<?php echo $row->tanggal ?>" readonly>
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Nama Sales</label>
				<input type="text" name="id_sales" value="<?php echo $row->id_sales ?>" class="form-control" readonly> 
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Mobil</label>
				<select name="id_mobil" class="form-control">
	                <option value="<?php echo $row->id_mobil?>"><?php echo $row->id_mobil?></option>
	                <?php foreach($mobil as $mbl) : ?>
	                <option value="<?php echo $mbl->id_mobil?>"><?php echo $mbl->plat_mobil ?></option>
	                <?php endforeach; ?>
            	</select>
            </div>

			<div class="form-group">
				<label class="font-weight-bold">Lokasi</label>
				<select name="id_lokasi" class="form-control">
	                <option value="<?php echo $row->id_lokasi?>"><?php echo $row->id_lokasi?></option>
	                <?php foreach($lokasi as $lk) : ?>
	                <option value="<?php echo $lk->id_lokasi?>"><?php echo $lk->nama_lokasi ?></option>
	                <?php endforeach; ?>
            	</select>
            </div>

			<div class="form-group">
				<label class="font-weight-bold">Jam Pinjam</label>
				<input type="time" name="jam_peminjaman" value="<?php echo $row->jam_peminjaman ?>" class="form-control" readonly> 
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Status Pinjam</label>
				<input type="text" name="status_peminjaman" value="<?php echo $row->status_peminjaman ?>" class="form-control" readonly> 
			</div>            

			<div class="form-group">
				<label class="font-weight-bold">Ket</label>
				<input type="text" name="ket" value="<?php echo $row->ket ?>" class="form-control" readonly> 
			</div> 
			<button type="submit" class="btn btn-primary mt-4">Update</button>							
		</form>


	<?php endforeach; ?>


</div>