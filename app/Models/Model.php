<?php

namespace app\Models;

class Model
{
    public function __construct($table)
    {
        /**
         * In the constructor we are setting the table name and connecting to the database
         */
        $this->table = $table;
        $this->db = $this->connect();
    }

    public function all(){
        /**
         * This method returns all the records from the table
         */
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find($id){
        /**
         * This method returns a single record from the table
         */
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data){
        /**
         * This method creates a new record in the table
         */
        $keys = implode(',', array_keys($data));
        $values = ':'.implode(', :', array_keys($data));
        $sql = "INSERT INTO $this->table ($keys) VALUES ($values)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
    }

    public function update($data, $id){
        /**
         * This method updates a record in the table
         */
        $fields = '';
        foreach($data as $key => $value){
            $fields .= $key . ' = :' . $key . ', ';
        }
        $fields = rtrim($fields, ', ');
        $data['id'] = $id;
        $sql = "UPDATE $this->table SET $fields WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
    }


    public function delete($id){
        /**
         * This method deletes a record from the table
         */
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
    }



}