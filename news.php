<body>
    <div id="form">
        <form enctype="multipart/form-data" method="post">
            <input type="file" name="fileToUpload">
            <input type="submit" value="Upload File" name="submit">
            <?php
            $target_dir = "uploads/"; // Directory where the original file will be uploaded
            $thumbnail_dir = "thumbnails/"; // Directory for storing thumbnails
            
            $uploadOk = 1;

            // Check if the form was submitted
            if (isset($_POST["submit"])) {
                // Check if the fileToUpload key exists in the $_FILES array
                if (isset($_FILES["fileToUpload"])) {
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $thumbnail_file = $thumbnail_dir . "thumb_" . basename($_FILES["fileToUpload"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    // Check if the file is an actual image or a fake image
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
                        echo "<br>File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "<br>File is not an image.";
                        $uploadOk = 0;
                    }

                    // Check if file already exists
                    if (file_exists($target_file)) {
                        echo "<br>Sorry, file already exists.";
                        $uploadOk = 0;
                    }

                    // Check file size (you can adjust the file size limit as needed)
                    if ($_FILES["fileToUpload"]["size"] > 500000) {
                        echo "<br>Sorry, your file is too large.";
                        $uploadOk = 0;
                    }

                    // Allow certain file formats (in this example, allowing only image files)
                    if (
                        $imageFileType != "jpg" &&
                        $imageFileType != "jpeg"
                    ) {
                        echo "<br>Sorry, only JPG and JPEG  files are allowed.";
                        $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "<br>Sorry, your file was not uploaded.";
                    } else {
                        // Attempt to upload the file
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            echo "<br>The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

                            // Create thumbnail
                            if ($imageFileType == "jpg" || $imageFileType == "jpeg") {
                                $source_image = imagecreatefromjpeg($target_file);
                                if ($source_image !== false && $source_image !== null) {
                                    // Continue with the thumbnail creation logic
                
                                    // Calculate thumbnail dimensions (e.g., 100x100 for thumbnail size)
                                    $thumbnail_width = 720;
                                    $thumbnail_height = 480;
                                    $thumbnail_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
                                    imagecopyresampled($thumbnail_image, $source_image, 0, 0, 0, 0, $thumbnail_width, $thumbnail_height, imagesx($source_image), imagesy($source_image));
    
                                    // Save thumbnail to thumbnail directory
                                    if ($imageFileType == "jpg" || $imageFileType == "jpeg") {
                                        imagejpeg($thumbnail_image, $thumbnail_file);
                                    }
    
                                    imagedestroy($source_image);
                                    imagedestroy($thumbnail_image);
    
                                    echo "<br>Thumbnail created: <img src='$thumbnail_file'>";
                                } else {
                                    echo "<br>Error creating source image.";
                                }
                            }
                        } else {
                            echo "<br>Sorry, there was an error uploading your file.";
                        }
                    }
                } else {
                    echo "<br>Please select a file to upload.";
                }
            }
            ?>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </form>

    </div>
</body>