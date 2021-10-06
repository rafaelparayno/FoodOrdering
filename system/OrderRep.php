<?php
include('./functions.php');

$id = $_GET['id'];

$salesList = $salesProduct->getDatabyId($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <link rel="stylesheet" href="../css/print.css">
</head>

<body>
    <div class="ticket">
        <div class="centered" style="width: 100%;">
            <img src="../assets/img//img.png" style="height:100px;text-align:center" alt="Logo">
        </div>
        <h4 class="centered">Order Receipt</h4>
        <p class="centered">

            <br>Date: <?= date("m/d/Y") ?>
            <br>Invoice No# : <?= $id ?>
        </p>
        <table>
            <thead>
                <tr>
                    <th class="description">ItemName</th>
                    <th class="quantity">Qty.</th>


                </tr>
            </thead>
            <tbody>
                <?php array_map(function ($salesprod) { ?>
                    <tr>
                        <td class="description"><?= $salesprod['productname'] ?></td>
                        <td class="quantity"><?= $salesprod['sales_qtry'] ?></td>
                    </tr>
                <?php }, $salesList) ?>
            </tbody>
        </table>

    </div>
    <button id="btnPrint" class="hidden-print">Print</button>
    <script>
        const $btnPrint = document.querySelector("#btnPrint");
        $btnPrint.addEventListener("click", () => {
            window.print();
        });
    </script>

</body>

</html>