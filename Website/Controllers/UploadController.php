<?php 
    session_start();

    class Upload{
        // Where image will store
        private $target_dir = "../uploads/";
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

            // if (move_uploaded_file($this->file["tmp_name"], $this->target_file)) {
                // echo "The file ". $this->target_file . " has been uploaded.";
                $_SESSION['file'] = $this->file;
                // echo $_SESSION['user-image'];
                // print_r($_SESSION['file']);

                // return true;
            // }else {
                // echo "\nSorry, there was an error uploading your file.\n";
                // return false;
            // }

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

        // Check File Size Method
        // private function checkFileSize(){
        //     $this->file = $_FILES["fileToUpload"];
        //     // Check file size
        //     if ($this->file["size"] > 500000) {
        //         echo "Sorry, your file is too large.\n";
        //         echo "Your file size is " . $this->file["size"] . "\n";
        //         return false;
        //     }else{
        //         echo "\nFile Sisze accepted \n";
        //         return true;
        //     }
        // }

    }

    $upl = new Upload();
    $upl->checkImage();
?>