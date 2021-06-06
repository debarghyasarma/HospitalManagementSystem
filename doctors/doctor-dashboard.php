
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor Panel</title>
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
    <link rel="stylesheet" href="doctor-dashboard.css" />
    <style>
      <?php include("doctor-dashboard.css"); ?>
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
          href="http://localhost/Hospital%20Management%20System/doctors/doctorlogin.php"
          style="margin-left: 5px; font-weight: 500; color: white"
        >
          Logout
        </a>
      </nav>

      <div class="vertical-nav" id="sidebar">
        <div>
          <img src="admin.jpeg" alt="Avatar" class="avatar" />
        </div>

        <div class="media-body">
          <h5 class="font-weight-white text-dark mb-0">Doctor</h5>
        </div>
        <?php 
          include("dbcon.php");
          $email =  isset($_GET['email']) ? $_GET['email'] : '';
          $sql = "SELECT * FROM doctor_register WHERE email = '$email' ";
          $dname;
          $results = $conn->query($sql);
          if ($results->num_rows>0) {
             while($row = $results->fetch_assoc()) {
           $dname = $row['firstname']." ".$row['lastname']
       ?>
        <h6 class="doctor-name text-dark" id="dname"><?php echo $dname;?></h6>
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
            <a href="http://localhost/Hospital%20Management%20System/doctors/doctor-patients.php?dname=<?php echo $dname?>" class="nav-link text-light font-weight-normal">
              <i class="material-icons" style="height: 4px">people</i>
              <p class="link3">Patient</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="http://localhost/Hospital%20Management%20System/doctors/doctor-appointments.php?dname=<?php echo $dname?>" class="nav-link text-light font-weight-normal">
              <i class="material-icons" style="height: 4px">today</i>
              <p class="link3">Appointments</p>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Cards -->
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
            <h3 class="text-light" id="app-count"></h3>
            <h6 class="text-light">Appointments For You</h6>
          </div>
          <div>
            <img
              src="appointmenticon.png"
              alt="Avatar"
              class="avatar"
              style="float: right; margin-top: 15px; width: 50px; height: 50px; margin-left: 65px;"
            />
          </div>  
        </div>
      </div>
  
      <div
        class="card"
        style="
          width: 20rem;
          margin-left: 60px;
          margin-top: 15px;
          height: 130px;
          box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2);
          background-color: #fab31b;
        "
      >
        <div class="row" style="margin-top: 15px; margin-left:20px">
           <div style="margin-top:17px">
            <h3 class="text-light" id="patient-count"></h3>
            <h6 class="text-light">Patient Under You</h6>
          </div>
          <div>
            <img
              src="patienticon.png"
              alt="Avatar"
              class="avatar"
              style="float: right; margin-top: 15px; width: 50px; height:50px; margin-left: 96px;"
            />
          </div>  
        </div>
      </div>

      <div
        class="card"
        style="
          width: 20rem;
          margin-left: 60px;
          margin-top: 15px;
          height: 130px;
          box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2);
          background-color: #187bed;
        "
      >
        <div class="row" style="margin-top: 15px; margin-left:20px">
           <div style="margin-top:17px">
            <h3 class="text-light" id="discharge-count"></h3>
            <h6 class="text-light">Your Patients Discharged</h6>
          </div>
          <div>
            <img
              src="tick.png"
              alt="Avatar"
              class="avatar"
              style="float: right; margin-top: 15px; width: 50px; height:50px; margin-left: 47px;"
            />
          </div>  
        </div>
      </div>

    </div>
      <!-- Cards -->

      <!-- TABLE -->
    <div class="table-section">
        <div class="table-left">

           <div class="doctor-bar">
              <h6 class="text-light" style="margin-top: 5px; margin-left:200px">
               Recent Appointments Under You
             </h6> 
           </div>  
            
             <table class="doctor-table" border="1">
                <thead>
                  <tr>
                    <th>Patient Name</th>
                    <th>Description</th>
                    <th>Mobile</th>
                    <th>Address</th>
                 </tr>
              </thead>
              <?php 
                include("dbcon.php");
          
                $sql = "SELECT a.name, p.symptoms, p.mobile, p.address FROM appointments AS a 
                JOIN patient_register AS p ON a.email = p.email AND a.approve=1";
                $results = $conn->query($sql);
    
                if ($results->num_rows>0) {
                while($row = $results->fetch_assoc()) {
               ?>
              <tbody>
                 <tr>
                    <td style="font-size:13px "><?php echo $row['name']?></td>
                    <td style="font-size:13px"><?php echo $row['symptoms']?></td>   
                    <td style="font-size:13px"><?php echo $row['mobile']?></td>  
                    <td style="font-size:13px"><?php echo $row['address']?></td>  
                </tr> 
             </tbody>
             <?php			
               }
              }  
              ?>         
            </table>
         <!-- </div> -->
       </div>
    
    </div>
    <script src="doctor_dashboard.js"></script>
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
    <!-- <script src="admin-doctors.js"></script>
    <script src="admin-patient.js"></script> -->
  </body>

</html>
