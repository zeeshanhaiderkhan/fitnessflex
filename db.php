<?php 
     
 
    //creating database
    //database connection
    //create table Cafe(id,name,icon)
    //create table Rate(id, food, service, value, comment, date, foreign key to Cafe)
    //inserting test data

    class DatabaseSetup{
        private $db_host = "localhost";
        private $db_username = "root";
        private $db_password = "";
        private $db_name = "FitnessFlex";
        // SQL Connection
        private $conn ="";
        private $query="";

        

        public function createDatabase($db_name){
            $this->query="CREATE DATABASE IF NOT EXISTS $db_name";
            $this->conn=mysqli_connect($this->db_host,$this->db_username,$this->db_password);
            if(mysqli_query($this->conn,$this->query)){
                $this->conn=mysqli_connect($this->db_host,$this->db_username,$this->db_password,$db_name);
                return true;
            }
            return false;
        }
        public function connect($db_name){
            $this->conn=mysqli_connect($this->db_host,$this->db_username,$this->db_password,$db_name);
        }
        function createTable($table_name,$columns){
            
            $this->query = "CREATE TABLE $table_name(";
            foreach($columns as $column){
                $this->query .= $column.",";
            }
            $this->query=substr_replace($this->query,"",-1);
            $this->query.=");";
            
            if (mysqli_query($this->conn,$this->query)) {
               return true;
            } 
          //  echo mysqli_error($this->conn);
            return false;

        }
        public function changeBalance($id,$balance){
            $this->query = "UPDATE clients SET balance= $balance WHERE id=$id;";
            if (mysqli_query($this->conn,$this->query)) {
               return true;
            
         } 
         else return false;
        }

        //returns array
        public function getDataByDate($startDate,$endDate){//2013-07-06  format 2013-07-07
           $this->query =  "SELECT clientID,fees.doe,name,contact,cnic,fees.id,monthly,training,discount,received,adjustment,fees.balance,received_by  FROM clients INNER JOIN fees WHERE fees.clientID = clients.id and fees.doe BETWEEN'$startDate' AND '$endDate';";
            return mysqli_query($this->conn,$this->query);
        }
        public function insertInto($table_name,$columns,$values){
            $this->query = "INSERT INTO $table_name(";

            foreach($columns as $column){
                $this->query .= $column.",";
            }
           
            $this->query=substr_replace($this->query,"",-1);
            $this->query.=") VALUES (";
            foreach($values as $value){
                $this->query .= "'$value'".",";
            }
            $this->query = substr_replace($this->query,"",-1);
            $this->query .= ")";

            if (mysqli_query($this->conn,$this->query)) {
                    $last_id = mysqli_insert_id($this->conn);

                return $last_id;
                
             } 
             echo mysqli_error($this->conn);
             echo $this->query;
            return 0;

        }

        public function getConn(){
            return mysqli_connect($this->db_host,$this->db_username,$this->db_password,$this->db_name);
        }

        public function getData($table_name,$attribute,$id){
            $this->query= "SELECT $attribute FROM $table_name WHERE id='$id'";
            return mysqli_query($this->conn,$this->query);
        }
        public function getDataByContact($attribute,$contact){
            $this->query= "SELECT $attribute FROM clients WHERE contact='$contact'";
            return mysqli_query($this->conn,$this->query);
        }
        public function getBalance($id){
            return mysqli_fetch_row($this->getData("clients","balance",$id))[0];
        }
        
        public function getFeeData($table_name,$attribute,$id){
            $this->query= "SELECT $attribute FROM $table_name WHERE clientID='$id'";
            return mysqli_query($this->conn,$this->query);
        }
        public function getByCNIC($table_name,$attribute,$cnic){
            $this->query= "SELECT $attribute FROM $table_name WHERE cnic='$cnic'";
            return mysqli_query($this->conn,$this->query);
        }
        public function getDataAll($table_name,$attribute){
            $this->query= "SELECT $attribute FROM $table_name";
            return mysqli_query($this->conn,$this->query);
        }
        public function getNet($table_name,$attribute){
            $this->query = "SELECT sum($attribute) as net FROM $table_name";
            $result =  mysqli_query($this->conn,$this->query);
            $net = mysqli_fetch_assoc($result); 
            return (int) $net['net'];
        }
        public function getNetToday($table,$attribute){
            $this->query = "SELECT sum($attribute) as net FROM $table where DATE(doe) = CURDATE();";
            $result =  mysqli_query($this->conn,$this->query);
            $net = mysqli_fetch_assoc($result); 
            return (int) $net['net'];
        }
        public function getMaleFemale(){
            $this->query = "SELECT  COUNT(CASE WHEN gender='Male' THEN id END) male, COUNT(CASE WHEN gender='Female' THEN id END) female FROM clients";
            $result =  mysqli_query($this->conn,$this->query);
            $net = mysqli_fetch_assoc($result); 
            return [(int) $net['male'],(int) $net['female'] ];
        }
        public function getN($table){
            $this->query = "SELECT count(id) as net FROM $table";
            $result =  mysqli_query($this->conn,$this->query);
            $net = mysqli_fetch_assoc($result); 
            return (int) $net['net'];
        }

        public function getNToday($table){
            $this->query = "SELECT count(id) as net FROM $table where DATE(doe) = CURDATE();";
            $result =  mysqli_query($this->conn,$this->query);
            $net = mysqli_fetch_assoc($result); 
            return (int) $net['net'];
        }

        public function getLastInsert(){
            
        }
   
    }


    

?>


<!--
    CREATE TABLE clients(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR() NOT NULL,
    fathername VARCHAR() NOT NULL,
    gender VARCHAR(6) NOT NULL,
    contact VARCHAR(11),
    cnic VARCHAR(13) NOT NULL,
    dob DATE,
    doj DATE,
    email VARCHAR(250),
    package VARCHAR() NOT NULL,
    doe datetime DEFAULT(CURDATE()));

-->