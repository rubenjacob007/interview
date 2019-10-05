<?php 
include 'inc\header.php'; 
include 'lib/config.php' ;
include 'lib/mydatabase.php';
?>


<?php 

  $id=$_GET['id'];
	$db=new Database();

	if(isset($_POST['submit'])){
		$id=$_POST['student_id'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$address=$_POST['address'];
    $age  = $_POST['age'];

		$rows=$db->updateStudentData($id,$name,$email,$address,$age);
		if($rows){
			header("Location: home.php");
		}
	}

  $result=$db->getStudentData($id);




 ?>

<div class="container">
	<div class="panel-heder">
	<h1>Edit Student Profile
		<span class="pull-right"><a href="home.php">Student List</a></span>
	</h1>
</div>
</div>

<div class="container">
    <div class="panel-body">
      <form class="" action="editstudent.php" method="POST">
          <?php if($result) { ?>
          <?php while ($row=$result->fetch_assoc()) { ?>
        <div class="form-group">
          <label for="Student_id">Student Id</label>
          <input type="text" class="form-control" name="student_id" id="student_id" value="<?php echo $row['id'] ?>">
        </div>
        <div class="form-group">
          <label for="name">Student Name</label>
          <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name'] ?>">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" name="email" id="email" value="<?php echo $row['email'] ?>">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" id="address" value="<?php echo $row['address'] ?>">
        </div>

  <div class="form-group">
  <label for="input1" class="col-sm-2 control-label">Age</label>
  <div class="col-sm-10">
    <select name="age" class="form-control">
      <option>Select Your Age</option>
      <option value="20" <?php if($row['age'] == '20'){ echo "selected";} ?>>20</option>
      <option value="21" <?php if($row['age'] == '21'){ echo "selected";} ?>>21</option>
      <option value="22" <?php if($row['age'] == '22'){ echo "selected";} ?>>22</option>
      <option value="23" <?php if($row['age'] == '23'){ echo "selected";} ?> >23</option>
      <option value="24" <?php if($row['age'] == '24'){ echo "selected";} ?>>24</option>
      <option value="25" <?php if($row['age'] == '25'){ echo "selected";} ?>>25</option>
    </select>
  </div>
  </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" name="submit" value="Save">
        </div>
                <?php } ?>
        <?php } ?>
      </form>
    </div>
</div>

<?php include 'inc\footer.php' ?>