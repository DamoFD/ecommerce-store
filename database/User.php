<?php

//php User class
class User
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    //validate user credentials
    public function registerUser($data){
        require ('Helper.php');

        //error variable
        $error = array();

        $firstName = Helper::validate_input_text($data['firstName']);
        if(empty($firstName)){
            $error[] = "Please enter your first name";
        }

        $lastName = Helper::validate_input_text($data['lastName']);
        if(empty($lastName)){
            $error[] = "Please enter your last name";
        }

        $email = Helper::validate_input_email($data['email']);
        if(empty($email)){
            $error[] = "Please enter your email";
        }

        $password = Helper::validate_input_text($data['password']);
        if(empty($password)){
            $error[] = "Please enter a password";
        }

        $confirm_pwd = Helper::validate_input_text($data['confirm_pwd']);
        if(empty($confirm_pwd)){
            $error[] = "Please confirm your password";
        }

        if($this->db->con != null && empty($error)){
            // Register new user
            $hashed_pass = password_hash($password,PASSWORD_DEFAULT);

            // Create SQL query
            $query_string = "INSERT INTO user (first_name, last_name, email, password, register_date)";
            $query_string .= "VALUES(?,?,?,?,NOW())";

            // Prepare Statement
            $stmt = $this->db->con->prepare($query_string);

            // Bind Parameters
            $types = 'ssss';
            $values = array($firstName, $lastName, $email, $hashed_pass);
            $stmt->bind_param($types, ...$values);

            // Execute Query
            $result = $stmt->execute();

            if(mysqli_stmt_affected_rows($stmt) == 1){
                print "record successfully inserted!";
            }else{
                print "Error while registering";
            }
            
        }else{
            echo 'not validate';
        }

        return $error;
    }
}
?>