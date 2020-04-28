<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpetual Calendar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form">
        <form action="?" method="get">
            Year : <input type="number" name="year">
            Month : <input type="number" name="month">
            <input type="submit" value="Search">
        </form>
    </div>
    <?php
        if(isset($_GET["year"])){
            $year=$_GET["year"];
        }
        else{
            $year=date("Y");
        }

        if(isset($_GET["month"])){
            $month=$_GET["month"];
        }
        else{
            $month=date("m");
        }

        if(!empty($_GET["year"])){
            $year=$_GET["year"];
        }
        else{
            $year=date("Y");
        }

        if(!empty($_GET["month"])){
            $month=$_GET["month"];
        }
        else{
            $month=date("m");
        }

        if($month==1){
            $preyear=$year-1;
            $premonth=12;
        }
        else{
            $preyear=$year;
            $premonth=$month-1;
        }

        if($month==12){
            $nextyear=$year+1;
            $nextmonth=1;
        }
        else{
            $nextyear=$year;
            $nextmonth=$month+1;
        }

        $day="$year-$month-01";
        $week=date("w",strtotime($day));
        $monthDays=date("t",strtotime($day));
        
    ?>
    <div class="year">
        <?= $year ?>
        <?=date('F', mktime(0,0,0,$month))?>
    </div>
    <div class="button">
        <a href="calendar.php?year=<?=$preyear;?>&month=<?= $premonth;?>">Last Month</a>
        <!-- <span>Month(<?= $month;?>)</span> -->
        <a href="calendar.php?year=<?=$nextyear;?>&month=<?= $nextmonth;?>">Next Month</a>
    </div>    
    
    <div class="container">
        <table>
                <tr>
                    <td>Sun.</td>
                    <td>Mon.</td>
                    <td>Tue.</td>
                    <td>Wed.</td>
                    <td>Thu.</td>
                    <td>Fri.</td>
                    <td>Sat.</td>
                </tr>
                <?php
                    for($i=0;$i<6;$i++){
                        echo "<tr>";
                        for($j=0;$j<7;$j++){
                            if($i==0 && $j<$week){
                                echo "<td></td>";
                            }
                            else{
                                echo "<td>";
                                $num=$i*7+$j+1-$week;
                                if($num<=$monthDays){
                                    echo $num;
                                }
                                echo "</td>";
                            }
                        }
                        echo "</tr>";
                    }
                ?>
        </table>
    </div>
</body>
</html>