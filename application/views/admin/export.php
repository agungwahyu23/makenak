<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
  <div class="datatable table-responsive">
    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Lengkap</th>
          <th>Email</th>
          <th>Nomor Telepon</th>
          <th>Alamat</th>
          <th>Pekerjaan</th>
          <th>Tipe Rumah</th>
          <th>Blok</th>
          <th>Metode Pembayaran</th>
          <th>Transaksi Tanggal</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($data as $data) { ?>
          <tr class="table-primary">
            <td><?= $no++ ?></td>
            <td><?= $data['Nama_Lengkap'] ?></td>
            <td><?= $data['Email'] ?></td>
            <td><?= $data['No_Telp'] ?></td>
            <td><?= $data['Alamat'] ?></td>
            <td><?= $data['Pekerjaan'] ?></td>
            <?php if ($data['Tipe'] == "36") { ?>
              <td>36+</td>
            <?php } else { ?>
              <td><?= $data['Tipe'] ?></td>
            <?php } ?>
            <td><?= $data['Kode_Rumah'] ?></td>
            <td>
              <p><?= $data['Pembayaran'] ?></p>
            </td>
            <td>
              <p><?= $data['CreatedDate'] ?></p>
            </td>
            <td>
              <?php if ($data['Status'] == 1) { ?>
                <div class="badge badge-warning badge-pill">Menunggu</div>
              <?php } else if ($data['Status'] == 2) { ?>
                <div class="badge badge-success badge-pill">Pembayaran Selesai</div>
              <?php } else if ($data['Status'] == 3) { ?>
                <div class="badge badge-danger badge-pill">Batal</div>
              <?php } else { ?>
                <div class="badge badge-orange badge-pill">Pembayaran Berlangsung</div>
              <?php } ?>
            </td>

          </tr>

        <?php } ?>

      </tbody>
    </table>

  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
  </script>
</body>

</html>