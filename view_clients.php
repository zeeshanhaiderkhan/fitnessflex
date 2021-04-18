<!DOCTYPE html>
    <head>
        <title>View Clients</title>
        <style>
    a:link{
        text-decoration: none;
        color:black;
    }
                td > a {
  display: block;
  color: black;

}
        </style>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="script" href="js/bootstrap.js">
       
    </head>
    <body>
        <?php include "includes/navigation.php"; ?>
        <?php include "db.php"; ?>        
        <br>
        <br>
        <div class="jumbotron">
            <table class="table  table-bordered table-hover">
                <thead class="thead-dark" style="background-color: black; color:white;">
         <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Father</th>
            <th scope="col">Gender</th>
            <th scope="col">Contact</th>
            <th scope="col">CNIC</th>
            <th scope="col">DOB</th>
            <th scope="col">DOJ</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Package</th>
            <th scope="col">DOE</th>
            <th scope="col">Balance</th>
            <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>
            <?php 
      
        $db = new DatabaseSetup();
        $db->connect("FitnessFlex");

        $conn=$db->getConn();
        $user_data =  $db->getDataAll("clients","*");
        
        while($row = mysqli_fetch_row($user_data)) {  

                
                echo "<tr>";
                    foreach($row as $r){
                        echo "<td><a href='client.php?search=$row[0]'>".$r."</a></td>";
                    }
                echo   "</tr>";
                
        }
            ?>
       
           
        </tbody>
</table>
        
    </div>
        </body>
</html>