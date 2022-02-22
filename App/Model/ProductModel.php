<?php

namespace App\Model;

class ProductModel
{
    public $connect;
    public function __construct()
    {
        $db = new DBConnect();
        $this->connect = $db->connect();
    }
    public function showAll()
    {
        $sql = "select * from products";
        $stmt = $this->connect->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function showById($id)
    {
        $sql = "select * from products where id = $id";
        $stmt = $this->connect->query($sql);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }


    public function delete($id){
        $sql="delete from products where id=$id";
        $this->connect->query($sql);

    }
    public function create($data){
        $sql="Insert into products(name,type) values (?,?)";
        $stmt= $this->connect->prepare($sql);
        $stmt->bindParam(1,$data['name']);
        $stmt->bindParam(2,$data['type']);
        $stmt->execute();
    }
    public function update($id,$data){
        $sql="update products set name = ?, type = ? where  id=?";
        $stmt= $this->connect->prepare($sql);
        $stmt->bindParam(1,$data['name']);
        $stmt->bindParam(2,$data['type']);
        $stmt->bindParam(3,$id);
        $stmt->execute();
    }



}

