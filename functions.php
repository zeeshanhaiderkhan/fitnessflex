<?php
    
    public function getData($conn,$table_name,$attribute,$id){
            $query= "SELECT $attribute FROM $table_name WHERE id='$id'";
            return mysqli_query($conn,query);
    }

?>