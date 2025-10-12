<?php
defined('ROOTPATH') OR exit("Access denied!");
Trait Model {

    protected $limit = 10;
    protected $offset = 0;
    protected $orderType = "asc";
    protected $orderCol = "id";

    // Trait is used instead of class, when you want to inherit more than one class/Trait
    // and a Trait cannot run on it's own, it needs to be 'used' in another class.
    use Database;
    public function All() {
        $query = "select * from $this->table order by $this->orderCol $this->orderType limit $this->limit offset $this->offset";
        // echo $query;
        return $this->query($query);
    }
    public function where($data, $dataNot = []) {
        $keys = array_keys($data);
        $keysNot = array_keys($dataNot);
        
        $str = "";
        $strNot = "";
        foreach($keys as $key) {
            $str .= $key . " = :" . $key . " && ";
        }
        foreach($keysNot as $keyNot) {
            $strNot .= $keyNot . " != :" . $keyNot . " && ";
        }
        $query = "select * from $this->table where ". $str . " && " . $strNot;
        $query = trim($query, " && ");
        $query .= " order by $this->orderCol $this->orderType limit $this->limit offset $this->offset";
        // echo $query;
        $data = array_merge($data, $dataNot);
        return $this->query($query, $data);
    }
    public function first($data, $dataNot = []) {
        $keys = array_keys($data);
        $keysNot = array_keys($dataNot);
        
        $str = "";
        $strNot = "";
        foreach($keys as $key) {
            $str .= $key . " = :" . $key . " && ";
        }
        foreach($keysNot as $keyNot) {
            $strNot .= $keyNot . " != :" . $keyNot . " && ";
        }
        $query = "select * from $this->table where ". $str . " && " . $strNot;
        $query = trim($query, " && ");
        $query .= " limit $this->limit offset $this->offset";
        // echo $query;
        $data = array_merge($data, $dataNot);
        $result = $this->query($query, $data);
        if($result) return $result[0];
        return false;
    }
    public function insert($data) {
        // this if checks the data to see if they're allowed for editing or remove them if not. 
        if(!empty($this->allowedCols)) {
            foreach($data as $col => $value) {
                if(!in_array($col, $this->allowedCols)) unset($data[$col]);
            }
        }
        $keys = array_keys($data);
        $query = "insert into $this->table (".implode(",",$keys).") values (:".implode(",:",$keys).")";
        $this->query($query, $data);
    }
    public function update($id, $data, $idCol = 'id') {
        
        if(!empty($this->allowedCols)) {
            foreach($data as $col => $value) {
                if(!in_array($col, $this->allowedCols)) unset($data[$col]);
            }
        }
        $keys = array_keys($data);
        $values = "";
        foreach($keys as $key) {
            $values .= "$key = :$key, ";
        }
        $values = trim($values, ", ");
        $data[$idCol] = $id;
        $query = "update $this->table set $values where $idCol = :$idCol";
        // echo $query;
        $this->query($query, $data);
    }
    public function delete($id, $idCol = 'id') {
        $data[$idCol] = $id;
        $query = "delete from $this->table where $idCol = :$idCol";
        $this->query($query, $data);
    }
}