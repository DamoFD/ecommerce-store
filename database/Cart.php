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
    public function insertIntoCart($params = null,$table = "cart"){
        if($this->db->con != null) {
            if($params != null) {
                // insert into cart(user_id) values (0)
                // get table columns
                $columns = implode(',',array_keys($params));
                print_r($columns);
                $values = implode(',', array_values($params));
                print_r($values);

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)",$table,$columns,$values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // get user_id and item_id and insert into cart table
    public function addToCart($userid, $itemid){
        if(isset($userid) && isset($itemid)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
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
        }
        }
    }

    // delete cart item using cart item id
    public function deleteCart($item_id = null, $table = 'cart'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
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
        if($item_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
            $query .= "DELETE FROM {$fromTable} WHERE item_id={$item_id};";

            // execute multiple query
            $result = $this->db->con->multi_query($query);
            if($result){
                header("Location: " . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // delete cart item using cart item id
    public function deleteWish($item_id = null, $table = 'wishlist'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

}
