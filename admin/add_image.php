<?php
include("header.php");
$result = mysqli_query($con, "SELECT * FROM students WHERE image='' ");
$num_row = mysqli_num_rows($result);
echo $num_row;


if(isset($_POST["submit"])){
    if(!empty($_FILES["image"]["name"])){

        // destinatin folder for uploaded images
        $upload_dir = "uploads/";

        // checking if the folder exists and creating it if not
        if(!file_exists($upload_dir)){
            echo "CREATING FOLDER.....";
            $dir_created = mkdir($upload_dir);
            if($dir_created){
                echo "DIRECTORY CREATEAD SUCCESFULLY";
            }
        }

        $accepted_extensions = array('jpg', 'png', 'jpeg', 'webp');
        $file_name = $_FILES["image"]["name"];
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

        // selecting the destination to store the file contents.
        $dest_location = $upload_dir.$file_name;

        // checking if the file extension is allowed format
        if(in_array($file_extension, $accepted_extensions)){
            
            // getting image location
            $img_temp_path = $_FILES["image"]["tmp_name"];

            // getting the contents of the image and store in variable.
            $uploaded = move_uploaded_file($img_temp_path, $dest_location);
            
            if($uploaded){
            // addint the image contents to the database
            $result = mysqli_query($con, "INSERT INTO images(image) VALUES('$dest_location')") or die("FAILED TO ADD IMAGE TO THE DATABASE".mysqli_error($con));
            if($result){
                echo "IMAGE ADDED TO THE DATABASE";
            }
        }else{
            echo "SOMETHING WENT WRONG";
        }

        }else{
            echo "THIS FILE FORMAT IS NOT ALLOWED";
        }
    }
  
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h5>images from database</h5>
    <?php
        $result = mysqli_query($con, "SELECT * FROM images") or die(mysqli_error($con));
        
        while($row = mysqli_fetch_array($result)){ ?>
            <img src="<?php echo $row['image'] ?>" /> 
        <?php } ?>
 
    <form action="add_image.php" method="post" enctype="multipart/form-data">
        <label for="">Upload Image</label>
        <input type="file" name="image">
        <input type="submit" name="submit" value="SUBMIT">
    </form>


</body>
</html>