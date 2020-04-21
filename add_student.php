<?php
session_start();
if(isset($_SESSION['email'])){
  
?>
<?php

include "connection.php";
if(isset($_POST['submit'])){
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $father_name=$_POST['father_name'];
  $mother_name=$_POST['mother_name'];
  $gender=$_POST['gender'];
  $category=$_POST['category'];
  $nationality=$_POST['nationality'];
  $dob=$_POST['dob'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $address=$_POST['address'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $pincode=$_POST['pincode'];
  $course_name=$_POST['course_name'];
  $course_year=$_POST['course_year'];

  $sql="INSERT INTO student_data (fname,lname,father_name,mother_name,gender,category,nationality,dob,email,mobile,address,state,city,pincode,course,year)
         VALUES ('$fname','$lname','$father_name','$mother_name','$gender','$category','$nationality','$dob','$email','$mobile','$address','$state','$city','$pincode','$course_name','$course_year')";

  if(mysqli_query($conn,$sql)){
    echo "<script>alert('Data Inserted Sucessfully')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }
  else{
    echo "<script>alert('Insertation Failed')</script>";
}
  



}

?>
<!DOCTYPE html>
<html lang="en">
  <head> 

    <!--Jquery-->  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>View Student Info</title>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header">
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">

        <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      </div>
      <ul class="app-menu">
        
        <li class="treeview is-expanded"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Student</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item active" href="add_student.php"><i class="icon fa fa-circle-o"></i>Add Students</a></li>
          </ul>
          <ul class="treeview-menu">
            <li><a class="treeview-item active" href="view_student_info.php"><i class="icon fa fa-circle-o"></i>View Student Info</a></li>
          </ul>
        </li>
      </ul>
      <!--course nav-->
      <ul class="app-menu">
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Course</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="add_course.php"><i class="icon fa fa-circle-o"></i>Add Course</a></li>
          </ul>
          <ul class="treeview-menu">
            <li><a class="treeview-item active" href="view_course.php"><i class="icon fa fa-circle-o"></i>View Courses</a></li>
          </ul>
        </li>
      </ul>
      <!--Course nav end-->
    </aside>
    <!--Add Student Block Start-->
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Add Student</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
             <form action="add_student.php" method="POST">
             <?php
              include "connection.php";
              $sql="SELECT * FROM courses";
              $result=mysqli_query($conn,$sql);
            ?>

              <!--Course selection-->
             <div class="form-row">
                  <div class="form-group col-md-6">
                  <label>Course</label>
                    <select class="form-control" name="course_name" required>
                      <option value="">Choose...</option>
                      <?php  while($rows=mysqli_fetch_assoc($result)){ ?>
                      <option value="<?php echo $rows['course_name'];?>"><?php echo $rows['course_name'];?></option>
                      <?php
                        }
                      ?>
                     
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                  <label for="inputState">Course Yr.</label>
                    <select id="inputState" class="form-control" name="course_year" required>
                      <option value="">Choose...</option>
                      <option value="First Yr.">First Year</option>
                      <option value="Second Yr.">Second Year</option>
                      <option value="Third Yr.">Third Year</option>
                    </select> 
                  </div> 
                </div>
                <!--Basic detail-->
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>First Name</label>
                    <input type="text" class="form-control" id="" placeholder="Enter First Name" name="fname" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Last Name</label>
                    <input type="text" class="form-control" id="" placeholder="Enter Last Name" name="lname" required>
                  </div> 
                </div>
                <div class="form-row">
                  <div class="form-check col-md-3">
                     <fieldset class="form-group">
                            <div class="row">
                              <legend class="col-form-label col-sm-3 pt-0">Gender</legend>
                              <div class="col-sm-10">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" value="Male" required>
                                  <label class="form-check-label">
                                    Male
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" value="Female">
                                  <label class="form-check-label">
                                    Female
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gender" value="Other">
                                  <label class="form-check-label">
                                    Other
                                  </label>
                                </div> 
                              </div>
                            </div>
                        </fieldset>
                  </div>
                  <div class="form-check col-md-3">
                     <fieldset class="form-group">
                            <div class="row">
                              <legend class="col-form-label col-sm-3 pt-0">Nationality</legend>
                              <div class="col-sm-10">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="nationality" value="Indian" required>
                                  <label class="form-check-label">
                                    Indian
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="nationality" value="Other">
                                  <label class="form-check-label">
                                    Other
                                  </label>
                                </div>
                              </div>
                            </div>
                        </fieldset>
                  </div>
                  <div class="form-group col-md-3">
                        <fieldset class="form-group">
                            <div class="row">
                              <legend class="col-form-label col-sm-3 pt-0">Category</legend>
                              <div class="col-sm-10">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="category" value="SC" required>
                                  <label class="form-check-label">
                                    SC
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="category" value="ST">
                                  <label class="form-check-label">
                                    ST
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="category" value="OBC">
                                  <label class="form-check-label">
                                    OBC
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="category" value="General">
                                  <label class="form-check-label">
                                    General
                                  </label>
                                </div>
                              </div>
                            </div>
                        </fieldset>
                  </div> 
                  <div class="form-group col-md-3">
                    <div class="form-group">
                        <label>DOB</label>
                          <input class="form-control" type="date" name="dob" id="" required>
                  </div>
                </div>

                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Father Name</label>
                    <input type="text" class="form-control" id="" placeholder="Enter Father Name" name="father_name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Mother Name</label>
                    <input type="text" class="form-control" id="" placeholder="Enter Mother Name" name="mother_name" required>
                  </div> 
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Mobile no.</label>
                    <input type="text" class="form-control" id="" placeholder="Enter Mobile No." name="mobile" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="text" class="form-control" id="" placeholder="Enter Email" name="email" required>
                  </div> 
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="" placeholder="Address" name="address">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="" name="city">
                  </div>
                  <?php
                  include "connection.php";
                  $sql="SELECT * FROM states";
                  $result=mysqli_query($conn,$sql);
                  ?>
                  <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control" name="state">
                      <option selected>Choose...</option>
                      <?php  while($rows=mysqli_fetch_assoc($result)){ ?>
                      <option value="<?php echo $rows['state_name'];?>"><?php echo $rows['state_name'];?></option>
                      <?php
                        }
                      ?>
                     
                    </select>
                  </div>

                  
                  <div class="form-group col-md-2">
                    <label>Pin Code</label>
                    <input type="text" class="form-control" id="" name="pincode">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>  
          </div>
        </div>
      </div>
    </main>
    
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
  </body>
</html>

<?php
}
else{
  header('location:adminlogin.php');
}


?>