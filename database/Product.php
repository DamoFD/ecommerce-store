<?php

//Use to fetch product data
class Product
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    //fetch product data using getData Method
    public function getData($table = 'product'){
        // Define whitelist of allowed table names
        $allowedTables = ['product', 'wishlist', 'cart', 'user'];

        // Check if provided table is in allowed list
        if (in_array($table, $allowedTables)){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    } else {
        return [];
    }
}

    // get product using item id
    public function getProduct($item_id = null,$table = 'product'){
        // Whitelisted tables
        $allowedTables = ['product', 'wishlist', 'cart', 'user'];

        // Check table and item_id
        if(isset($item_id) && in_array($table, $allowedTables)){
            // Prepare the SQL statement
            $stmt = $this->db->con->prepare("SELECT * FROM {$table} WHERE item_id=?");

            // Bind the parameter
            $stmt->bind_param('i', $item_id);

            // Execute the prepared statement
            $stmt->execute();

            // Get the result
            $result = $stmt->get_result();

            $resultArray = array();

            //fetch product data one by one
            while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }else{
            return [];
        }
    }

}

?>