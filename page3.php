<?php
  session_start();
  if($_SESSION['email']=="" || $_SESSION['role']!="Patient"){
    header("location:login.php");
  }
?>
<html lang="en">
<head>
  <title>Patient</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script src="js/Chart.min.js"></script>
  <link rel="stylesheet" href="page2.css">
  <link href="font-awesome.css" rel="stylesheet"/>
  <link rel="stylesheet" href="css/addacc.css"></link>
  <style>
.sidebar-nav ul{
  display: none;
}
.tap{

}
.sidebar-nav li.tap ul{
  display: block;
}
.sidebar-nav .subarrow:after{
  content: '\203A';
  float: right;
  margin-right: 20px;
  font-size: 20px;
  margin-top: -8px;
  transform: rotate(90deg);
}
.sidebar-nav li.tap .subarrow:after{
  content:'\2039';
}
i{
  padding-right: 15px;
  font-size: 25px;
}
.i_fa{
    padding-top: 7px;
    position: absolute;
    margin-right: 20px;
    font-size: 25px;
    margin-left: -5px;
}
.spanfa{
  margin-left: 50px;
}
.fadiv{
  float: left;
  z-index: 1;
  padding-left: 0px;
}
.bullets{
  padding-left: 55px;
}
.setting-tab{
    text-align: right;
    float: right;
}
.bbtm{
  border-bottom-style: solid;
  padding-bottom: 10px;
  border-width: 0.2px;
  border-bottom-color: aqua;
  margin-right: 40px;
  background-color: #fff;
}
.header-icon{
    float: left;
    padding: 20px;
    color: blueviolet;
    font-size: 60px;
    line-height: 60px;
}
.header-title{
    padding: 5px 0px 5px 10px;
    height: 100px;
    margin-left: 100px;
}
.identity{
    font-family: cursive;
    padding-bottom: 20px;
    color: aquamarine;
    width: 250px;
    text-align: center;
    padding-top: 180px;
    font-size: 15px;
}
#dl{
  display: none;
}
#dol{
  display: none;
}
#a{
  display: none;
}
#al{
  display: none;
}
#el{
	display: none;
}
</style>
</head>
<body id="body" style="margin-top: 0px; overflow-x: hidden;">
  <div id="wrapper">
    <!--sidebar-->
    <div id="sidebar-wrapper">
      <div class="identity">
          <?php
            echo $_SESSION['email'];
            echo "<br>";
            echo $_SESSION['role'];
          ?>
        </div>
      <ul class="sidebar-nav">
        <li ><a href="javascript:dl()">
          <i class="fa fa-hospital-o i_fa" aria-hidden="true"></i>
          <span class="spanfa">Department List</span>
        </li>
        <li ><a href="javascript:dol()">
          <i class="fa fa-user-md i_fa" aria-hidden="true"></i>
          <span class="spanfa" >Doctor List</span>
        </li>
        <li class="hassub"><a href="javascript://">
          <i class="fa fa-pencil-square-o i_fa" aria-hidden="true"></i>
          <span class="spanfa" >Appointment</span>
          <span class="subarrow"></span>
          <ul style="list-style-type: none;padding: 0;">
                <li><a class="bullets" href="javascript:a()">Add Appointment</a></li>
                <li><a class="bullets" href="javascript:al()">Appointment List</a></li>
              </ul>
        </li>
        <li class="hassub"><a href="javascript://">
          <i class="fa fa-pencil-square-o i_fa" aria-hidden="true"></i>
          <span class="spanfa" >Enquiry</span>
          <span class="subarrow"></span>
          <ul style="list-style-type: none;padding: 0;">
                <li><a class="bullets" href="page3.php">Add Enquiry</a></li>
                <li><a class="bullets" href="javascript:el()">Enquiry List</a></li>
              </ul>
        </li>
      </ul>
    </div>
    <!-- container-->
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <div class="row bbtm" style="margin-top: -15px;padding-top: 15px;margin-right: 10px;">
          <div class="col-lg-12">
            <a href="#" class="btn btn-primary" id="menu-toggle">Toggle Menu</a>
            <div class="dropdown" style="padding-right: 20px;float: right;">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Settings
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="logout.php">LogOut</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div id="change">
        	<div id="e">
        		<div class="row bbtm">
                  <div class="col-lg-12">
                    <div class="header-icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                      <div class="header-title">
                        <h1>Enquiry</h1>
                        <small>Add Enquiry</small>
                      </div>
                  </div>
                </div>
                <div class="container-fluid relative" style="margin-top: 10px;margin-right: 30px;">
	                <form class="form-horizontal">
		                <input type="hidden" id="email-enquiry" value="<?php echo $_SESSION['email'];?>">
		                <input type="hidden" id="mobile-enquiry" value="<?php
		                						require("connection.php");
					                            $s=$_SESSION['email'];
					                            $str="select mobile from patient where email='$s'";
					                            $result= mysqli_query($con, $str);
					                            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
												$mobile=$row['mobile'];
		                						echo $mobile;
		                					?>">
		                <input type="hidden" id="name-enquiry" value="<?php
		                						require("connection.php");
					                            $s=$_SESSION['email'];
					                            $str="select firstname from patient where email='$s'";
					                            $result= mysqli_query($con, $str);
					                            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
												$firstname=$row['firstname'];
		                						echo $firstname;
		                					?>">
	                    <div class="form-group">
	                      <label for="date-enquiry" class="col-sm-2 control-label">Date</label>
	                        <div class="col-sm-10">
	                          <input type="date" class="form-control" id="date-enquiry" name="apt-date" />
	                        </div>
	                    </div>
	                    <div class="form-group">
	                      <label for="enquiry" class="col-sm-2 control-label">Enquiry</label>
	                        <div class="col-sm-10">
	                          <textarea rows="4" class="form-control" id="enquiry" placeholder="Enquiry" style="padding-left:5px;"></textarea>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-sm-offset-2 col-sm-10">
	                              <input type="reset" value="Reset" class="btn button cursor" style="vertical-align: baseline;">
	                              <input type="button" id="enquiry-btn" value="Save" class="btn btn1 cursor"  style="vertical-align: baseline;">
	                            <input type="button" disabled value="or" class="btn2">
	                        </div>
	                    </div>
                  	</form>
                </div>
            </div>
          	<div id="el">
	            <div class="row bbtm">
	                <div class="col-lg-12">
	                  <div class="header-icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
	                    <div class="header-title">
	                      <h1>Enquiry</h1>
	                      <small>Enquiry List</small>
	                    </div>
	                </div>
	            </div>
            	<div class="container-fluid relative" style="margin-top: 10px;margin-right: 30px;">
	                <div class="row" id="viewall" style="padding-right: 30px;padding-left: 10px;">
	                      	<?php
	                            require("connection.php");
	                            $s=$_SESSION['email'];
	                            $str="select * from enquiry where email='$s'";
	                            $result= mysqli_query($con, $str);
                              $s=1;
	                      	?>
	                      	<table class="table table-hover">
	                          <thead>
	                            <tr>
	                              <th>Serial No.</th>
	                              <th>Date</th>
	                              <th>Enquiry</th>
	                          </tr>
	                          </thead>
	                          <tbody>
	                          <?php
	                          while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
	                              echo "<tr>";
	                              echo "<td>".$s."</td>";
	                              echo "<td>".$row['date']."</td>";
	                              echo "<td>".$row['enquiry']."</td>";
                                $s++;
	                          }
	                          ?>
	                          </tbody>
	                        </table>
	                </div>
                </div>
            </div>
            <div id="dl">
                <div class="row bbtm">
                  <div class="col-lg-12">
                    <div class="header-icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                      <div class="header-title">
                        <h1>Department List</h1>
                      </div>
                  </div>
                </div>
                <div class="container-fluid relative" style="margin-top: 10px;margin-right: 30px;">
                  <div class="row" id="viewall" style="padding-right: 30px;padding-left: 10px;">
                      <?php
                              require("connection.php");
                              $str="select * from department;";
                              $result= mysqli_query($con, $str);
                              echo "dev";
                              $s=1;
                      ?>
                      <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Serial No.</th>
                              <th>Department Name</th>
                              <th>Description</th>
                              <th>Status</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php
                          while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
                              echo "<tr>";
                              echo "<td>".$s."</td>";
                              echo "<td>".$row['dname']."</td>";
                              echo "<td>".$row['description']."</td>";
                              echo "<td>".$row['status']."</td>";
                              $s++;
                          }
                          ?>
                          </tbody>
                        </table>
                  </div>
                </div>
            </div>
            <div id="dol">
                <div class="row bbtm">
                  <div class="col-lg-12">
                    <div class="header-icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                      <div class="header-title">
                        <h1>Doctor List</h1>
                      </div>
                  </div>
                </div>
                <div class="container-fluid relative" style="margin-top: 10px;margin-right: 30px;">
                  <div class="row" id="viewall" style="padding-right: 30px;padding-left: 10px;">
                       <?php
                            require("connection.php");
                            $str="select * from doctor";
                            $result= mysqli_query($con, $str);
                            $s=1;
                    ?>
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Serial No.</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Email Address</th>
                            <th>Mobile No</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            echo "<tr>";
                            echo "<td>".$s."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['department']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['mobile']."</td>";
                            echo "<td>".$row['status']."</td>";
                            $s++;
                        }
                        ?>
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
            <div id="a">
                <div class="row bbtm">
                  <div class="col-lg-12">
                    <div class="header-icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                      <div class="header-title">
                        <h1>Appointment</h1>
                        <small>Add Appointment</small>
                      </div>
                  </div>
                </div>
                <div class="container-fluid relative" style="margin-top: 10px;margin-right: 30px;">

                  <form class="form-horizontal">
                  <input type="hidden" id="email-apt" name="email-apt" value="<?php echo $_SESSION['email'];?>">
                    <div class="form-group">
                        <label for="dpt-apt" class="col-sm-2 control-label">Department Name</label>
                        <div class="col-sm-10">
                          <select name="dpt-apt" class="form-control" id="dpt-apt">
                                  <option value="" selected="selected">Select Department</option>
                                    <?php
                                      require("connection.php");
                                      $str="select dname from department where status='active' order by dname;";
                                      $result= mysqli_query($con, $str);
                                      while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                          //alert($row['dname']);
                                          echo "<option value=".$row['dname'].">".$row['dname']."</option>";
                                        }
                                    ?>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dname" class="col-sm-2 control-label">Doctor Name</label>
                        <div class="col-sm-10">
                          <select name="doc-apt" class="form-control" id="dname">
                                  <option value="" selected="selected">Select Doctor</option>
                                  <?php
                                  require("connection.php");
                                  $str="select name from doctor where status='active' order by name;";
                                  $result= mysqli_query($con, $str);
                                  while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                      //alert($row['name']);
                                      echo "<option value=".$row['name'].">".$row['name']."</option>";
                                    }
                                ?>
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="apt-date" class="col-sm-2 control-label">Appointment Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="apt-date" name="apt-date" />
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="prob-apt" class="col-sm-2 control-label">Problem</label>
                        <div class="col-sm-10">
                          <textarea rows="4" class="form-control" id="prob-apt" placeholder="Problem" style="padding-left:5px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                              <input type="reset" value="Reset" class="btn button cursor" style="vertical-align: baseline;">
                              <input type="button" id="apt-front-btn" value="Save" class="btn btn1 cursor"  style="vertical-align: baseline;">
                            <input type="button" disabled value="or" class="btn2">
                        </div>
                    </div>
                  </form>
                </div>
            </div>
            <div id="al">
                <div class="row bbtm">
                  <div class="col-lg-12">
                    <div class="header-icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                      <div class="header-title">
                        <h1>Appointment</h1>
                        <small>Appointment List</small>
                      </div>
                  </div>
                </div>
                    <div class="container-fluid relative" style="margin-top: 10px;margin-right: 30px;">
                  <div class="row" style="padding-right: 30px;padding-left: 10px;">
                      <?php
                            require("connection.php");
                            $s=$_SESSION['email'];
                            $str2="select id from patient where email='$s'";
              							$res=mysqli_query($con,$str2);
              							$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
              							$pid=$row['id'];
                            $str="SELECT * FROM `appointment` where pid=$pid ORDER by date DESC LIMIT 15";
                            $result= mysqli_query($con, $str);
                            $s=1;
                    ?>
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Serial No.</th>
                            <th>Department Name</th>
                            <th>Doctor Name</th>
                            <th>Date</th>
                            <th>Problem</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            echo "<tr>";
                            echo "<td>".$s."</td>";
                            echo "<td>".$row['dname']."</td>";
                            echo "<td>".$row['doctor']."</td>";
                            echo "<td>".$row['date']."</td>";
                            echo "<td>".$row['problem']."</td>";
                            $s++;
                        }
                        ?>
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
          </div>
      </div>
    </div>
  </div>
  <script>
    $('#menu-toggle').click(function(e){
      e.preventDefault();
      $('#wrapper').toggleClass('menuDisplayed');
    });
  </script>
  <script>
  $(document).ready(function(e){
    $('.hassub').click(function () {
      $(this).toggleClass("tap");
    });
  });
  </script>
  <script>
    function dl(){
      document.getElementById('dl').style.display="block";
      document.getElementById('e').style.display="none";
      document.getElementById('dol').style.display="none";
      document.getElementById('a').style.display="none";
      document.getElementById('al').style.display="none";
      document.getElementById('el').style.display="none";
    }
    function dol(){
      document.getElementById('dol').style.display="block";
      document.getElementById('e').style.display="none";
      document.getElementById('dl').style.display="none";
      document.getElementById('a').style.display="none";
      document.getElementById('al').style.display="none";
      document.getElementById('el').style.display="none";
    }
    function a(){
      //alert();
      document.getElementById('a').style.display="block";
      document.getElementById('e').style.display="none";
      document.getElementById('dl').style.display="none";
      document.getElementById('dol').style.display="none";
      document.getElementById('al').style.display="none";
      document.getElementById('el').style.display="none";

    }
    function al(){
      document.getElementById('al').style.display="block";
      document.getElementById('e').style.display="none";
      document.getElementById('dl').style.display="none";
      document.getElementById('dol').style.display="none";
      document.getElementById('a').style.display="none";
      document.getElementById('el').style.display="none";
    }
    function el(){
    	document.getElementById('el').style.display="block";
     	document.getElementById('e').style.display="none";
      	document.getElementById('dl').style.display="none";
      	document.getElementById('dol').style.display="none";
      	document.getElementById('a').style.display="none";
      	document.getElementById('al').style.display="none";
    }
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#apt-front-btn').click(function(){
          var email=document.getElementById("email-apt").value;
          var dname=document.getElementById("dpt-apt").value;
          var doctor=document.getElementById("dname").value;
          var adate=document.getElementById("apt-date").value;
          var prob=document.getElementById("prob-apt").value;
          $.post("apt-front-submit.php",{"email":email,"dname":dname,"doctor":doctor,"adate":adate,"prob":prob},function(data){
              alert(data);
              $("#dpt-apt").val("");
              $("#dname").val("");
              $("#apt-date").val("");
              $("#prob-apt").val("");
          });
      });
    });
  </script>
  <script>
  	$(document).ready(function(){
      $('#enquiry-btn').click(function(){
          var email=document.getElementById("email-enquiry").value;
          var mobile=document.getElementById("mobile-enquiry").value;
          var name=document.getElementById("name-enquiry").value;
          var enquiry=document.getElementById("enquiry").value;
          var date=document.getElementById("date-enquiry").value;
          console.log(date)
          $.post("enquiry.php",{"email":email,"name":name,"mobile":mobile,"date":date,"enquiry":enquiry},function(data){
              alert(data);
              $("#date-enquiry").val("");
              $("#enquiry").val("");
          });
      });
    });
  </script>
</body>
