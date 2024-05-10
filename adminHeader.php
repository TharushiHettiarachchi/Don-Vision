<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="resources/pic10.jpg" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Don Vision | Admin Panel</title>
</head>

<body onload="timeRun();" >
    <div class="adminHeaderDiv1" style="position: fixed;">
        <div class="adminHeaderDiv2" id="sidenav">
            <div class="adminHeaderDiv3"><i class="fa-solid fa-xmark adminHeaderIcon2" onclick="closenav();"></i></div>
            <img src="products/1.jpg" class="adminHeaderImage1" />
            <span class="adminHeaderSpan1">Admin</span>
            <span class="adminHeaderSpan2">email@gmail.com</span>
            <button class="adminHeaderButton1" onclick="window.location = 'adminPanel.php';">Dashboard</button>
            <button class="adminHeaderButton1" onclick="window.location = 'addProduct.php';">Add Products</button>
            <button class="adminHeaderButton1" onclick="window.location = 'manageProducts.php';">Manage Products</button>
            <button class="adminHeaderButton1" onclick="window.location = 'orders.php';">Orders</button>
            <button class="adminHeaderButton1" onclick="window.location = 'invoice.php';">Add Invoice</button>
        </div>
        <div class="adminHeaderDiv4" id="page">
            <nav class="adminHeaderDiv5">
                <i class="fa-solid fa-bars adminHeaderIcon1" onclick="opennav();"></i>
                <div class="adminHeaderDiv6" id="adminHeaderDiv6">
                    <?php
                    $d =  new DateTime();
                    $tz =  new DateTimeZone("Asia/Colombo");
                    $d->setTimezone($tz);
                    $date = $d->format("d S F Y");
                    $time = $d->format("H:i:s");


                    ?>
                    <span class="adminHeaderSpan1"> <?php echo ($date); ?></span>
                    <span class="adminHeaderSpan1"> <?php echo ($time) ?></span>
                    <i class="fa-solid fa-calendar" onclick="calendar();"></i>
                </div>

            </nav>
        </div>

    </div>
    <script src="script.js"></script>
</body>

</html>