<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html ng-app="crudApp" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Recommendation Hub</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- Include main CSS -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Include jQuery library -->
<script src="js/jQuery/jquery.min.js"></script>
<!-- Include AngularJS library -->
<script src="lib/angular/angular.min.js"></script>
<!-- Include Bootstrap Javascript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo $userRow['first_name']; ?>&nbsp; 
                         <?php echo $userRow['last_name']; ?>
                    </div>
                    <div class="profile-usertitle-job">
                        Developer
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">Follow</button>
                    <button type="button" class="btn btn-danger btn-sm">Message</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                            <i class="glyphicon glyphicon-home"></i>
                            Overview </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="glyphicon glyphicon-user"></i>
                            Account Settings </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                            <i class="glyphicon glyphicon-ok"></i>
                            Tasks </a>
                        </li>
                        <li>
                            <a href="logout.php?logout">
                            <i class="glyphicon glyphicon-flag"></i>
                            Sign Out</a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-12">
<div class="profile-content">
<div class="container wrapper" ng-controller="DbController">
<!-- <div>Howdy! <?php echo $userRow['username']; ?>&nbsp;<br>
         <a href="logout.php?logout">Sign Out</a></div> -->
<nav class="navbar navbar-default">
<div class="navbar-header">
<div class="alert alert-default navbar-brand search-box">
<button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()">Add Recommendation <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
</div>
<div class="alert alert-default input-group search-box">
	<span class="input-group-btn">
<select class="form-control" ng-model="col">
                                    <option value="emp_date">Date</option>
                                    <option value="emp_firstbin">Recommender's Name</option>
                                    <option value="emp_countries">Recommender's Organization</option>
                                    <option value="emp_demos">Recommender's Email</option>
                                    <option value="description">Recommender's Number</option>
                                    <option value="notes">Additional Notes</option>
                                </select>
        Search: <input type="text" class="form-control" placeholder="Search Record Details" ng-model="searchWord[col]"/>   
</span>
       </div>
</div>
</nav>
<div class="col-md-6 col-md-offset-3">

<!-- Include form template which is used to insert data into database -->
<div ng-include src="'templates/form.html'"></div>

<!-- Include form template which is used to edit and update data into database -->
<div ng-include src="'templates/editForm.html'"></div>
</div>
<div class="clearfix"></div>

<!-- Table to show employee detalis -->
<div class="table-responsive">
<table class="table table-hover">
<tr>
<th>Record ID</th>
<th>Recommender's Name</th>
<th>Recommender's Organization</th>
<th>Recommender's Position</th>
<th>Relationship Recommendation</th>
<th>Recommender's Email</th>
<th>Recommender's Number</th>
<th>Any Notes?</th>
<th></th>
<th></th>
</tr>
<tr ng-repeat="detail in details| filter:searchWord">
<td>
<span>{{detail.emp_id}}</span></td>
<td>{{detail.emp_date}}</td>
<td>{{detail.emp_firstbin}}</td>
<td>{{detail.emp_countries}}</td>
<td>{{detail.emp_demos}}</td>
<td>{{detail.description}}</td>
<td>{{detail.notes}}</td>
<td>
<button class="btn btn-primary" ng-click="deleteInfo(detail)" title="Send"><span class="glyphicon glyphicon-send"></span></button>
</td>
<td>
<button class="btn btn-warning" ng-click="editInfo(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
</td>
<td>
<button class="btn btn-danger" ng-click="deleteInfo(detail)" title="Delete"><span class="glyphicon glyphicon-trash"></span></button>
</td>
</tr>
</table>
</div>
</div>
</div>

    </div>
        </div>
    </div>
</div>
<!-- Include controller -->
<script src="js/angular-script.js"></script>

            
        
</body>
</html>