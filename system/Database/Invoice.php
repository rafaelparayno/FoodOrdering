<?php


class Invoice
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM invoice");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDatabyId($id)
    {
        $result = $this->db->con->query("SELECT * FROM invoice WHERE invoice_id = {$id} ");

        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);



        return $result;
    }


    public function insertData($params = null, $table = "invoice")
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

    public function addinvoice($sales)
    {

        $params = array(
            'sales' => "{$sales}",
        );

        $result = $this->insertData($params);
    }


    public function deleteItem($id)
    {

        $queryString = "DELETE FROM invoice WHERE invoice_id = {$id}";

        $result = $this->db->con->query($queryString);
        return $result;
    }
}
