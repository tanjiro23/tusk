<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Upload</title>
</head>
<body>
    <?php
    $target = "images/";
    $imgname = $_FILES['uploadedfile']['name'];
    $tot_count = count($imgname);
    $count = 0;
   
    if($tot_count>10){
        echo "Cannot Uploads more than 10 files <br>    ";
        echo "<a href='javascript:history.go(-1)'>GO BACK</a>";
    }
    else {  
        $flag = 1;
        // Iterating over Images and checking conditions
        foreach($imgname as $filename) {
            
            $type = $_FILES['uploadedfile']['type'][$count];
            $init_path = $_FILES['uploadedfile']['tmp_name'][$count];
            $size = $_FILES['uploadedfile']['size'][$count];
            
            if($type !== "image/jpeg") {
                echo "Uploaded file is not .jpg format <br/><br/>" ;
                $flag=0;
                break;
            }
            else if($size >= 200000) {
                $flag=0;
                echo "Size exceeds 200kb";
                break;
            }
            else {
                move_uploaded_file($init_path,$target.$filename);
  
            }
            $count++;
        }
        if($flag===1){
            echo "Image upload Succesfull<br/><br/>";
            echo "<a href='newupload.php'>Click To Delete Images or View Album</a>";
        }
        else{
            echo "<a href='javascript:history.go(-1)'>Go Back and Upload Images</a>";
        }
    }
    ?>
</body>
</html>