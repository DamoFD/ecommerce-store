<?php

    // User Class
    class User
    {
        public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

        // Get User Data With ID
        public function getUserInfo($user_id){
            if($this->db->con != null){
                // Create SQL Query
                $query_string = "SELECT user_id, first_name, last_name, email FROM user WHERE user_id=?";

                // Prepare Statement
                $stmt = $this->db->con->prepare($query_string);

                // Bind Parameters
                $stmt->bind_param('i', $user_id);

                // Execute Query
                $stmt->execute();

                // Get Result
                $result = $stmt->get_result();

                // Fetch data as an associative array
                $row = $result->fetch_assoc();

                return empty($row) ? false : $row;
            }
        }
    }

?>