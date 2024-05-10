<?php
session_start();
if (isset($_SESSION["a"])) {
?>
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

    <body class="adminPanelBody">
        <?php include "adminHeader.php" ?>
        <div class="adminPanelDiv0">
            <div class="adminPanelDiv1" id="adminPanelDiv1">
                <div class="adminPanelDiv2">Dashboard</div>
                <div class="adminPanelDiv3">
                    <div class="adminPanelDiv4">
                        <span class="adminPanelSpan1">Today's Orders</span>
                        <?php
                        require "connection.php";
                        $order_rs = Database::search("SELECT * FROM `order_details`");
                        $today =  new DateTime();
                        $tz =  new DateTimeZone("Asia/Colombo");
                        $today->setTimezone($tz);
                        $todate = $today->format("Y-m-d");

                        $order_num = $order_rs->num_rows;
                        $today_order_count = 0;
                        $today_earning = 0;
                        $total_earning=0;

                        for ($n = 0; $n < $order_num; $n++) {
                            $order_data = $order_rs->fetch_assoc();
                            $date = $order_data["date_time"];
                            $splitDate = explode(" ", $date);
                            $day = $splitDate[0];
                            $total_earning = $total_earning +intval($order_data["total"]);
                            if ($todate == $day) {
                                $today_order_count = $today_order_count + 1;
                                $today_earning = $today_earning + $order_data["total"];
                            } 
                        
                            
                        }




                        ?>
                        <span class="adminPanelSpan1"><?php echo ($today_order_count); ?></span>
                    </div>
                    <div class="adminPanelDiv4">
                        <span class="adminPanelSpan1">Total Orders</span>
                        <span class="adminPanelSpan1"><?php echo ($order_num); ?></span>
                    </div>
                    <div class="adminPanelDiv4">
                        <span class="adminPanelSpan1">Today's Earnings</span>
                        <span class="adminPanelSpan1"><?php echo ($today_earning);  ?>.00</span>
                    </div>
                    <div class="adminPanelDiv4">
                        <span class="adminPanelSpan1">Total Earnings</span>
                        <span class="adminPanelSpan1"><?php echo ($total_earning);  ?>.00</span>
                    </div>
                </div>
            </div>

            <div class="calendar" id="calendar">
                <div class="calendar__picture">
                    <h2>18, Sunday</h2>
                    <h3>November</h3>
                </div>
                <div class="calendar__date">
                    <div class="calendar__day">M</div>
                    <div class="calendar__day">T</div>
                    <div class="calendar__day">W</div>
                    <div class="calendar__day">T</div>
                    <div class="calendar__day">F</div>
                    <div class="calendar__day">S</div>
                    <div class="calendar__day">S</div>
                    <div class="calendar__number"></div>
                    <div class="calendar__number"></div>
                    <div class="calendar__number"></div>
                    <div class="calendar__number">1</div>
                    <div class="calendar__number">2</div>
                    <div class="calendar__number">3</div>
                    <div class="calendar__number">4</div>
                    <div class="calendar__number">5</div>
                    <div class="calendar__number">6</div>
                    <div class="calendar__number">7</div>
                    <div class="calendar__number">8</div>
                    <div class="calendar__number">9</div>
                    <div class="calendar__number">10</div>
                    <div class="calendar__number">11</div>
                    <div class="calendar__number">12</div>
                    <div class="calendar__number">13</div>
                    <div class="calendar__number">14</div>
                    <div class="calendar__number">15</div>
                    <div class="calendar__number">16</div>
                    <div class="calendar__number">17</div>
                    <div class="calendar__number calendar__number--current">18</div>
                    <div class="calendar__number">19</div>
                    <div class="calendar__number">20</div>
                    <div class="calendar__number">21</div>
                    <div class="calendar__number">22</div>
                    <div class="calendar__number">23</div>
                    <div class="calendar__number">24</div>
                    <div class="calendar__number">25</div>
                    <div class="calendar__number">26</div>
                    <div class="calendar__number">27</div>
                    <div class="calendar__number">28</div>
                    <div class="calendar__number">29</div>
                    <div class="calendar__number">30</div>
                </div>
            </div>
        </div>
        <div class="footer1">
            &copy;2023 | Don Vision | All rights reserved<br />
            Powered by <a href="http://www.hendecagen.com/" style="text-decoration:none ; color:gray"><b>HENDECAGEN</b></a>
        </div>







        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: admin.php");
}

?>