<?php


namespace App\Models;


use App\DI;
use PDO;
use PDOStatement;

class Model
{
    public static $tableName;

    public static function selectAll(){
        /** @var PDOStatement $stmt */
        $stmt = DI::$DB->getConn()->prepare("SELECT * FROM " . static::$tableName);
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);
        $result = $stmt->fetchAll();
        return $result;
    }
    public function save(){
        if(!$this->id){
            $sql = $this->getCreateSql();
        } else {
            $sql = $this->getUpdateSql();
        }
        // use exec() because no results are returned
        DI::$DB->getConn()->exec($sql);
    }

    /**
     * @param $id
     * @return bool|Employee
     */
    public static function find($id){
        /** @var PDOStatement $stmt */
        $stmt = DI::$DB->getConn()->prepare("SELECT * FROM " . static::$tableName . " WHERE id=$id");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);
        $result = $stmt->fetch();
        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM " . static::$tableName . " WHERE id=$this->id";
        DI::$DB->getConn()->exec($sql);
    }

    public function getFields(){
        $properties = get_class_vars(static::class);
        unset($properties['id']);
        unset($properties['tableName']);
        return $properties;
    }
    public function getCreateSql(){
        $fields = $this->getFields();
        $fieldNames = array_keys($fields);
        $fieldNamesString = implode(', ', $fieldNames);
        $fieldsValuesString = '';
        foreach ($fieldNames as $name){
            $fieldsValuesString .= $this->$name . "', '";
        }
        $fieldsValuesString = substr($fieldsValuesString, 0, strlen($fieldsValuesString)-4 );
        $sql = "INSERT INTO " . static::$tableName . " (". $fieldNamesString .")
    VALUES ('" . $fieldsValuesString . "')";
        return $sql;
    }
    public function getUpdateSql(){
        $fields = $this->getFields();
        $fieldNames = array_keys($fields);
        $fieldsValuesString = '';
        foreach ($fieldNames as $name){
            $fieldsValuesString .= $name . "='" .$this->$name . "', ";
        }
        $fieldsValuesString = substr($fieldsValuesString, 0, strlen($fieldsValuesString)-2 );
        $sql = "UPDATE " . static::$tableName . " SET $fieldsValuesString WHERE id=$this->id";
        return $sql;
    }

    public static function select($where){
        /** @var PDOStatement $stmt */
        $stmt = DI::$DB->getConn()->prepare("SELECT * FROM " . static::$tableName . " WHERE $where");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);
        $result = $stmt->fetch();
        return $result;
    }
}