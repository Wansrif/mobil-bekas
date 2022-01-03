<html>

<head>
  <style>
  .text-center {
    text-align: center;
    border-bottom: 2rem solid #000;
  }

  table {
    border-left: 0.01em solid #000;
    border-right: 0;
    border-top: 0.01em solid #000;
    border-bottom: 0;
    border-collapse: collapse;
  }

  table td,
  table th {
    border-left: 0;
    border-right: 0.01em solid #000;
    border-top: 0;
    border-bottom: 0.01em solid #000;
  }
  </style>
</head>

<body>
  <h1 class="text-center">Laporan Penjualan Mobil Bekas Pafona Auto</h1>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Mobil</th>
        <th>Pembeli</th>
        <th>Whatsapp</th>
        <th>Kategori</th>
        <th>Terjual</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1 ?>
      <?php foreach ($penjualan as $val) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $val['mobil']; ?></td>
        <td><?= $val['pembeli']; ?></td>
        <td class="<?= ($val['whatsapp'] = '-') ? 'text-center' : ''; ?>"><?= $val['whatsapp']; ?></td>
        <td><?= $val['nama_kategori']; ?></td>
        <td><?= $val['waktu']; ?></td>
        <td><?= $val['harga']; ?></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>

</html>