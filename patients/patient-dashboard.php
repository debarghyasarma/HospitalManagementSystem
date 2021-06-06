
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Patient Panel</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
      integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Material+Icons"
    />
    <link rel="stylesheet" href="patient-dashboard.css" />
    <style>
      <?php include("patient-dashboard.css"); ?>
    </style>
  </head>
  <body>
  
    <nav>
      <nav class="navbar navbar-expand-lg navbar-light navbar-fixed mb-0">
        <div class="navbar-heading">
          <h6>HOSPITAL MANAGEMENT</h6>
        </div>
        <i
          class="material-icons text-light"
          style="height: 0px; margin-left: 810px; margin-bottom: 22px"
          >power_settings_new</i
        >
        <a
          href="http://localhost/Hospital%20Management%20System/patients/patientlogin.php"
          style="margin-left: 5px; font-weight: 500; color: white"
        >
          Logout
        </a>
      </nav>

      <div class="vertical-nav" id="sidebar">
        <div>
          <img src="patient.jpg" alt="Avatar" class="avatar" />
        </div>

        <div class="media-body">
          <h5 class="font-weight-white text-dark mb-0">Patient</h5>
        </div>
        <?php 
          include("dbcon.php");
          $email =  isset($_GET['email']) ? $_GET['email'] : '';
          $sql = "SELECT * FROM patient_register WHERE email = '$email' ";
          $pname;
          $results = $conn->query($sql);
          if ($results->num_rows>0) {
             while($row = $results->fetch_assoc()) {
           $pname = $row['firstname']." ".$row['lastname']
       ?>
        <h6 class="patient-name text-dark" id="pname"><?php echo $pname;?></h6>
        <?php }
          }
        ?> 
        <ul class="nav flex-column mb-0">
          <li class="nav-item">
            <a href="#" class="nav-link text-light font-weight-normal">
              <i class="material-icons" style="height: 0px">dashboard</i>
              <p class="link1">Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="http://localhost/Hospital%20Management%20System/patients/patient-appointments.php?pname=<?php echo $pname?>&email=<?php echo $email?>" class="nav-link text-light font-weight-normal">
              <i class="material-icons" style="height: 4px">today</i>
              <p class="link3">Appointments</p>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Cards -->
    <?php
     include("dbcon.php");
     $email =  isset($_GET['email']) ? $_GET['email'] : '';
     $sql = "SELECT * FROM patient_register WHERE email = '$email' ";
     $results = $conn->query($sql);
     $dname;
     if ($results->num_rows>0) {
        while($row = $results->fetch_assoc()) {
          $dname = $row['doctor_assigned'];
     ?>
    <div class="row" style="margin-top: 30px; margin-left:-4px">
      <div
        class="card"
        style="
          width: 20rem;
          margin-left: 260px;
          margin-top: 15px;
          height: 130px;
          box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2);
          background-color: #eb1f00;
        "
      >
        <div class="row" style="margin-top: 15px; margin-left:20px">
           <div style="margin-top:17px">
            <h4 class="text-light"><?php echo $row['doctor_assigned'] ?></h4>
            <h6 class="text-light">Doctor Name</h6>
          </div>
          <div>
            <img
              src="doctoricon.png"
              alt="Avatar"
              class="avatar"
              style="float: right; margin-top: 15px; width: 50px; height: 50px; margin-left: 52px;"
            />
          </div>  
        </div>
      </div>
  
      <div
        class="card"
        style="
          width: 20rem;
          margin-left: 58px;
          margin-top: 15px;
          height: 130px;
          box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2);
          background-color: #fab31b;
        "
      >
        <div class="row" style="margin-top: 15px; margin-left:20px">
           <div style="margin-top:17px">
            <h4 class="text-light"><?php echo $row['symptoms']?></h4>
            <h6 class="text-light">Symptoms</h6>
          </div>
          <div>
            <img
              src="symptoms.png"
              alt="Avatar"
              class="avatar"
              style="float: right; margin-top: 15px; width: 50px; height:50px; margin-left: 80px;"
            />
          </div>  
        </div>
      </div>

      <div
        class="card"
        style="
          width: 20rem;
          margin-left: 57px;
          margin-top: 15px;
          height: 130px;
          box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2);
          background-color: #187bed;
        "
      >
        <div class="row" style="margin-top: 15px; margin-left:20px">
           <div style="margin-top:17px">
           <?php 
            $subnames = explode(" ",$dname);
            $firstname = $subnames[0];
            $lastname = $subnames[1];
            $query = "SELECT mobile FROM doctor_register WHERE firstname='$firstname' and lastname='$lastname' AND approve=1";
            $results = $conn->query($query);
            if ($results->num_rows>0) {
              while($row = $results->fetch_assoc()) {
            ?>
            <h4 class="text-light"><?php echo $row['mobile']?></h4>
            <?php } } ?>
            <h6 class="text-light">Doctor Mobile</h6>
          </div>
          <div>
            <img
              src="mobile.png"
              alt="Avatar"
              class="avatar"
              style="float: right; margin-top: 15px; width: 50px; height:50px; margin-left: 95px;"
            />
          </div>  
        </div>
      </div>

    </div>
      
    <div class="row" style="margin-top: 60px; margin-left:-4px">
      <div
        class="card"
        style="
          width: 20rem;
          margin-left: 260px;
          margin-top: 15px;
          height: 130px;
          box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2);
          background-color: #eb1f00;
        "
      >
        <div class="row" style="margin-top: 15px; margin-left:20px">
           <div style="margin-top:17px">
           <?php 
            include("dbcon.php");
            $subnames = explode(" ",$dname);
            $firstname = $subnames[0];
            $lastname = $subnames[1];
            $query = "SELECT specilization FROM doctor_register WHERE firstname='$firstname' and lastname='$lastname' AND approve=1";
            $results = $conn->query($query);
            if ($results->num_rows>0) {
              while($row = $results->fetch_assoc()) {
            ?>
            <h4 class="text-light"><?php echo $row['specilization']?></h4>
            <?php } } ?>
            <h6 class="text-light">Doctor Department</h6>
          </div>
          <div>
            <img
              src="department.png"
              alt="Avatar"
              class="avatar"
              style="float: right; margin-top: 15px; width: 50px; height: 50px; margin-left: 87px;"
            />
          </div>  
        </div>
      </div>
  
      <div
        class="card"
        style="
          width: 20rem;
          margin-left: 58px;
          margin-top: 15px;
          height: 130px;
          box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2);
          background-color: #fab31b;
        "
      >
        <div class="row" style="margin-top: 15px; margin-left:20px">
           <div style="margin-top:17px">
           <?php $admit_date = new DateTime('now', new DateTimeZone('Asia/Kolkata')); ?>
            <h4 class="text-light"><?php echo $admit_date->format('d-m-Y'); ?></h4>
            <h6 class="text-light">Admit Date</h6>
          </div>
          <div>
            <img
              src="appointmenticon.png"
              alt="Avatar"
              class="avatar"
              style="float: right; margin-top: 15px; width: 50px; height:50px; margin-left: 112px;"
            />
          </div>  
        </div>
      </div>

    </div>
    <?php }
     }
     ?>
    <!-- Cards -->
    <!-- TABLE -->
    
    
    </div>
    <script src="patient-dashboard.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
      integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
      crossorigin="anonymous"
    ></script>
    
  </body>

</html>
