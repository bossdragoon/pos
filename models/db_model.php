<?php

class Db_Model extends Model {

    public function __construct() {
        parent::__construct();  
    }
    
    
    public function insertData($table, $data) {
        /*
        * @param string $table A name of table to insert into
        * @param string $data An associative array
         */
        /*#Modify from Database libs "insert" function*/
        
        ksort($data);

        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        echo "INSERT INTO $table (`$fieldNames`) SELECT $fieldValues";

//        foreach ($data as $key => $value) {
//            $sth->bindValue(":$key", $value);
//        }

    }    
    
}
