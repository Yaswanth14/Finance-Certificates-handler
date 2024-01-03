<?php 
    include 'connection.php'; 

    session_start();
    if(!isset($_SESSION['USER_DATA']['username']) && empty($_SESSION['USER_DATA']['username']) && !isset($_SESSION['USER_DATA']['admin'])){
        header('location:login.html'); 
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head> 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="admin.css">
</head>

<body>
    <img src='cover.jpeg' style='min-width: 100%; height: 100px; padding: 0; margin: 0;'>
<div class="container" style="margin-top:30px">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12">
			<strong>Upload Finacial Certificates</strong>
				<form method="post" enctype="multipart/form-data">
					<?php
						// If submit button is clicked
						if (isset($_POST['submit']))
						{
						// get name from the form when submitted
						$name = $_POST['name'];	
						$year = $_POST['year'];
						$quater = $_POST['quater'];				 

						if (isset($_FILES['pdf_file']['name'])) 
						{ 
						// If the ‘pdf_file’ field has an attachment
						// $_FILES['pdf_file']['name'];
							$file_name = $name."_".$quater."_".$year.".pdf";
							$file_tmp = $_FILES['pdf_file']['tmp_name'];
							
							// Move the uploaded pdf file into the pdf folder
							move_uploaded_file($file_tmp,"C:/pdf/".$file_name);
							// Insert the submitted data from the form into the table
							$insertquery = 
							"INSERT INTO pdf_main(username,filename, quater, year) VALUES('$name','$file_name', '$quater', '$year')";
							
							// Execute insert query
							$iquery = mysqli_query($con, $insertquery);

								if ($iquery)
							{							 
					?>											 
								<div class=
								"alert alert-success alert-dismissible fade show text-center">
									<a class="close" data-dismiss="alert" aria-label="close">
									×
									</a>
									<strong>Success!</strong> Data submitted successfully.
								</div>
					<?php
								}
								else
								{
					?>
								<div class=
								"alert alert-danger alert-dismissible fade show text-center">
									<a class="close" data-dismiss="alert" aria-label="close">
									×
									</a>
									<strong>Failed!</strong> Try Again!
								</div>
					<?php
								}
							}
							else
							{
					?>
								<div class=
								"alert alert-danger alert-dismissible fade show text-center">
								<a class="close" data-dismiss="alert" aria-label="close">
									×
								</a>
								<strong>Failed!</strong> File must be uploaded in PDF format!
								</div>
					<?php
							}// end if
						}// end if
					?> 
					
					<div class="form-input py-2">
						<div class="form-group">
							<input type="text" class="form-control"
								placeholder="Enter user name" name="name">
						</div>								 
						<div class="form-group">
							<input type="file" name="pdf_file"
								class="form-control" accept=".pdf" required/>
						</div>
						<div class="form-inline">

							<div class="form-group">
								<label for="">Financial year</label>
								<select name="year" class="form-control">
									<option value="2020-21">2020-21</option>
									<option value="2021-22">2021-22</option>
									<option value="2022-23">2022-23</option>
								</select>
							</div></br></br>

							<div class="form-group">
								<label for="">Quater</label>
								<select name="quater" class="form-control">
									<option value="Q1">First Quarter (January - March)</option>
									<option value="Q2">Second Quarter (April - May)</option>
									<option value="Q3">Third Quarter (June - August)</option>
									<option value="Q4">Fourth Quarter (September - November)</option>
								</select>
							</div>
						</div></br>
						<div class="form-group">
							<input type="submit"
								class="btnRegister" name="submit" value="Submit">
						</div>
					</div>
				</form>
				<div><br><br><button><a style='text-decoration:none' href='login.html'>Logout</a></button></div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-12">
			<div class="card">
				<div class="card-header text-center">
				<h4>Records from Database</h4>
				</div>
				<div class="card-body">
				<div class="table-responsive">
					<table>
						<thead>
							<th>ID</th>
							<th>UserName</th>
							<th>FileName</th>
                            <th>Access</th>
						</thead>
						<tbody>
						<?php
							$selectQuery = "select * from pdf_main";
							$squery = mysqli_query($con, $selectQuery);

							while (($result = mysqli_fetch_assoc($squery))) {
						?>
                            <tr>
                                <td><?php echo $result['id']; ?></td>
                                <td><?php echo $result['username']; ?></td>
                                <td><a><?php echo $result['filename']; ?></a></td>
                                <td><a href="adminpdf.php?id=<?php echo $result['id']; ?>" target="_blank">GET</a></td>
                            </tr>
						<?php
							}
						?>
						</tbody>
					</table>			 
					</div>
				</div>
			</div>
		</div> 
	</div>
</body>

</html>