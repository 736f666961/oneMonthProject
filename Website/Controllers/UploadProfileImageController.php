<?php 
    session_start();

    // Import database
    require_once("../database/Connection.php");

    class Upload{
        // Where image will store
        private $target_dir = "../uploads/usersImages/";
        private $file;
        private $target_file;
        private $imageFileType;
        private $connection;

        // Check Image Method
        public function checkImage(){    
            if ($this->checkImageExtension()){
                $this->uploadImage();
                // echo "\nAccepted !";
            }else{
                exit("exit ...!");
            }
        }
        
        // Upload Image Method
        private function uploadImage(){
            $this->file = $_FILES["fileToUpload"];
            $this->target_file = $this->target_dir . basename($this->file["name"]);

            $directory = $this->target_dir . $_COOKIE['user_id'];
            // echo $directory;

            // Rename uploaded image
            $ext = strtolower(pathinfo($this->file["name"], PATHINFO_EXTENSION));
            $newName = str_replace($this->file['name'], time() . '.' . $ext, $this->file['name']);

            // echo "Extension: " . $ext . "\n";
            // echo "Oldname: " . $this->file['name'] . "\n";
            // echo "Newname: " . $newName . "\n";
            // echo "Directory: " . $directory . "\n";

            if(file_exists($directory)){
                // echo "File exits: " . $directory . "\n";
                if (move_uploaded_file( $this->file["tmp_name"], $directory . "/" . $newName)) {
                    // echo "1 - 0 - The file ". $directory . "/" . $newName . " has been uploaded.\n";
                    $_SESSION['profile-image'] = $directory . "/" . $newName;

                    // Get id where to update image
                    $id = $_SESSION['user_id'];

                    // Path to image
                    $img = $directory . "/" . $newName;

                    // Update image in database
                    $sql = "UPDATE users SET image='$img' WHERE user_id='$id';";
                    // echo $sql . "\n";

                    // Connect to my database
                    $this->connection = new Connection();
                    
                    // Update image in database
                    mysqli_query($this->connection->__construct(), $sql);

                    // Update session and cookies
                    $_SESSION['user-image'] = $img;
                    setcookie('user-image', $img, time() + 31536000, "/");

                    // Current image
                    // echo "Current Image: " . $img . '\n';
                    // Update comments user image if they are exists
                    $comments = "SELECT * FROM comments WHERE comment_user_id=$id";
                    // echo $comments . "\n";
                    $exeCom = mysqli_query($this->connection->__construct(), $comments);
                    if (mysqli_num_rows($exeCom) > 0){
                        // Update comments image in database
                        $sql = "UPDATE comments SET comment_owner_image='$img' WHERE comment_user_id='$id';";
                        mysqli_query($this->connection->__construct(), $sql);
                        // echo "If - If - " . $sql . "\n";

                        // Delete all user images except the current one
                        $directory = "../uploads/usersImages/" . $_SESSION['user_id'];
                        $currentImage = basename($img);
                        $files = scandir($directory);

                        for ($i = 0; $i < count($files); $i++){
                            if ($files[$i] != $currentImage && !(is_dir($files[$i]))){
                                // echo "Delete this image : " . $directory . "/" . basename($files[$i]) . "\n";
                                unlink($directory . "/" . basename($files[$i]));
                            }
                        }

                    }else{
                        // echo "Else: User-image with session: " . $img . "\n";
                        // echo "Else: User-id with session: " . $_SESSION['user_id'] . "\n";
                        if (mysqli_num_rows($exeCom) > 0){
                            // Update comments image in database
                            $sql = "UPDATE comments SET comment_owner_image='$img' WHERE comment_user_id='$id';";
                            mysqli_query($this->connection->__construct(), $sql);
                            // echo "If - Nwq: " . $sql;
                            // echo "New user-image session: " . $_SESSION['user-image'];
                            // echo "Else - If - " . $sql . "\n";
                        }
                    }

                    // echo "1 - 0 - User-image session: " . $_SESSION['user-image'];

                    // close connection
                    $this->connection->__construct()->close();
                    
                    // echo "1 - 0 - Prfile-image session value : " . $_SESSION['profile-image'] . "\n";
                    return true;
                }else {
                    // echo "\n2 - 0 - Sorry, there was an error uploading your file.\n<br>";
                    // echo "2 - 0 - Prfile-image session value : " . $_SESSION['profile-image'];
                    return false;
                }
            }else{
                mkdir($directory, 0755);

                if (move_uploaded_file($this->file["tmp_name"], $directory . "/" . $newName)) {
                    $_SESSION['profile-image'] = $directory . "/" . $newName;
                    // echo "2 - 1 - The file ". $directory . "/" . $newName . " has been uploaded.\n";
                    // echo "2 - 1 - Prfile-image cookie value : " . $_SESSION['profile-image'] . "\n";

                    // Add this user image to the database
                    // Get id where to update image
                    $id = $_SESSION['user_id'];

                    // Path to image
                    $img = $directory . "/" . $newName;

                    // Update image in database
                    $sql = "UPDATE users SET image='$img' WHERE user_id='$id';";
                    // echo "2 - 1 : " . $sql . "\n";

                    // Connect to my database
                    $this->connection = new Connection();
                    
                    // Update image in database
                    mysqli_query($this->connection->__construct(), $sql);

                    // Update session and cookies
                    $_SESSION['user-image'] = $img;
                    setcookie('user-image', $img, time() + 31536000, "/");

                    // Update comments user image if they are exists
                    $comments = "SELECT * FROM comments WHERE comment_id=$id";
                    $exeCom = mysqli_query($this->connection->__construct(), $comments);
                    if (mysqli_num_rows($exeCom > 0)){
                        // Update comments image in database
                        $sql = "UPDATE comments SET comment_owner_image='$img' WHERE comment_id='$id';";
                        mysqli_query($this->connection->__construct(), $sql);
                        // echo "2 - 1 - if : " . $sql . "\n";

                    }else{
                        if (mysqli_num_rows($exeCom) > 0){
                            // Update comments image in database
                            $sql = "UPDATE comments SET comment_owner_image='$img' WHERE comment_user_id='$id';";
                            mysqli_query($this->connection->__construct(), $sql);
                            // echo "If - Nwq: " . $sql;
                            // echo "New user-image session: " . $_SESSION['user-image'];
                            // echo "3 - 1 - Else - If - " . $sql . "\n";
                        }
                    }

                    // close connection
                    $this->connection->__construct()->close();
                                        
                    return true;
                }else {
                    // echo "\n2 - 2 - Sorry, there was an error uploading your file.\n";
                    // echo "2 - 2 - Prfile-image cookie value : " . $_SESSION['profile-image'] . "\n";
                    return false;
                }
            }

        }

        // Check Image Extension Method
        private function checkImageExtension(){
            // Extensions
            $imageExtensions = ["jpg", "png", "jpeg", "gif"];

            $this->file = $_FILES["fileToUpload"];
            $this->imageFileType = strtolower(pathinfo($this->file["name"], PATHINFO_EXTENSION));
            // echo "Extension: " . $this->imageFileType . "\n";

            // Allow certain file formats
            if(!(in_array($this->imageFileType, $imageExtensions))) {
                // echo "if - Extension: " . $this->imageFileType . "\n";
                // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.\n";
                // echo "Your file extension is ." . pathinfo($this->file["name"], PATHINFO_EXTENSION) . "\n";
                return false;
            }else{
                // echo "\nImage extension accepted \n";
                return true;
            }
        }

    }

    $upl = new Upload();
    $upl->checkImage();
?>