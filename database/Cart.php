<?php

//php cart class
class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    //insert into cart table
    public function insertIntoCart($params = null, $table = "cart"){
        // whitelisted tables
        $allowedTables = ['product', 'wishlist', 'cart', 'user'];

    if ($this->db->con != null && $params != null && in_array($table, $allowedTables)) {
        if ($params != null) {
            // Get table columns
            $columns = implode(',', array_keys($params));

            // Prepare placeholders for values
            $placeholders = implode(',', array_fill(0, count($params), '?'));

            // Create SQL query
            $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $placeholders);

            // Prepare statement
            $stmt = $this->db->con->prepare($query_string);

            // Bind parameters
            $types = 'iissi';
            $values = array_values($params);
            $stmt->bind_param($types, ...$values);

            // Execute query
            $result = $stmt->execute();

            return $result;
        }
    }
}


    // get user_id and item_id and insert into cart table
    public function addToCart($userid, $itemid, $color, $size, $quantity){
        if(isset($userid) && isset($itemid)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid,
                "color" => $color,
                "size" => $size,
                "quantity" => $quantity
            );

            //insert data into cart
            $result = $this->insertIntoCart($params);
            if($result){
                // Check if the current page is the product page
                $currentPage = basename($_SERVER['PHP_SELF']);
                $productPage = 'product.php';

                if($currentPage == $productPage) {
                    // Reload product page with query parameters
                    header("Location:" . $_SERVER['PHP_SELF'] . "?item_id=" . $itemid);
                }else{
                    // Reload page without query parameters
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            exit();
        }
        }
    }

    // Get Cart Data With user_id and map with product details
public function getCartData($userid = null){

    //Check if user_id is valid
    if($userid != null){

        // Create SQL Statement
        $query_string = "SELECT c.*, p.item_name, p.item_price, p.item_image, p.item_image_mobile, c.color, c.size FROM cart c INNER JOIN product p ON c.item_id = p.item_id WHERE c.user_id=?";

        // Prepare Statement
        $stmt = $this->db->con->prepare($query_string);

        // Bind Parameters
        $stmt->bind_param('i', $userid);

        // Execute Query
        $stmt->execute();

        // Get Result
        $result = $stmt->get_result();

        // Fetch data as an associative array
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        return empty($rows) ? [] : $rows;
    }else{
        return [];
    }
}



    public function updateCartQuantity($userId = null, $itemId = null, $newQuantity = 1){

        // Check if Params are valid
        if($userId != null && $itemId != null) {
            // Create SQL Statement
            $query_string = "UPDATE cart SET quantity=? WHERE item_id=? && user_id=?";

            // Prepare Statement
            $stmt = $this->db->con->prepare($query_string);

            // Bind Parameters
            $types = 'iii';
            $values = array($newQuantity, $itemId, $userId);
            $stmt->bind_param($types, ...$values);

            // Execute Query
            $result = $stmt->execute();

            // Return the Result
            return $result;

        }else{
            // Return False if the parameters are not valid
            return false;
        }
    }

    // delete cart item using cart item id
    public function deleteCart($item_id = null, $table = 'cart'){
        // whitelisted tables
        $allowedTables = ['product', 'wishlist', 'cart', 'user'];

        if($item_id != null && in_array($table, $allowedTables)){
            // Prepare the SQL statement
            $stmt = $this->db->con->prepare("DELETE FROM {$table} WHERE item_id=?");

            // Bind the parameter
            $stmt->bind_param('i',$item_id);

            // Execute the prepared statement
            $result = $stmt->execute();

            if($result){

                //refresh page
                header("Location:" . $_SERVER['PHP_SELF']);
                exit();
            }
            return $result;
        }
    }

    // calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f',$sum);
        }
    }

    // get item_id off shopping cart list
    public function getCartId($cartArray = null,$key = "item_id"){
        if($cartArray != null){
            $cart_id = array_map(function($value) use($key){
                return $value[$key];
            },$cartArray);
            return $cart_id;
        }
    }

    // wishlist
    public function saveForLater($item_id = null,$saveTable = "wishlist",$fromTable = "cart"){
        // whitelisted tables
        $allowedTables = ['product', 'wishlist', 'cart', 'user'];

        if($item_id != null && in_array($saveTable, $allowedTables) && in_array($fromTable, $allowedTables)){

            // Prepare the INSERT statement
            $stmt = $this->db->con->prepare("INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id=?;");

            // Bind the parameter
            $stmt->bind_param('i', $item_id);

            // Execute the prepared statement
            $result1 = $stmt->execute();

            // Prepare the DELETE statement
            $stmt = $this->db->con->prepare("DELETE FROM {$fromTable} WHERE item_id=?;");

            // Bind the parameter
            $stmt->bind_param('i', $item_id);

            // Execute the prepared statement
            $result2 = $stmt->execute();

            if($result1 && $result2){
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }
            return $result1 && $result2;
        }
    }

    // delete cart item using cart item id
    public function deleteWish($item_id = null, $table = 'wishlist'){
        // whitelisted tables
        $allowedTables = ['product', 'wishlist', 'cart', 'user'];

        if($item_id != null && in_array($table, $allowedTables)){
            // prepare the SQL statement
            $stmt = $this->db->con->prepare("DELETE FROM {$table} WHERE item_id=?");

            // Bind the parameter
            $stmt->bind_param('i',$item_id);

            // Execute the prepared statement
            $result = $stmt->execute();

            if($result){
                // refresh current page
                header("Location:" . $_SERVER['PHP_SELF']);
                exit();
            }
            return $result;
        }
    }

    // Get Wishlist Data With user_id and map with product details
public function getWishlistData($userid = null){

    //Check if user_id is valid
    if($userid != null){

        // Create SQL Statement
        $query_string = "SELECT w.*, p.item_name, p.item_price, p.item_image, p.item_image_mobile, w.color, w.size FROM wishlist w INNER JOIN product p ON w.item_id = p.item_id WHERE w.user_id=?";

        // Prepare Statement
        $stmt = $this->db->con->prepare($query_string);

        // Bind Parameters
        $stmt->bind_param('i', $userid);

        // Execute Query
        $stmt->execute();

        // Get Result
        $result = $stmt->get_result();

        // Fetch data as an associative array
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        return empty($rows) ? [] : $rows;
    }else{
        return [];
    }
}

}
