<?php


class SalesProduct
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM sales_product");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDatabyId($id)
    {
        $result = $this->db->con->query("SELECT * FROM sales_product WHERE sales_product_id = {$id} ");

        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);



        return $result;
    }

    public function multipleInsertData($sql)
    {
        if ($result = $this->db->con->multi_query($sql)) {

            echo "New records created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->con->error;
        }
    }


    public function insertData($params = null, $table = "sales_product")
    {
        if ($this->db->con != null) {
            if ($params != null) {

                $columns = implode(',', array_keys($params));
                // print_r($columns);
                $values = implode(',', array_values($params));
                //   print_r($values);

                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);



                $this->db->con->query($query_string);
                $lastid = $this->db->con->insert_id;
                return $lastid;
            }
        }
    }

    public function addsales_product($sales)
    {

        $params = array(
            'sales' => "{$sales}",
        );

        return $this->insertData($params);
    }


    public function deleteItem($id)
    {

        $queryString = "DELETE FROM sales_product WHERE sales_product_id = {$id}";

        $result = $this->db->con->query($queryString);
        return $result;
    }
}
