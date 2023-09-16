<div class="container-fluid">
  <!-- DataTales Example -->

  <h1 class="h3 mb-4 text-gray-800">Data Agency</h1>
  <div class="card shadow mb-4">
    <div class="card-header py-3">

      <?php echo $this->session->flashdata('pesan')?>
        
        <?php echo anchor('admin/agency/input','<button class="btn btn-sm btn-primary" type=""><i class="fas fa-plus fa-sm"></i>Tambah Data</button></a>') ?>

    <div class="card-body">
      <div class="table-responsive">
        <table style="white-space:nowrap;width:100%;" class="table table-bordered table-striped table-hover" id="dataTable" cellspacing="0">
          <thead font-weight="bold">
            <tr>
                            <th>NO</th>
                            <th>ID AGENCY</th>
                            <th>NAMA AGENCY</th>
                            <th>AKSI</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1; if (!empty($agency)) : ?>
             <?php foreach ($agency as $row) : 
              ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row->id_agency ?></td>
              <td><?php echo $row->nama_agency ?></td>
              
              <td>
                <?php echo anchor('admin/agency/update/'.$row->id_agency,'<div class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></div>'); ?>
                <?php echo anchor('admin/agency/delete/'.$row->id_agency,'<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>'); ?>
              </td>
            </tr>
            <?php endforeach ?>
            <?php else: ?>
            <tr>
              <td colspan="9" align="center">Tidak Ada Data</td>
            </tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

 </div>