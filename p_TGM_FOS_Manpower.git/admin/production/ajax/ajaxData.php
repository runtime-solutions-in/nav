<?php


//Database credentials
$dbHost     = '45.114.245.106';
$dbUsername = 'tataveev';
$dbPassword = '7@tA93Evd8!r9$';
$dbName     = 'db_tata_neev';

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}



if(!empty($_POST["type_id"] == 'Product')){
    //Fetch all state data
    $query = $db->query("SELECT * FROM __masterproduct");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //State option list
    if($rowCount > 0){
        echo '<option value="">Select Product ID</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['fld_id'].'">'.$row['fld_id'].'-'.$row['fld_productname'].'</option>';
        }
    }else{
        echo '<option value="">Product not available</option>';
    }
}elseif(!empty($_POST["type_id"] == 'Video')){
    //Fetch all city data
    $query = $db->query("SELECT * FROM __videos");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //City option list
    if($rowCount > 0){
        echo '<option value="">Select Video ID</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['fld_id'].'">'.$row['fld_id'].'-'.$row['fld_videoTitle'].'</option>';
        }
    }else{
        echo '<option value="">Video not available</option>';
    }
}elseif(!empty($_POST["type_id"] == 'Noticeboard')){
    //Fetch all city data
    $query = $db->query("SELECT * FROM __notice");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //City option list
    if($rowCount > 0){
        echo '<option value="">Select Notice ID</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['fld_id'].'">'.$row['fld_id'].'-'.$row['fld_nName'].'</option>';
        }
    }else{
        echo '<option value="">Notice not available</option>';
    }
}
?>