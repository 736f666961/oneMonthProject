<?php 
    class SignupValidation
    {
        // Validate All Fields
        public function validateAllFields($firstname, $lastname, $username, $email, $password, $phone)
        {
            if ($this->validateFirstname($firstname) && $this->validateLastname($lastname) && $this->validateUsername($username) &&
                $this->validateEmail($email) && $this->validatePassword($password) && $this->validatePhone($phone)){
                return true;
            }else{
                return false;
            }
        }

        // Validate Field Firstname
        private function validateFirstname($firstname)
        {
            $pattern = "/^[a-zA-Z]+$/"; 
            if(!preg_match($pattern, $firstname)){
                // echo 'False field with: ' . $string . "<br>";
                // echo "Firstname return " . $firstname . " False<br>";
                return false;
            }else{
                // echo "Firstname return " . $firstname . " True<br>";
                // echo 'True field with: ' . $string . "<br>";
                return true;
            }
        }

        // Validate Field Lastname
        private function validateLastname($lastname)
        {
            $pattern = "/^[a-zA-Z]+$/"; 
            if(!preg_match($pattern, $lastname)){
                // echo "Lastname return " . $lastname . " False<br>";
                // echo 'False lastname with: ' . $lastname . "<br>";
                return false;
            }else{
                // echo "Lastname return " . $lastname . " True<br>";
                // echo 'True lastname with: ' . $lastname . "<br>";
                return true;
            }
        }

        // Validate Username Field
        private function validateUsername($username)
        {
            $pattern = "/^([a-z]|[a-z0-9]|[a-zA-Z]|[a-zA-Z0-9]|[A-Z0-9])+$/"; 
            if(!preg_match($pattern, $username)){
                // echo 'False username with: ' . $username . "<br>";
                // echo "Username return " . $username . " False<br>";
                return false;
            }else{
                // echo "Username return " . $username . " True<br>";
                // echo 'True username with: ' . $username . "<br>";
                return true;
            }
        }

        // Validate Email Field
        private function validateEmail($email)
        {
            $pattern = "/^[a-zA-Z0-9._-]+@gmail.[a-zA-Z]{2,4}$/"; 
            if(!preg_match($pattern, $email)){
                // echo "Email return " . $email . " False<br>";
                // echo 'False email with: ' . $email . "<br>";
                return false;
            }else{
                // echo "Email return " . $email . " True<br>";
                // echo 'True email with: ' . $email . "<br>";
                return true;
            }   
        }

        // Validate Password Field
        private function validatePassword($password)
        {
            $pattern = "/[A-Za-z0-9~`!#$%^&*()_+-]+/"; 
            if(!preg_match($pattern, $password)){
                // echo "Password return " . $password . " False<br>";
                // echo 'False password with: ' . $password . "<br>";
                return false;
            }else{
                // echo "Password return " . $password . " True<br>";
                // echo 'True password with: ' . $password . "<br>";
                return true;
            }   
        }
        
        // Validate Phone Field
        private function validatePhone($phoneNumber)
        {
            $pattern = "/^[0-9]+$/"; 
            if(!preg_match($pattern, $phoneNumber)){
                // echo "Phone return " . $phoneNumber. " False<br>";
                // echo 'False Phone with: ' . $phoneNumber . "<br>";
                return false;
            }else{
                // echo "Phone return " . $phoneNumber . " True<br>";
                // echo 'True Phone with: ' . $phoneNumber . "<br>";
                return true;
            }   
        }
    }
?>