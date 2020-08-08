<?php
$connect = mysqli_connect("localhost", "root", "", "ermsdb");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM emp_details 
	WHERE emp_code LIKE '%".$search."%'
	OR emp_name LIKE '%".$search."%' 
	OR gender LIKE '".$search."%' 
	OR email LIKE '%".$search."%' 
	OR dob LIKE '%".$search."%'
	OR pan LIKE '%".$search."%'
	";
	//echo $query;
}
else
{
	$query = "
	SELECT * FROM emp_details ORDER BY ID";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table-hover table-striped table-vcenter text-nowrap mb-0">
					<thead>
						<tr>
							<th>Customer Code</th>
							<th>Customer Name</th>
							<th>Gender</th>
							<th>Email</th>
							<th>DOB</th>
							<th>Pan</th>
						</tr>
					</thead';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["emp_code"].'</td>
				<td>'.$row["emp_name"].'</td>
				<td>'.$row["gender"].'</td>
				<td>'.$row["email"].'</td>
				<td>'.$row["dob"].'</td>
				<td>'.$row["pan"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>