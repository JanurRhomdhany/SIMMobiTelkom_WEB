<div class="container-fluid">
	
		<div class="alert alert-success" role="alert">
        <p>
            <strong>Form Update Data Sales</strong>
        </p>
	</div>

	<?php foreach ($sales as $sl) : ?>

		<form method="POST" action="<?php echo base_url('admin/sales/update_aksi') ?>">
			
			<div class="form-group">
				<label class="font-weight-bold">ID Sales</label>
				<input type="text" name="id_sales" class="form-control" value="<?php echo $sl->id_sales ?>">
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Nama Sales</label>
				<input type="text" name="nama_sales" class="form-control" value="<?php echo $sl->nama_sales ?>">
			</div>

			<div class="form-group">
				<label class="font-weight-bold">ID Agency</label>
				<select name="id_agency" class="form-control">
	                <option value="<?php echo $sl->id_agency?>"><?php echo $sl->id_agency?></option>
	                <?php foreach($agency as $ag) : ?>
	                <option value="<?php echo $ag->id_agency?>"><?php echo $ag->nama_agency ?></option>
	                <?php endforeach; ?>
            	</select>
            </div>

			<div class="form-group">
				<label class="font-weight-bold">No Telp</label>
				<input type="text" name="no_telp" class="form-control" value="<?php echo $sl->no_telp ?>">
			</div>

			<button type="submit" class="btn btn-primary mt-4">Update</button>							
		</form>


	<?php endforeach; ?>


</div>