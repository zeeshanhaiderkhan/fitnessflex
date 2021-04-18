<!DOCTYPE html>
    <head>
        <title>Add Client</title>
        <link rel="stylesheet" href="css/bootstrap.css">

    </head>
    <?php include "db.php"; ?>
    
    <body style="background-color: yellowgreen; ">
        <?php include "includes/navigation.php"; ?>
        <br><br><br><br>
        
       <div class="jumbotron jumbotron-fluid container ">
           <center>
       <form action="add_client.php" method="POST">
        <div class="row">
            <div class="col-6">
            <div class="form-floating mb-3 mr-3">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" maxlength="100" required>
            <label for="name">Name</label>
            </div>
            </div>
            <div class="col-6">
            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="father" name="father"  maxlength="100" placeholder="Father Name">
            <label for="father">Father Name</label>
            </div></div>
            
            
                <div class="row mb-3">

                     <div class="col-1"> 
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-light active">
                          <input type="radio" name="gender" id="female" value="Female" autocomplete="off" > Male
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="gender" id="female" value="Female" autocomplete="off"> Female
                        </label>
                      </div>

                    </div>
                </div>

    
                <div class="row mb-3">
                    <div class="col-6">
            <div class="form-floating mb-3">
            <input type="number" class="form-control" name="contact" id="contact" min="1111111111" max="9999999999" maxlength="11" placeholder="0312456789" required>
            <label for="contact">Contact</label>
            </div></div>
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="cnic" id="cnic"  max="9999999999999"  maxlength="13" placeholder="6110114567895" required>
                    <label for="cnic">CNIC</label>
                    </div>
            
                </div></div>

          
                <div class="row mb-3">
                    <div class="col-3">
                        <div class="form-floating mb-3">

                            <input type="date" class="form-control" name="dob" id="dob" placeholder="01/01/2000">
                            <label for="dob">Date of Birth</label>
                            </div></div>
                            <div class="col-3">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="doj" id="doj" placeholder="01/01/2000">
                                    <label for="doj">Date of Joining</label>
                                    </div></div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" name="email" maxlength="100" id="email" placeholder="abc@gmail.com">
                                        <label for="email">E-Mail</label>
                                        </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="address" maxlength="250" id="address" placeholder="House Street Sector City ">
                                        <label for="email">Address</label>
                                        </div>
                                </div>
                            </div>
                            
                            

                        </div>
                            <br>

                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-light active">
                                  <input type="radio" name="package" id="silver" value="Silver" autocomplete="off" checked> Silver
                                </label>
                                <label class="btn btn-secondary">
                                  <input type="radio" name="package" id="gold" value="Gold" autocomplete="off"> Gold
                                </label>
                                <label class="btn btn-dark">
                                  <input type="radio" name="package" id="diamond" value="Diamond" autocomplete="off"> Diamond
                                </label>
                              </div>

                              <button type="submit" class="btn btn-primary btn-lg btn-block" >Save</button>
                              <?php

$db = new DatabaseSetup();
$db->connect("FitnessFlex");    
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST["name"];
        $fname = $_POST["father"];
        $gender = $_POST["gender"];
        $contact =$_POST["contact"];
        $cnic = $_POST["cnic"];
        $dob = $_POST["dob"];
        $doj = $_POST["doj"];
        $email = $_POST["email"];
        $package = $_POST["package"];
        $address = $_POST["address"];
         $db = new DatabaseSetup();
         $db->connect("FitnessFlex");
         $client_id = $db->insertInto("clients",
         ["name","fathername","gender","contact","cnic","dob","doj","email","package","address"],
         [$name,$fname,$gender,$contact,$cnic,$dob,$doj,$email,$package,$address]
               );  
               echo  "<h2>Client ID Generated: <a href=\"/client.php?search=$client_id\">$client_id</a></h2>";

    }
?>


           

                
            

        
            



       </form>
       </div> 
    </center>
    </body>
</html>