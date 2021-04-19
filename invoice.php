<?php include "db.php"; 
    $db = new DatabaseSetup();
    $db->connect("fitnessflex");
    $fee = mysqli_fetch_assoc( $db->getData("Fees","*",$_GET["id"]));
    $client = mysqli_fetch_assoc($db->getData("clients","*",$fee['clientID']));
?>      

<!DOCTYPE html>
<head>
    <title><?php echo $fee['id']." - ".$client['name']; ?></title>
    <style>
        body {
    background: black;
    margin-top: 120px;
    margin-bottom: 120px;
}
    </style>
</head>
<body>
    <link href="css/bootstrap411.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/bootstrap411.min.js"></script>
    <script src="js/jquery411.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
    
                        <div class="row pb-5 p-5">
                            <div class="col-md-6">
                                <p class="font-weight-bold mb-4">Client Information</p>
                                <h2><p class="font-weight-bold mb-4">#<?php echo $client["id"]; ?></p></h2>
                               
                               <h3> <p class="mb-1"><?php echo $client["name"]; ?></p></h3>
                                <p><?php echo $client['contact']; ?></p>
                                <p class="mb-1"><?php echo $client['cnic']; ?></p>
                               <h4> <p class="mb-1"><?php echo $client['package']; ?></p></h4>
                            </div>
                            <div class="col-md-6 text-right"> 
                                <img src="img/logo.png" height="140" width="220">
                                <p class=" mb-1">Fitness Flex, Aabpara Market</p>
                                <p class="mb-1">G-6/1, Islamabad</p>
                                <p class="mb-3">Pakistan</p>
                                <p class="mb-2 font-weight-bold">0331-5470906 / 0345-5899103</p>
                               
                            </div>

    <!--
        <div class="row p-5">
                           
    
                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-1">Invoice #<?php echo $fee["id"]; ?> </p>
                                <p class="text-muted">Due to: <?php echo $fee["due_date"]; ?></p>
                            </div>
                            
                        </div>
                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-4">Payment Details</p>
                                <p class="mb-1"><span class="text-muted">VAT: </span> 1425782</p>
                                <p class="mb-1"><span class="text-muted">VAT ID: </span> 10253642</p>
                                <p class="mb-1"><span class="text-muted">Payment Type: </span> Root</p>
                                <p class="mb-1"><span class="text-muted">Name: </span> John Doe</p>
                            </div>
                            
    -->
                        </div>
    
                        <div class="row p-5">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Due Date</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Monthly</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Training (Opt)</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Discount</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Adjustment</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>#<?php echo $fee["id"]; ?></td>
                                        <td><?php echo $fee["due_date"]; ?></td>
                                        <td>Rs. <?php echo $fee["monthly"]; ?></td>
                                        <td>Rs. <?php echo $fee["training"]; ?></td>
                                        <td>Rs. <?php echo $fee["discount"]; ?></td>
                                        <td>Rs. <?php echo $fee["adjustment"]; ?></td>
                                        <td class="font-weight-bold"><h5>Rs. <?php 
                                        $total =  (int) $fee["monthly"] +  (int)$fee["training"] -(int) $fee["discount"] - (int) $fee["adjustment"];
                                        echo $total;
                                        ?></h5></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
    <!--
                        <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Grand Total</div>
                                <div class="h2 font-weight-light">$234,234</div>
                            </div>
    
                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Discount</div>
                                <div class="h2 font-weight-light">10%</div>
                            </div>
    
                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Sub - Total amount</div>
                                <div class="h2 font-weight-light">$32,432</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank" href="http://totoprayogo.com">totoprayogo.com</a></div>
    
 -->
    
    
    
</body>
</html>