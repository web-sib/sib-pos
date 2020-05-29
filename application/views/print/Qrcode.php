<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qrcode print</title>
</head>

<body>
    <?php
    $params['data'] = $code;
    $params['level'] = 'H';
    $params['size'] = 10;
    $params['savename'] = FCPATH . 'tes.png';
    $this->ciqrcode->generate($params);

    echo '<img width="150px" src="' . base_url() . 'tes.png" />';

    ?>
</body>

</html>