<?php
    require 'db.inc.php';


    if (isset($_POST['title'])) {
        $title=$_POST['title'];
        $picture=$_FILES['picture'];

        $pictureName=rand(1000, 10000).".".$picture['name'];

        $pictureTemp=$picture['tmp_name'];

        move_uploaded_file($pictureTemp, "uploadedimages/".$pictureName);

        $query="INSERT INTO image(title , image) values('$title', '$pictureName')";
        $result=mysqli_query($connection, $query);
        if (!$result) {
            die("Error in Query".mysqli_error());
        } else {
            header("location:index.html?Success");
        }

    }
?>


    <?php

    if (isset($_POST['view'])) {
        

// Get images from the database
        $query = "SELECT * FROM image ORDER BY id DESC";
        $result=mysqli_query($connection, $query);
            if (!$result) {
                die("Error in Query".mysqli_error());
            }
        while ($row=mysqli_fetch_array($result)) {

            
            $imageURL = 'uploadedimages/'.$row["image"];
            // echo $imageURL.'<br>';

    ?>
        <style>
            img{
                width: 400px;
                height: 400px;
            }
        </style>

    <img src="<?php echo $imageURL; ?>" alt="What" />


    <?php
        }
    }
    ?>
