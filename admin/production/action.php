<?php
//action.php
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("45.114.245.106", "tataveev", "7@tA93Evd8!r9$", "db_tata_neev");
 //print_r($_POST);
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM tbl_images ORDER BY id DESC";
  $result = mysqli_query($connect, $query);
  $output = '
   <!--<table class="table table-bordered table-striped">  
    <tr>
     <th width="10%">ID</th>
     <th width="70%">Image</th>
     <th width="10%">Change</th>
     <th width="10%">Remove</th>
    </tr>-->
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <!--<tr>
     <td>'.$row["id"].'</td>
     <td>
      <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="60" width="75" class="img-thumbnail" />
     </td>
     <td><button type="button" name="update" class="btn btn-warning bt-xs update" id="'.$row["id"].'">Change</button></td>
     <td><button type="button" name="delete" class="btn btn-danger bt-xs delete" id="'.$row["id"].'">Remove</button></td>
    </tr>-->
	
	<div class="row fx-element-overlay">
			<div class="form-group">
				<div class="media">
					<div class="fx-card-item pb-0">
						<div class="fx-card-avatar fx-overlay-1 mb-0">
							<img class="align-self-start w-160"
								src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'"
								alt="user">
							<div class="fx-overlay">
								<ul class="fx-info">
									<li><a class="btn default btn-outline"
											href="#"><i
												class="ion-image"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="media-body">
						<button type="button" name="update" class="btn btn-warning bt-xs update" id="'.$row["id"].'">Change</button>
						<button type="button" name="delete" class="btn btn-danger bt-xs delete" id="'.$row["id"].'">Remove</button>
						
						<!--<button type="button" class="btn btn-default mb-5"><i
								class="fa fa-upload"></i>
							upload</button>
					</div>-->
				</div>
			</div>
		</div>
   ';
  }
  $output .= '<!--</table>-->';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query = "INSERT INTO tbl_images(name) VALUES ('$file')";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Inserted into Database';
  }
 }
 if($_POST["action"] == "update")
 {
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query = "UPDATE tbl_images SET name = '$file' WHERE id = '".$_POST["image_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Updated into Database';
  }
 }
 if($_POST["action"] == "delete")
 {
  $query = "DELETE FROM tbl_images WHERE id = '".$_POST["image_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Deleted from Database';
  }
 }
}
?>