<div class="container-fluid">
  <!-- DataTales Example -->

  <h1 class="h3 mb-4 text-gray-800">Data Mobil</h1>
  <div class="card shadow mb-4">
    <div class="card-header py-3">

      <?php echo $this->session->flashdata('pesan')?>
        
        <?php echo anchor('admin/mobil/input','<button class="btn btn-sm btn-primary" type=""><i class="fas fa-plus fa-sm"></i>Tambah Data</button></a>') ?>

    <div class="card-body">
      <div class="table-responsive">
        <table style="white-space:nowrap;width:100%;" class="table table-bordered table-striped table-hover" id="dataTable"  cellspacing="0">
          <thead font-weight="bold">
            <tr>
                            <th>NO</th>
                            <th>ID MOBIL</th>
                            <th>PLAT MOBIL</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1; if (!empty($mobil)) : ?>
             <?php foreach ($mobil as $row) : 
              ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row->id_mobil ?></td>
              <td><?php echo $row->plat_mobil ?></td>
              <?php if ($row->status == "Tersedia") : ?> 
                <td><span class="badge badge-success"><?php echo $row->status ?></span></td>
              
              <?php else: ?>
                <td><span class="badge badge-danger"><?php echo $row->status ?></span></td>
              <?php endif ?>
              
              <td>
                <?php echo anchor('admin/mobil/update/'.$row->id_mobil,'<div class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></div>'); ?>
                <?php echo anchor('admin/mobil/delete/'.$row->id_mobil,'<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>'); ?>
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