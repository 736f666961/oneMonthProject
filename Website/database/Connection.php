<?php 
    class Connection {
        // Connection Info
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $dbName = "stories";

        public function __construct(){
            // Create connection
            $conn = new mysqli($this->host, $this->username, $this->password, $this->dbName);
       
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
       
            return $conn;
        }

        // Check if email exists in database
        public function checkEmailExistence($email){
            $query = "SELECT * FROM users WHERE email='$email'";

            $res = mysqli_query($this->__construct(), $query);

            if (mysqli_num_rows($res) > 0){
                return true;
            }else{
                return false;
            }
        }

        // Check if email exists in database
        public function checkPasswordExistence($password){
            $query = "SELECT * FROM users WHERE password='$password'";

            $res = mysqli_query($this->__construct(), $query);

            if (mysqli_num_rows($res) > 0){
                return true;
            }else{
                return false;
            }
        }
    };


?>