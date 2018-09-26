<?

$dbconn = mysqli_connect("localhost","root","","test");
error_reporting(0);

$id = $_GET['id'];
$selectm = mysqli_query($dbconn,"select * from tbl_test_menuaccess where id = ".$id);
$getselectm = mysqli_fetch_array($selectm);
$groupname = $getselectm['groupname'];
$role = $getselectm['role'];
$menulist = $getselectm['menulist'];
$array_menu = explode(',',$menulist);
sort($array_menu);
echo "<pre>";
print_r($array_menu);
echo "</pre>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	.tbl-border{
		margin:auto;
		width:95%;
		border: 1px solid #386077;
		padding : 2%; 
	}
  </style>
</head>
<body>
  
<div class="container-fluid">
     
	<div class="tbl-border">
  <form class="" method="POST" name="_formname">
  <div class="row">
	<div class="col-sm-6">
		 <div class="form-group">
			<label for="exampleInputEmail1">Group Name</label>
			<input type="hidden" name="eid" value="<? echo $id; ?>" />
			<input type="text" name="groupname" class="form-control" value="<? echo $groupname; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Group" required>
			
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Role</label>
			<select name="selectrole" class="form-control" required>
				
				<option <? if($role == 'Admin') echo 'selected'; ?> value="Admin">Admin</option>
				<option <? if($role == 'Super Admin') echo 'selected'; ?> value="Super Admin">Super Admin</option>
				<option <? if($role == 'User') echo 'selected'; ?> value="User">User</option>
			</select>
		  </div>		
	</div>
	  <div class="col-sm-6">
	  <div class="panel panel-primary">
			<div class="panel-body">
				<center><b>Menu access</b></center>
				<label style="float:right;"><input type="checkbox" onchange="checkAll(this)">Check All/ Uncheck All</label></br>
				<div class="checkbox">
					<? 
					$coredbconn = mysqli_connect("localhost","root","","test");
					$selectmenu = mysqli_query($coredbconn,"select * from tbl_core_menu where parent = 0");
					while($resultmenu = mysqli_fetch_array($selectmenu)){
						?>
						<label><input type="checkbox" name="check_list[]" value="<? echo $resultmenu['id']; ?>" <? if(in_array($resultmenu['id'],$array_menu)) print "checked=checked"; ?>><? echo $resultmenu['label']; ?></label></br>
						<?
							$selectsubmenu = mysqli_query($coredbconn,"select * from tbl_core_menu where parent=".$resultmenu['id']);
							while($resultsubmenu = mysqli_fetch_array($selectsubmenu)){
								?>
									<label style="padding-left:50px;"><input type="checkbox" name="check_list[]" value="<? echo $resultsubmenu['id']; ?>" <? if(in_array($resultsubmenu['id'],$array_menu)) print "checked=checked"; ?>><? echo $resultsubmenu['id'],$resultsubmenu['label']; ?></label></br>
						<?
							}
						
					}
					?>
					
				</div>
			</div>
		</div>
		</div>
		<div class="col-sm-4"></div>
		
	</div>
	<center><input type="submit" value="Submit" name="submit"/></center>
	</form>
	</div>
  
  </div>
<script>
 function checkAll(ele) {
     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             // console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }
</script>
</body>
</html>