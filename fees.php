<!DOCTYPE html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="css/bootstrap.css">

    </head>
    <body>
        <?php include "includes/navigation.php"; ?>
        <?php include "db.php"; ?>
        <br><br>
        <table class="table  table-bordered table-hover">
         <thead class="thead-dark" style="background-color: black; color:white;">
         <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Date</th>
            <th scope="col">Name</th>
            <th scope="col">Contact</th>
            <th scope="col">CNIC</th>
            <th scope="col">#Invoice</th>
            <th scope="col">Monthly</th>
            <th scope="col">Training</th>
            <th scope="col">Discount</th>
            <th scope="col">Received</th>
            <th scope="col">Adjustment</th>
            <th scope="col">Balance</th>
            <th scope="col">Received By</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $db = new DatabaseSetup();
            $db->connect("FitnessFlex");    
            
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                $dateData = $db->getDataByDate($_GET["startDate"],$_GET["endDate"]);
              $i =1;
                while($row = mysqli_fetch_row($dateData)){
                   
                    echo "<tr>";
                    echo "<td><a href=\"client.php?search=$row[0]\">$i</a></td>";
                    foreach($row as $r){
                        echo "<td>$r</td>";
                    }
                    echo "</tr>";
                    $i++;
                }
                
            }
        ?>
        </tbody></table>
     
                        
    </body>
</html>