<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <style>
        .container {
            margin: 5%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>SIB MAKMUR</h1>
        <P>jl. Babagan km 1</P>
        <p>
            <h4><?= $report->invoice; ?></h4>
        </p>
        <hr style="margin-bottom: 0;">
        <div style="margin-left: 25%; margin-top: 0;margin-bottom: 5%;">
            <h2 style="border: 1px solid black; width: 300px;text-align: center;padding:10px;">BUKTI TRANSAKSI</h2>
        </div>
        <h3>Customer :<input type="text" value="<?= $report->names == null ? 'umum' :  $report->names ?>" style="border-top:none;border-left:none;border-right:none;margin-left: 20.5%;"></h3>

        <h3>Total transaksi :<input type="text" value="<?= rupiah($report->total) ?>" style="border-top:none;border-left:none;border-right:none;margin-left: 14%;"></h3>

        <h3>Uang pembayaran :<input type="text" value="<?= rupiah($report->uang) ?>" style="border-top:none;border-left:none;border-right:none;margin-left: 10%;"></h3>

        <h3>Kembalian :<input type="text" value="<?= rupiah($report->kembalian) ?>" style="border-top:none;border-left:none;border-right:none;margin-left: 19.5%;"></h3>

        <span style="text-align: right;">
            <p><?= $report->created; ?></p>
            <br>
            <br>
            <p style="font-size: 20pt;">(<?= $report->kasir; ?>)</p>
        </span>
    </div>
</body>

</html>