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
          <th>Nama Penerima</th>
          <th>Email</th>
          <th>Nomor WhatsApp</th>
          <th>Alamat</th>
          <th>Produk</th>
          <th>Jumlah</th>
          <th>Total Harga</th>
          <th>Transaksi Tanggal</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($data as $data) { ?>
          <tr class="table-primary">
            <td><?= $no++ ?></td>
            <td><?= $data['namaPenerima'] ?></td>
            <td><?= $data['emailPenerima'] ?></td>
            <td><?= $data['wa'] ?></td>
            <td><?= $data['alamatPenerima'] ?>, <?= $data['desa'] ?>, <?= $data['kecamatan'] ?>, <?= $data['kabupaten'] ?></td>
            <td><?= $data['namaProduk'] ?></td>
            <td><?= $data['jumlahBeli'] ?></td>
            <td><?= $data['totalHarga'] ?></td>
            <td><?= $data['tanggalTransaksi'] ?></td>
            <td><?= $data['status'] = 3 ? 'Selesai' : 'Belum Selesai' ?></td>
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