<?php

namespace App\Models;

use PDO;

interface Model_function
{
    function getConnect();
    public static function get_All_Val();
    function insert($arr);
    function update($arr,$arr2);
    function execute();
    //------------------------------
    public static function select();
    public function get();
    public static function rawQuery($text_sql);
    public function join($arr);
    public function Where($arr);
    public function andWhere($arr);
    public function orWhere($arr);
    public function Limit($start, $end = false);
    public function orderBy($col, $asc = true);
    public function groupby($name);
}

class BaseModel implements Model_function
{
    public static function get_All_Val()
    {
        $model = new static();
        $model->sql = "SELECT * FROM $model->Table";
        $send = $model->GetConnect()->prepare($model->sql);
        $send->execute();
        return $send->fetchAll(PDO::FETCH_CLASS, get_class($model));
    }
    public function get_All_table($table)
    {
        $model = new static();
        $model->sql = "SELECT * FROM $table";
        $send = $model->GetConnect()->prepare($model->sql);
        $send->execute();
        return $send->fetchAll();
    }
    function getConnect()
    {
        $conn = new PDO('mysql:host=127.0.0.1;dbname=thienth;charset=utf8', 'root', '');
        return $conn;
    }
    public function execute()
    {
        $stmt = $this->GetConnect()->prepare($this->sql);
        return $stmt->execute();
    }
    function insert($arr)
    {
        $this->sql = "INSERT INTO $this->Table ";
        $cols = " (";
        $vals = " (";
        foreach ($arr as $key => $val) {
            $cols .= "$key,";
            $vals .= "'$val',";
        }
        $cols = rtrim($cols, ',') . ")";
        $vals = rtrim($vals, ',') . ")";
        $this->sql .= "$cols values $vals";
        $this->execute();
    }
    function update($arr,$arr2)
    {
        $this->sql = "UPDATE $this->Table SET ";
        foreach ($arr as $key => $val) {
            $this->sql .= "$key = '$val',";
        }
        $this->sql = rtrim($this->sql,',');
        $this->sql .= " WHERE $arr2[0] $arr2[1] '$arr2[2]'";
        $this->execute();
    }

    //-------------------------------truy van rieng ---------------------------------
    public static function select(){
        $model = new static();
        $model->sql = "SELECT * FROM $model->Table";
        return $model;
    }
    public static function delete(){
        $model = new static();
        $model->sql = "DELETE FROM $model->Table";
        return $model;
    }
    public function get()
    {
        $sql = $this->getConnect()->prepare($this->sql);
        $sql->execute();
        $val = $sql->fetchAll(PDO::FETCH_CLASS, get_class($this));
        return $val;
    }
    public static function rawQuery($text_sql)
    { // muc dich static de cong don cau truy van
        $model = new static();
        $model->sql = $text_sql;
        return $model;
    }
    public function join($arr)
    {
        $this->sql .= " join $arr[0] on $arr[1] = $arr[2]";
        return $this;
    }
    public function Where($arr)
    {
        $this->sql .= " where $arr[0] $arr[1] '$arr[2]' ";
        return $this;
    }
    public function andWhere($arr)
    {
        $this->sql .= " and $arr[0] $arr[1] '$arr[2]' ";
        return $this;
    }
    public function orWhere($arr){
        $this->sql .= " or $arr[0] $arr[1] '$arr[2]'";
        return $this;
    }
    public function Limit($start, $end = false)
    {
        $this->sql .= " limit $start ";
        if ($end != false) {
            $this->sql .= ", $end";
        }
        return $this;
    }
    public function orderBy($col, $asc = true){
		$this->sql .= " order by $col";
		$this->sql .= $asc == true ? " asc " : " desc ";
		return $this;
	}
    public function groupby($name){
		$this->sql .= " GROUP BY `$name`";
		return $this;
	}
}
