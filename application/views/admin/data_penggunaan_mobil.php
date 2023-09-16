<div class="container-fluid">
  <!-- DataTales Example -->

<input type="hidden" id="userSessionName" value="<?php echo $this->session->userdata('username'); ?>">
  <h1 class="h3 mb-4 text-gray-800">Data Penggunaan Mobil</h1>
  <div class="card shadow mb-4">
    <div class="card-header py-3">

    <div class="card-body">
      <div class="table-responsive">
        <table style="white-space:nowrap;width:100%;" class="table table-bordered table-striped table-hover" id="tabelLaporan" cellspacing="0">
          <thead font-weight="bold">
            <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Sales</th>                           
                            <th>Agency</th>
                            <th>Mobil</th>
                            <th>Lokasi</th>
                            <th>Kegiatan</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1; if (!empty($penggunaan)) : ?>
             <?php foreach ($penggunaan as $row) : 
              ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row->tanggal ?></td>
              <td><?php echo $row->nama_sales ?></td>
              <td><?php echo $row->nama_agency ?></td>
              <td><?php echo $row->plat_mobil ?></td>
              <td><?php echo $row->nama_lokasi ?></td>
              <td><?php echo $row->ket_kegiatan ?></td>
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

