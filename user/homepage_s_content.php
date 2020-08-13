<!DOCTYPE html>
<html>
<head>
	    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="content/world/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="content/world/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="content/world/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="content/world/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="content/world/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="content/world/css/style.css" type="text/css">

</head>
<body>
		    <!-- Live score Section Begin -->
    <div class="live-score">
        <div class="container1">
            <div class="tn-title"><i class="fa fa-caret-right"></i> Live Score</div>
            <div class="news-slider owl-carousel">
                <div class="nt-item">Cricket: 100/2   |   Over: 15.5   |   Player1 25(15)   |   Player2 32(30)</div>
                <div class="nt-item">South Africa Vs New Zealand</div>
            </div>
        </div>
    </div>
    <!-- Live Score Section End -->


    <!-- Match Section Begin -->
    <section class="match-section set-bg" data-setbg="content/world/img/match/match-bg.jpg">
    <div style="padding-left: 3%; padding-right:3%;">
        <div class="container1">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ms-content">
                        <h4>Next Match</h4>
                        <?php
                            $query = "SELECT * FROM fixtures limit 3"; 
                            $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
                            if (mysql_num_rows($result) > 0) {
                                while($row = mysql_fetch_array($result)) {
                        ?>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            <img src="content/world/img/match/tf-1.jpg" alt="">
                                            <h6><?php echo $row['team1']; ?></h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Cricket</div>
                                            <h4>VS</h4>
                                            <div class="mc-op"><?php echo $row['t_date']; ?></div>
                                        </td>
                                        <td class="right-team">
                                            <img src="content/world/img/match/tf-2.jpg" alt="">
                                            <h6><?php echo $row['team2'];?></h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                        <?php
                                }}
                                ?>
    
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ms-content">
                        <h4>Recent Results</h4>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            <img src="content/world/img/match/tf-1.jpg" alt="">
                                            <h6>Darussalam</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Football</div>
                                            <h4>1 : 2</h4>
                                            <div class="mc-op">30 March 2020</div>
                                        </td>
                                        <td class="right-team">
                                            <img src="content/world/img/match/tf-2.jpg" alt="">
                                            <h6>Ucraina</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            <img src="content/world/img/match/tf-3.jpg" alt="">
                                            <h6>Japan</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Football</div>
                                            <h4>1 : 2</h4>
                                            <div class="mc-op">30 March 2020</div>
                                        </td>
                                        <td class="right-team">
                                            <img src="content/world/img/match/tf-4.jpg" alt="">
                                            <h6>Philippines</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mc-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="left-team">
                                            <img src="content/world/img/match/tf-5.jpg" alt="">
                                            <h6>Kyrgyz</h6>
                                        </td>
                                        <td class="mt-content">
                                            <div class="mc-op">Football</div>
                                            <h4>1 : 2</h4>
                                            <div class="mc-op">30 March 2020</div>
                                        </td>
                                        <td class="right-team">
                                            <img src="content/world/img/match/tf-6.jpg" alt="">
                                            <h6 class="mi-right">Pakistan</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Match Section End -->

    

    <!-- Latest Section Begin -->
    <br/>
    <div style="padding: 2%;">

    <section class="latest-section">
        <div class="container1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title latest-title">
                        <h3>Latest <span>News</span></h3>
                        <br>
                    </div>
                    <div class="row">
                        <?php
                            $query = "SELECT * FROM news_articles  where news_id='127'"; 
                            $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
                            if (mysql_num_rows($result) > 0) {
                                while($row = mysql_fetch_array($result)) { 

                        ?>
                        <div class="col-md-6">
                            <div class="news-item left-news">
                                <div class="ni-pic set-bg" data-setbg="content/world/img/news/latest-b.jpg">
                                    <div class="ni-tag">Soccer</div>
                                </div>
                                <div class="ni-text">
                                    <h4><a href="#"><?php echo $row['heading']; ?></a></h4>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i><?php echo $row['date']; ?></li>
                                        <li><i class="fa fa-edit"></i><?php echo $row['time']; ?></li>
                                    </ul>
                                    <p style="font-size: 11px;"><?php echo $row['description'];}} ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                        <?php
                        $query = "SELECT * FROM news_articles"; 
                            $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
                            if (mysql_num_rows($result) > 0) {
                                while($row = mysql_fetch_array($result)) { 
                                ?>

                            <div class="news-item">
                                <div class="ni-pic">
                                    <img src="content/world/img/news/ln-1.jpg" alt="">
                                </div>
                                <div class="ni-text">
                                    <h5><a href="#"><?php echo $row['heading']; ?></a></h5>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i><?php echo $row['date']; ?></li>
                                        <li><i class="fa fa-edit"></i><?php echo $row['time'];?></li>
                                    </ul>
                                </div>
                            </div>
                                <?php }} ?>
                            
                                     
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Latest Section End -->

    <!-- Post Section Begin -->
    
    </div>
    <!-- Popular Post Section End -->
        <!-- Js Plugins -->
    <script src="content/js/jquery-3.3.1.min.js"></script>
    
    <script src="content/world/js/jquery.magnific-popup.min.js"></script>
    <script src="content/world/js/jquery.slicknav.js"></script>
    <script src="content/world/js/owl.carousel.min.js"></script>
    <script src="content/world/js/main.js"></script>

</body>
</html>