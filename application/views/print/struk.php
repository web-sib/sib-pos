<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container {
            width: 400px;
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 0;
            margin-bottom: 1px;
        }

        p {
            margin-top: 0;
            margin-left: 30px;
            overflow: auto;
            padding: 10px;
            text-align: justify;
            width: 350px
        }

        body {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body>
    <pre class="container">
  <h1 style="margin-bottom: 0;">
      SIB MAKMUR
  </h1>
<P style="margin-bottom: 1;">
         Jl. Babagan km 1
</P>
   -------------------------------------<br>
   Faktur Penjualan<br>
   No. Faktur   : <?= $sale->invoice ?><br>
   Kurir        : <?= $sale->kurirName == null ? 'Bayar di tempat' :  $sale->kurirName; ?><br>
   Tanggal      : <?= date('d-M-Y');  ?><br>
   Operator     : <?= $sale->kasir ?><br>
   Customer     : <?= $customers['name']; ?>

   -------------------------------------
   <?php foreach ($transaksi as $trans => $data) : ?><br>
   <?= $data->item_name ?><br>
   disc. <?= rupiah($data->discount) ?> <br>
   <?= $data->qty ?> X <?= rupiah($data->price) ?> <?= rupiah($data->qty * $data->price) ?>

   <?php endforeach ?><br>
   -------------------------------------<br>
   Total Item           <?= $total ?><br>
   Disc.                <?= $sale->discount ?><br>
   Total Trans.         <?= rupiah($sale->total) ?><br>
   Dibayar              <?= rupiah($sale->uang) ?><br>
   Kembalian            <?= rupiah($sale->kembalian) ?><br>

   -------------------------------------<br>
   </pre>
    <p>Note:"Barang yang sudah di beli tidak dapat dikembalikan"<br></p>
    <p style="text-align:center;margin-top:0;">
        ---<?=
                $sale->note == null ? '' : $sale->note
            ?>---
    </p>
</body>

</html>