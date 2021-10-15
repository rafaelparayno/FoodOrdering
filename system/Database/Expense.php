<?php


class Expense
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM expenses");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDataDate($date)
    {
        $result = $this->db->con->query("SELECT * FROM expenses WHERE e_date = '$date'");

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



    public function insertData($params = null, $table = "expenses")
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

    public function multipleInsertData($data)
    {



        $sql = "";
        foreach ($data as $item) {
            $expenseName = $this->db->con->real_escape_string($item['valueName']);

            $sql .= "INSERT INTO expenses (e_name,cost) 
            VALUES ('$expenseName',{$item['valueCost']}); ";
        }


        if ($result = $this->db->con->multi_query($sql)) {

            $res =  "New records created successfully";
        } else {
            $res =  "Error: " . $sql . "<br>" . $this->db->con->error;
        }
    }

    public function addExpense($name, $cost)
    {

        $params = array(
            'e_name' => "'{$name}'",
            'e_cost' => "$cost",
        );

        $result = $this->insertData($params);
    }


    public function editItem($id, $name, $price)
    {
        $queryString = "UPDATE products SET e_name = '{$name}',cost = {$price}  WHERE e_id = {$id}";

        $result = $this->db->con->query($queryString);
        return $result;
    }

    public function deleteItem($id)
    {

        $queryString = "DELETE FROM expenses WHERE e_id = {$id}";

        $result = $this->db->con->query($queryString);
        return $result;
    }
}
