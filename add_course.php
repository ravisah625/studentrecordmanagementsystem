<?php
session_start();
if(isset($_SESSION['email'])){
  
?>
<?php

include "connection.php";
if(isset($_POST['submit'])){
  $course_name=$_POST['course_name'];
  

  $sql="INSERT INTO courses (course_name) VALUES ('$course_name')";

  if(mysqli_query($conn,$sql)){
    //echo "<script>alert('Course Added Sucessfully')</script>";
    echo "<script>window.open('view_course.php','_self')</script>";
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
          <h1><i class="fa fa-edit"></i>Add Course</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <form class="form-inline" action="add_course.php" method="post">
            <div class="form-group">
              <label><b>Enter Course Name:</b> </label>
              <input type="text" class="form-control" name="course_name">
            </div>
            &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary" name="submit">Submit</button>
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