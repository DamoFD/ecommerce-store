<?php

//php Login class
class Login
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    //validate user credentials
    public function loginUser($data) {
        require ('Helper.php');
    
        // Error variable
        $error = array();
    
        $email = Helper::validate_input_email($data['email']);
        if (empty($email)) {
            $error[] = "Please enter your email";
        }
    
        $password = Helper::validate_input_text($data['password']);
        if (empty($password)) {
            $error[] = "Please enter a password";
        }
    
        if ($this->db->con != null && empty($error)) {
            // Create SQL Query
            $query_string = "SELECT user_id, first_name, last_name, email, password FROM user WHERE email=?";
    
            // Prepare Statement
            $stmt = $this->db->con->prepare($query_string);
    
            // Bind Parameters
            $stmt->bind_param('s', $email);
    
            // Execute Query
            $stmt->execute();
    
            // Get result
            $result = $stmt->get_result();
    
            // Fetch data as an associative array
            $row = $result->fetch_assoc();
    
            if ($row) {
                // Verify password
                if (password_verify($password, $row['password'])) {

                    // Create Session Variable
                    $_SESSION['user_id'] = $row['user_id'];

                    header("Location: index.php");
                    exit();
                } else {
                    print "Incorrect Email or Password";
                }
            } else {
                print "Incorrect Email or Password";
            }
    
        } else {
            echo "Please enter your email and password";
        }
    }
    
}

?>