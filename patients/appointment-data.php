<?php
   $server = "localhost";
   $user = "root";
   $password = "";
   $database = "hospital management";

   $conn = new mysqli($server,$user,$password,$database);
   $query = "SELECT * FROM appointments";
   $results = $conn->query($query);
   $data = array();
   while($row = $results->fetch_assoc()){
       $data[] = $row;
   }
   echo json_encode($data);
?>