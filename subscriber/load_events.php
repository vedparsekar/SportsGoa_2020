<?php
include("../conn.inc.php");
$event_type = $_GET['event_type'];
$event_category = $_GET['event_category'];
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <style type="text/css">
    .table_area{
          border:1px solid;
          font-size:18px;
    }
    th{
        background-color: black;
    }
    tr:hover {
          background-color: #007bff;
        }
    tr[data-href] {
        cursor: pointer;
    }    
    </style>      
</head>
<body>

    <?php 
        if (($event_category!=1) && ($event_type!=1)) 
        {   
            $select  = " SELECT * FROM events WHERE event_category = '$event_category' and event_type= '$event_type'";
            $result = $conn->query($select);
            echo "<table class='table table-hover table_area thead-dark'>
                <tr>
                    <th>Event Name</th>
                    <th>Place</th>
                    <th>Event Category</th>
                    <th>Event Type</th>
                </tr>";
            while($row = $result->fetch_object()){
                echo '<tr>
                    <td><a href="event_home.php?event_id='.$row->event_id.'">'.$row->event_name.'</a></td>
                    <td>'.$row->place.'</td>
                    <td>'.$row->event_category.'</td>
                    <td>'.$row->event_type.'</td>
                    </tr>';
            }
            echo '</table>';
        }
        else if ($event_type!=1) 
        {   
            $select  = " SELECT * FROM events WHERE event_type = '$event_type'";
            $result = $conn->query($select);
            echo "<table class='table table-hover table_area'>
                <tr >
                    <th>Event Name</th>
                    <th>Place</th>
                    <th>Event Category</th>
                    <th>Event Type</th>
                </tr>";
            while($row = $result->fetch_object()){
                echo '<tr>'
                    .'<td><a href="event_home.php?event_id='.$row->event_id.'">'.$row->event_name.'</a></td>'
                    .'<td>'.$row->place.'</td>'
                    .'<td>'.$row->event_category.'</td>'
                    .'<td>'.$row->event_type.'</td>'
                    .'</tr>';
            }
            echo '</table>';
        }
        else if ($event_category!=1) 
        {

            $select  = " SELECT * FROM events WHERE event_category = '$event_category'";
            $result = $conn->query($select);
            echo "<table class='table table-hover table_area'>
                <tr>
                    <th>Event Name</th>
                    <th>Place</th>
                    <th>Event Category</th>
                    <th>Event Type</th>
                </tr>";
            while($row = $result->fetch_object()){
                echo '<tr>'
                    .'<td><a href="event_home.php?event_id='.$row->event_id.'" >'.$row->event_name.'</a></td>'
                    .'<td>'.$row->place.'</td>'
                    .'<td>'.$row->event_category.'</td>'
                    .'<td>'.$row->event_type.'</td>'
                    .'</tr>';
            }
            echo '</table>';
        }     

    ?>
    <script>
//        $(document).ready(function() {
//            $(document.body).on("click", "tr[data-href]", function() {
//                window.location.href = this.dataset.href;
//            });    
///        });
    
        document.addEventListener("DOMContentLoaded", () => {
            const rows = document.querySelectorAll("tr[data-href]");

            rows.forEach(row => {
                row.addEventListener("click", () => {
                    window.location.href = row.dataset.href;    
                });
            });

        });
    </script>
</body>
</html> 