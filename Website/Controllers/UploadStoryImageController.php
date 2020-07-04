<?php 
    session_start();

    class Upload{
        // Where image will store
        private $target_dir = "../uploads/StoriesImages/";
        private $file;
        private $target_file;
        private $imageFileType;

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

            // Directory where images will store
            $directory = $this->target_dir . $_SESSION['user_id'];
            // echo $directory;

            // Rename uploaded image
            $ext = strtolower(pathinfo($this->file["name"], PATHINFO_EXTENSION));
            $newName = str_replace($this->file['name'], time() . '.' . $ext, $this->file['name']);

            if(file_exists($directory)){
                if (move_uploaded_file( $this->file["tmp_name"], $directory . "/" . $newName)) {
                    // echo "The file ". $directory . "/" . $newName . " has been uploaded.";
                    $_SESSION['story-image'] = $directory . "/" . $newName;
    
                    return true;
                }else {
                    // echo "\nSorry, there was an error uploading your file.\n";
                    return false;
                }
            }else{
                mkdir($directory, 0755);

                if (move_uploaded_file( $this->file["tmp_name"], $directory . "/" . $newName)) {
                    // echo "The file ". $directory . "/" . $this->file["name"] . " has been uploaded.";
                    
                    $_SESSION['story-image'] = $directory . "/" . $newName;
    
                    return true;
                }else {
                    // echo "\nSorry, there was an error uploading your file.\n";
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