<?php


class Item
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM itemlist");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDatabyId($id)
    {
        $result = $this->db->con->query("SELECT * FROM itemlist WHERE i_id = {$id} ");

        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);



        return $result;
    }

    public function insertData($params = null, $table = "itemlist")
    {
        if ($this->db->con != null) {
            if ($params != null) {

                $columns = implode(',', array_keys($params));
                // print_r($columns);
                $values = implode(',', array_values($params));
                //   print_r($values);

                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);


                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    public function addItemList($item, $unit)
    {

        $params = array(
            'itemname' => "'{$item}'",
            'unit' => "'{$unit}'",
        );


        $result = $this->insertData($params);
    }


    public function editItem($id, $name, $unit)
    {
        $queryString = "UPDATE itemlist SET itemname = '{$name}',unit = '{$unit}' WHERE i_id = {$id}";

        $result = $this->db->con->query($queryString);
        return $result;
    }

    public function deleteItem($id)
    {

        $queryString = "DELETE FROM itemlist WHERE i_id = {$id}";

        $result = $this->db->con->query($queryString);
        return $result;
    }
}
