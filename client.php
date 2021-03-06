
<?php include "db.php"; ?>
<?php 
 $db = new DatabaseSetup();
 $db->connect("FitnessFlex");

    $conn=$db->getConn();

    

    if(isset($_GET['search'])){
        $userID = $_GET["search"];
        $user_data =  $db->getData("clients","*",$userID);
      
    }
    if(isset($_GET['contact'])){
        $userID = $_GET["contact"];
        $user_data =  $db->getDataByContact("*",$userID);
        
    }
    
    $client = mysqli_fetch_row($user_data);
    $userID =$client[0];


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      if(isset($_POST['paid'])){
      
        $db->payInvoice($_POST['paid'],$_POST['receivedBy']);
        echo "<meta http-equiv='refresh' content='0'>";
      }
      else{
            $monthly = $_POST["monthly"];
            $training = $_POST["training"];
            $discount =$_POST["discount"];
            $received = $_POST["received"];
            $adjustment = $_POST["adjustment"];
            $balance = $_POST["balance"];
            $generatedBy = $_POST["generatedBy"];
            $clientID = $_POST["clientID"];
            $notes = $_POST["notes"];
            $isPaid = $_POST["isPaid"];

            if($isPaid=="1"){
              $invoice_id = $db->insertInto("fees",
              ["monthly","training","discount","received","adjustment","balance","generated_by","received_by","clientID","notes","paid"],
              [$monthly,$training,$discount,$received,$adjustment,$balance,$generatedBy,$generatedBy,$clientID,$notes,"1"]
                    ); 
            }
            else{
              $invoice_id = $db->insertIntoFees("fees",
              ["monthly","training","discount","received","adjustment","balance","generated_by","clientID","notes","paid","due_date"],
              [$monthly,$training,$discount,"0",$adjustment,$balance,$generatedBy,$clientID,$notes,"0","CURDATE() + INTERVAL 7 DAY"]
                    ); 
            }
            
           
                   $currentBalance = (int) $db->getBalance($clientID);
            
            $balanceB =(int)$balance;
            
            $db->changeBalance($clientID,
                                $currentBalance+$balanceB);
            
            echo "<meta http-equiv='refresh' content='0'>";
          } 

        }
?>
<!DOCTYPE html>
    <head>


        <title><?php echo $client[0]." - ".$client[1]; ?></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
    </head>
    <body style="background-color:azure;">
        <?php include "includes/navigation.php"; ?>
        
        <!--
            Client Data here
        -->
      
        <br><br><br>
      <div class="container">
     
          

      <div class = "jumbotron container" style=" border-radius: 10px;">
        
      <!--Profile Card-->
      <div class="card-group col">
              <div class="card md-3">
                <div class="card-body" >

                <div class="row">
                    <div class="col-sm-3 text-primary">
                    <h2 >
                    <?php echo $client[0]; ?></h2>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-dark">
                    <h3>
                    <?php echo $client[1];  ?></h3>
                    </div>
                  </div>
                  <hr>

                  

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Father Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $client[2]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $client[3]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Contact</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $client[4]; ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">CNIC</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $client[5]; ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">DOB</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $client[6]; ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">DOJ</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $client[7]; ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">E-Mail</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $client[8]; ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Package</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $client[9]; ?>
                    </div>
                  </div>
                  <hr>


                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">DOE</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $client[10]; ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Balance</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    
                    <h3><?php echo "Rs. ";
        
            if(strlen($client[11])>0){
                echo $client[11];
            }else echo "0";
             ?></h3>
                    </div>
                  </div>

                

                </div>
              </div>
<br>
<div class="card mb-3">
  <div class="card-body" >
   

      <div class="row">
          <div class="col-lg-8 text-light" >
          <h2 style="background-color: red; padding: 2px 2px 2px 2px;">
         Unpaid Invoices</h2>
          </div>
        </div>
        <hr>
        <div class="overflow-auto">
          
<table class="table table-striped table-hover">
          <tbody>
          <?php 
           $unpaidInv = $db->getFeeData("fees","id,due_date,generated_by, monthly+training-discount-adjustment as total",$userID,0);
            
           while($row = mysqli_fetch_row($unpaidInv)){
            echo "<tr>";
            foreach($row as $r) echo "<td>$r</td>";
            echo "<td><form method=\"POST\" action=\"client.php?search=$userID\"><div class=\"form-floating mb-3\"><input style=\"background-color: yellowgreen;\" type=\"text\" class=\"form-control\" name=\"receivedBy\" id=\"receivedBy\" placeholder=\"Shozib/Imran\"  required><label for=\"receivedBy\">Received By</label></div><button name=\"paid\" id=\"paid\" type=\"submit\" value=\"$row[0]\" class=\"btn btn-outline-primary\">Paid</button></form></td>";
            echo "<td> <button type=\"button\" class=\"btn btn-primary\" onclick=\"location.href='invoice.php?id=$row[0]'\">View</button></td>";
            echo "</tr>";
            }
         
           /* while ($row= mysqli_fetch_row($unpaidInv)){
            echo "<div class="list-group"><a href=\"#\" class=\"list-group-item list-group-item-action flex-column align-items-start active\"><div class=\"d-flex w-100 justify-content-between\">";
            echo "<h5 class=\"mb-1\">Invoice ID : $row[0]</h5><small>$row[1]</small></div>";
            echo "<h4> Total : Rs. $row[3]</h4>";
            echo "<small>$row[2]</small></a>";
          }*/

          ?>
          </tbody>
