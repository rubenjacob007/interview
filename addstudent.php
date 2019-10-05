<?php 
include 'inc\header.php'; 
include 'lib/config.php' ;
include 'lib/mydatabase.php';
?>


<?php 

	$db=new Database();

	if(isset($_POST['submit'])){
		$id=$_POST['student_id'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$address=$_POST['address'];
    $age = $_POST['age'];
		$rows=$db->insertData($id,$name,$email,$address,$age);
		if($rows){
			header("Location: home.php");
		}
	}

 ?>

<div class="container">
	<div class="panel-heder">
	<h1>Add New Student
		<span class="pull-right"><a href="home.php">Student List</a></span>
	</h1>
</div>
</div>

<div class="container">
    <div class="panel-body">
      <form class="" action="addstudent.php" method="POST">
        <div class="form-group">
          <label for="Student_id">Student Id</label>
          <input type="text" class="form-control" name="student_id" id="student_id" required>
        </div>
        <div class="form-group">
          <label for="name">Student Name</label>
          <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" name="email" id="email" required>
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" id="address" required>
        </div>
          <div class="form-group">
      <label for="input1" class="col-sm-2 control-label">Age</label>
      <div class="col-sm-10">
        <select name="age" id="age" class="form-control">
          <option>Select Your Age</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
        </select>
      </div>
      </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" name="submit" value="Add Student">
        </div>
      </form>
    </div>
</div>