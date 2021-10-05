<?php


class Product
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData()
    {
        $result = $this->db->con->query("SELECT p_id,productname,price,categoryname FROM products INNER JOIN category ON products.category = category.c_id");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDatabyId($id)
    {
        $result = $this->db->con->query("SELECT * FROM products WHERE p_id = {$id} ");

        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);



        return $result;
    }

    public function getDatabyCatid($id)
    {
        $result = $this->db->con->query("SELECT * FROM products WHERE category = {$id} ");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }



        return $resultArray;
    }

    public function insertData($params = null, $table = "products")
    {
        if ($this->db->con != null) {
            if ($params != null) {

                $columns = implode(',', array_keys($params));
                // print_r($columns);
                $values = implode(',', array_values($params));
                //   print_r($values);

                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                echo $query_string;

                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    public function addproducts($item, $cat, $price)
    {

        $params = array(
            'productname' => "'{$item}'",
            'category' => "{$cat}",
            'price' => "{$price}",
        );

        $result = $this->insertData($params);
    }


    public function editItem($id, $name, $cat, $price)
    {
        $queryString = "UPDATE products SET itemname = '{$name}',price = {$price} ,category = {$cat} WHERE p_id = {$id}";

        $result = $this->db->con->query($queryString);
        return $result;
    }

    public function deleteItem($id)
    {

        $queryString = "DELETE FROM products WHERE p_id = {$id}";

        $result = $this->db->con->query($queryString);
        return $result;
    }
}