</table>

  
</div>


        </div>

        
  </div></div>
    </div>
    <br><hr>
      <!---Form for Adding Fee-->
      <form method="POST" action="client.php?search=<?php echo $userID ?>" style="background-color: whitesmoke; padding: 10px 10px 10px 10px; border-radius: 10px;" >
         
        <div class="row mb-3">
            <div class="col-2">
    <div class="form-floating mb-3">
    <input style="background-color: yellowgreen;" type="number" class="form-control" name="monthly" id="monthly" placeholder="3000" value="<?php
    $silver = "4000";
    $gold = "6000";
    $diamond = "8000";
    if($client[9] == "Silver"){
        echo $silver;
    }
    else if($client[9] == "Gold"){
        echo $gold;
    }
    else if($client[9] == "Diamond"){
        echo $diamond;
    }
    else{
        
    }


    ?>" required>
    <label for="monthly">Monthly</label>
    </div></div>
    
    <div class="col-2">
        <div class="form-floating mb-3">
            <input style="background-color: yellowgreen;" type="number" class="form-control" name="training" id="training" placeholder="0" value="0" required>
            <label for="training">Training</label>
            </div>
    
        </div>
        <div class="col-2">
            <div class="form-floating mb-3">
                <input style="background-color: yellowgreen;" type="number" class="form-control" name="discount" id="discount" placeholder="0" value="0" required>
                <label for="discount">Discount</label>
                </div>
        
            </div>
            <div class="col-2">
                <div class="form-floating mb-3">
                    <input style="background-color: yellowgreen;" type="number" class="form-control" name="received" id="received" placeholder="0" value="0" oninput="changeBalance()" required>
                    <label for="received">Received</label>
                    </div>
            
                </div>
            <div class="col-2">
                <div class="form-floating mb-3">
                    <input style="background-color: yellowgreen;" type="number" class="form-control" name="adjustment" id="adjustment" oninput="changeByAdjustment()" placeholder="0" value="0" required>
                    <label for="adjustment">Adjustment</label>
                    </div>
            
                </div>
                <div class="col-2">
                    <div class="form-floating mb-3">
                        <input style="background-color: yellowgreen;" type="number" class="form-control" name="balance" id="balance" value="0" placeholder="0" readonly required>
                        <label for="balance">Balance</label>
                        </div>
                
                    </div>
                    
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input style="background-color: yellowgreen;" type="text" class="form-control" name="generatedBy" id="generatedBy" placeholder="Shozib/Imran"  required>
                                <label for="generatedBy">Generated By</label>
                                </div>

                                
                        
                            </div>

                            <div class="col-6">
                            <div class="form-floating mb-3">
                                <input style="background-color: yellowgreen;" type="text" class="form-control" name="notes" id="notes" placeholder="Write Something Here"  >
                                <label for="notes">Notes</label>
                                </div>

                                
                        
                            </div>
                           
                     <div class="col-6"> 
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-primary ">
                          <input type="radio" name="isPaid" id="notPaid" value="0" autocomplete="off" > not Paid
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="isPaid" id="isPaid" value="1" autocomplete="off"> is Paid
                        </label>
                      </div>

                    </div>
                
                            <div class="col-2">
                                <div class="form-floating mb-3">
                                    <button type="submit" class="btn btn-primary btn-lg">Submit Fee</button>
                                    </div>
                            <input type="number" value="<?php echo $client[0]; ?>" name="clientID" id="clientID" hidden>
                                </div>
                                            
    </div>
    <script>
    function changeBalance() {
        
        var monthly = parseInt(document.getElementById("monthly").value);
        if(isNaN(monthly)) monthly=0;
        var training = parseInt(document.getElementById("training").value);
        if(isNaN(training)) training=0;
        var discount = parseInt(document.getElementById("discount").value);
        if(isNaN(discount)) discount=0;
        var received = parseInt(document.getElementById("received").value);
        if(isNaN(received)) received=0;

        var result = received-(monthly+training-discount);
        document.getElementById("balance").value = result;

        return result;
        
    }
    function changeByAdjustment(){
        var adjustment = parseInt(document.getElementById("adjustment").value);
        if(isNaN(adjustment)) adjustment=0;
        var balance = parseInt(document.getElementById("balance").value);
        if(isNaN(balance)) balance=0;
        
        document.getElementById("balance").value= adjustment+changeBalance();
        
    }
    </script>

    </form>
       
        <hr>
        <br>
        <?php 
            $client_fee =$db->getFeeData("fees","*",$userID,1);

        ?>
        
        <table class="table  table-bordered table-hover">
         <thead class="thead-dark" style="background-color: black; color:white;">
         <tr>
            <th scope="col"> #</th>
            <th scope="col">#invoice </th>
            <th scope="col">Date</th>
            <th scope="col">Monthly</th>
            <th scope="col">Training</th>
            <th scope="col">Discount</th>
            <th scope="col">Received</th>
            <th scope="col">Adjustment</th>
            <th scope="col">Balance</th>
            <th scope="col">Client ID</th>
            <th scope="col">Received By </th>
            <th scope="col">Due Date </th>
            <th scope="col">Notes </th>
            <th scope="col">Generated By </th>
            <th scope="col">Client ID </th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $inv = 1;
        while($row = mysqli_fetch_row($client_fee)) {  

                echo "<tr><td>$inv</td>";
                    
                    foreach($row as $r){
                        echo "<td>".$r."</td>";
                    }
                echo   "</tr>";
                $inv++;
        }
            ?>
        </tbody>
</table>
<br>
<br>
<hr>
<br>
<br>



</div>


</body>
</html>