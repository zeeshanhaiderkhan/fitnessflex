<nav class="navbar navbar-fixed-top navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="img/logo.png" alt="Fitness Flex" width="180" height="120"></a>
                
                <?php 
                  
                ?>
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="/">  <button class="btn btn-primary">Home</button></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="add_client.php"> <button class="btn btn-primary">Add Client</button></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="view_clients.php"> <button class="btn btn-primary">View Clients</button></a>
                    </li>
                   
                    
                  </ul>

                  <form class="d-flex" action="fees.php" method="GET" >
                    <div class="col-4" style="padding: 10px 10px 10px 10px;">
                                    <div class="form-floating mb-3" > 
                                        <input type="date" class="form-control" name="startDate" id="startDate" placeholder="01/01/2000" required>
                                        <label for="startDate">Start Date</label>
                                        </div></div>
                                        <div class="col-4" style="padding: 10px 10px 10px 10px;">
                                            <div class="form-floating mb-3">
                                                <input type="date" class="form-control" name="endDate" id="endDate" placeholder="01/01/2000" required>
                                                <label for="endDate">End Date</label>
                                                </div></div>
                                                <div class="col-3" style="padding: 10px 10px 10px 10px;">
                                            <div class="form-floating mb-3" >
                                                <button type="submit" class="btn btn-primary btn-md">View Fees</button>
                                                </div>
                                            </div> 
                                            </form>
                                            
                  <form class="d-flex" action="client.php" method="GET">
                    <input class="form-control me-2" name="search" id="search" type="search" placeholder="Client ID" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                  
                  <form class="d-flex" action="client.php" method="GET" style="padding: 5px 5px 5px 5px;">
                    <input class="form-control me-2" name="contact" id="contact" type="search" placeholder="Phone" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                </div>
                
            
</nav>