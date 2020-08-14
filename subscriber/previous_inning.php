    <?php
    require("conn.php");
    $reg_id=$_GET['id'];

        $query4="select * from livecricket where reg_id='$reg_id'";
        $result4 = mysql_query($query4,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
        if (mysql_num_rows($result4) > 0) { 
        while($row = mysql_fetch_array($result4))
         { 
            $event_id=$row['event_id'];
            $match_id=$row['match_id'];
            $inning=$row['inning'];

        }
        }

    $query8="update livecricket set status= case when inning='$inning' then 0 
                                                         when inning='$inning'-'1' then 1
                                                         else status
                                                            end where match_id='$match_id'";
    $query8;

    if ($res8=mysql_query($query8)) 
    {
        header("location:livecricket.php?id=$match_id");

    }
    else
    {
        echo "data not inserted";
        header("location:livecricket.php?id=$match_id");
    }

?>