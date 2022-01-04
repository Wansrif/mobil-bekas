<html>

<head>
  <style>
  .text-center {
    text-align: center;
  }

  .bb-2 {
    border-bottom: 2rem solid #000;
  }

  .mb-2 {
    margin-bottom: 2rem;
  }

  .text-2 {
    font-size: 2rem;
  }

  .text-1 {
    font-size: 1.125rem;
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
  <div class="bb-2 mb-2">
    <div class="text-center text-2">Laporan Penjualan Mobil Bekas Pafona Auto</div>
    <div class="text-center text-1"><?= $periode; ?></div>
  </div>
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
        <td class="text-center"><?= $i++; ?></td>
        <td><?= $val['mobil']; ?></td>
        <td><?= $val['pembeli']; ?></td>
        <td class="<?= ($val['whatsapp'] = '-') ? 'text-center' : ''; ?>"><?= $val['whatsapp']; ?></td>
        <td><?= $val['nama_kategori']; ?></td>
        <td><?= Date("d-M-Y", strtotime($val['waktu'])); ?></td>
        <td><?= $val['harga']; ?></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>

</html>