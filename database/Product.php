<?php

//Use to fetch product data
class Product
{
    public $db = null;
    private $Cache;

    public function __construct(DBController $db, Cache $Cache)
    {
        if(!isset($db->con)) return null;
        $this->db = $db;
        $this->Cache = $Cache;
    }

    //fetch product data using getData Method
    public function getData($table = 'product'){
        // Define whitelist of allowed table names
        $allowedTables = ['product', 'wishlist', 'cart', 'user'];

        // Check if provided table is in allowed list
        if (in_array($table, $allowedTables)){

        // Check cache first
        $cachedData = $this->Cache->getFromCache($table);
        if ($cachedData !== false) {
            return $cachedData;
        }

        // If no cache, get from database
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        // Save data to the cache
        $this->Cache->saveToCache($table, $resultArray);

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
            $cacheKey = $table . '_' . $item_id;

            // Check cache first
            $cachedData = $this->Cache->getFromCache($cacheKey);
            if ($cachedData !== false) {
                return $cachedData;
            }

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

            // Save data to the cache
            $this->Cache->saveToCache($cacheKey, $resultArray);

            return $resultArray;
        }else{
            return [];
        }
    }

}

?>