<?php 
    // ###### For Signup And Signin ######
    class setterGetterData{
        private $username;
        private $email;
        private $password;
        private $firstname;
        private $lastname;
        private $image;
        private $phoneNumber;
      
        // Setter Data
        public function setUsername($username){
          $this->username = $username;
        }
      
        public function setEmail($email){
          $this->email = $email;
        }
      
        public function setPassword($password){
          $this->password = $password;
        }
      
        public function setFirstname($firstname){
          $this->firstname = $firstname;
        }

        public function setLastname($lastname){
          $this->lastname = $lastname;
        }

        public function setImage($image){
          $this->image = $image;
        }

        public function setPhoneNumber($phoneNumber){
          $this->phoneNumber = $phoneNumber;
        }

        // Gettter Data
        public function getUsername(){
          return $this->username;
        }
      
        public function getEmail(){
          return $this->email;
        }
      
        public function getPassword(){
          return $this->password;
        }
      
        public function getFirstname(){
          return $this->firstname;
        }

        public function getLastname(){
          return $this->lastname;
        }

        public function getImage(){
          return $this->image;
        }

        public function getPhoneNumber(){
          return $this->phoneNumber;
        }
    }

?>