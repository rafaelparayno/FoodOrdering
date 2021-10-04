<?php


class Category
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM category");

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getDatabyId($id)
    {
        $result = $this->db->con->query("SELECT * FROM category WHERE c_id = {$id} ");

        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);



        return $result;
    }

    public function insertData($params = null, $table = "category")
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

    public function addCategory($category)
    {

        $params = array(
            'categoryname' => "'{$category}'",
        );


        $result = $this->insertData($params);

        //   return $result;
    }


    public function editCategory($id, $name)
    {
        $queryString = "UPDATE category SET categoryname = '{$name}' WHERE c_id = {$id}";

        $result = $this->db->con->query($queryString);
        return $result;
    }

    public function deleteCategory($id)
    {

        $queryString = "DELETE FROM category WHERE c_id = {$id}";

        $result = $this->db->con->query($queryString);
        return $result;
    }
}
