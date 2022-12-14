<?php

  namespace Models\Database;

  class CategoryTable
  {
    private $db = null;

    public function __construct(MYSQL $db){
      $this->db = $db->connect();
    }
    public function insert($name){
      $statement = $this->db->prepare("
        INSERT INTO categories (name) VALUES (:name)
      ");

      $statement->execute([
        "name" => $name
      ]);

      return $this->db->lastInsertId();
    }
    public function getAll(){
      $statement = $this->db->query(
        "SELECT * FROM categories ORDER BY categories.name"
      );
      return $statement->fetchAll();
    }
    public function delete($id){
      $statement = $this->db->prepare("
        DELETE FROM categories WHERE id = :id
      ");

      $statement->execute([
        ":id" => $id
      ]);
      return $statement->rowCount();
    }
    public function edit($id, $name){
      $statement = $this->db->prepare("
        UPDATE categories SET name = :name WHERE id = :id
      ");
      $statement->execute([
        ":id" => $id,
        ":name" => $name
      ]);
      
      return $statement->rowCount();
    }
    public function findById($id){
      $statement = $this->db->prepare("
        SELECT * FROM categories WHERE id = :id 
      ");
      $statement->execute([
        ":id" => $id
      ]);
      $row = $statement->fetchAll();
      return $row ?? '';
    }
    public function upload($id, $image){
      $statement = $this->db->prepare("
         UPDATE categories SET image = :image WHERE id = :id
      ");

      $statement->execute([
        ":id"=>$id,
        ":image"=>$image
      ]);

      return $statement->rowCount();
    }
    public function getLimit(){
      $statement = $this->db->query("
        SELECT * FROM categories LIMIT 4
      ");
      return $statement->fetchAll();
    }
  }