<?
$dbconn = mysqli_connect("localhost","root","","test");
error_reporting(0);
if(isset($_POST['submit'])){
		$groupname = $_POST['groupname'];
		// echo $groupname."<br>";
		$selectrole = $_POST['selectrole'];
		$check_list = implode(',',$_POST['check_list']);
		// echo sizeof($selectrole);
		// for($i=0;$i<sizeof($selectrole);$i++){
			// echo $selectrole[$i]."<br>";
		// }
		// for($i=0;$i<sizeof($check_list);$i++){
			// echo $check_list[$i]."<br>";
		// }
		if($groupname){
			// echo "INSERT INTO `tbl_test_menuaccess` (`id`, `groupname`, `role`, `menulist`) VALUES (NULL, '$groupname', '$selectrole', '$check_list');";
			$sql = mysqli_query($dbconn,"INSERT INTO `tbl_test_menuaccess` (`id`, `groupname`, `role`, `menulist`) VALUES (NULL, '$groupname', '$selectrole', '$check_list');");
			if($sql){
				echo "<script>alert('Done');</script>";
			}else{
				echo "<script>alert('Error');</script>";
			}
		}else{
				echo "<script>alert('Error');</script>";
			}
}

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
  <script type="text/javascript">
	$(document).on('click','.edit_data',function(){
		// alert('yea');
		$('#add_data_mode').modal('show');
	});
	
	$(document).on('click', '.edit_group', function () {
        var call_id = $(this).attr("id");
        $.ajax({
            url:"fetch_menuaccess.php",
            method:"POST",
			data:{call_id:call_id},
			success: function (output) {
            $('#login_for_review').html(output).modal('show');
            },
            error: function(output){
            alert("fail");
            }
        });
    });
	</script>

</head>
<body>
  <style>
	.tbl-border{
		margin:auto;
		width:95%;
		border: 1px solid #386077;
		padding : 2%; 
	}
  </style>
<div class="container-fluid">
  <h1>My First Bootstrap Page</h1>
  <p>This part is inside a .container class.</p> 
  <p>The .container class provides a responsive fixed width container.</p>           
  <div><a href="#" class="btn btn-primary btn-small edit_data">Add</a></div>
  
  <div class="modal fade" id="add_data_mode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:70% !important;" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Add Usergroup </h5>
			<span style="padding-right:50px;"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button></span>
		  </div>
		  
		  <div class="modal-body">
			<div class="tbl-border">
  <form class="" method="POST" name="_formname">
  <div class="row">
	<div class="col-sm-6">
		 <div class="form-group">
			<label for="exampleInputEmail1">Group Name</label>
			<input type="text" name="groupname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Group" required>
			
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Role</label>
			<select name="selectrole" class="form-control" required>
				<option value="">--Select--</option>
				<option value="Admin">Admin</option>
				<option value="Super Admin">Super Admin</option>
				<option value="User">User</option>
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
						<label><input type="checkbox" name="check_list[]" value="<? echo $resultmenu['id']; ?>"><? echo $resultmenu['label']; ?></label></br>
						<?
							$selectsubmenu = mysqli_query($coredbconn,"select * from tbl_core_menu where parent=".$resultmenu['id']);
							while($resultsubmenu = mysqli_fetch_array($selectsubmenu)){
								?>
									<label style="padding-left:50px;"><input type="checkbox" name="check_list[]" value="<? echo $resultsubmenu['id']; ?>"><? echo $resultsubmenu['label']; ?></label></br>
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
		</div>
	</div>
  </div>
  
	<div id="login_for_review" role="dialog">

	</div>

  <div class="table-responsive">
	<table>
		<tr>
			<th>Group Name</th>
			<th>Role</th>
			<th>Menu List</th>
		</tr>
		<?
		$dbconn = mysqli_connect("localhost","root","","test");
		$selectlist = mysqli_query($dbconn,"select * from tbl_test_menuaccess");
		while($reseuselectlist = mysqli_fetch_array($selectlist)){
			?>
			<tr>
				<td><? echo $reseuselectlist['groupname']; ?></td>
				<td><? echo $reseuselectlist['role']; ?></td>
				<td><a href="edit_menuaccess.php?id=<? echo $reseuselectlist['id']; ?>" id="<? echo $reseuselectlist['id']; ?>">Edit</a></td>
			</tr>
			<?
		}
		?>
		
	</table>
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
