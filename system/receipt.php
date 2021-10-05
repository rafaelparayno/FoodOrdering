<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt example</title>
    <link rel="stylesheet" href="../css//print.css">
</head>

<body>
    <div class="ticket">
        <div class="centered" style="width: 100%;">
            <img src="../assets/img//img.png" style="height:100px;text-align:center" alt="Logo">
        </div>
        <h4 class="centered">Sales Invoice</h4>
        <p class="centered">
            <br>Date: <?= date("m/d/Y") ?>
            <br>
        </p>
        <table>
            <thead>
                <tr>
                    <th class="description">ItemName</th>
                    <th class="quantity">Qty.</th>

                    <th class="price">Subtotal </th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td class="quantity">1.00</td>
                    <td class="description">ARDUINO UNO R3</td>
                    <td class="price">$25.00</td>
                </tr> -->

            </tbody>
        </table>

    </div>

    <script src="script.js"></script>
</body>

</html>