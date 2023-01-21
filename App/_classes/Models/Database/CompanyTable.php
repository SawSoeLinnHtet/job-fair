<?php

namespace Models\Database;

class  CompanyTable
{
  private $db = null;

  public function __construct(MYSQL $db)
  {
    $this->db = $db->connect();
  }
  public function insert($data){
    $query = "
      INSERT INTO companies (
        name,
        type,
        email,
        location,
        image,
        created_at,
        updated_at
      ) VALUES (
        :name,
        :type,
        :email,
        :location,
        :image,
        now(),
        now()
      )
    ";
    $statement = $this->db->prepare($query);
      
    $statement->execute($data);

    return $this->db->lastInsertId();
  }
  public function getAll(){
    $statement = $this->db->query("
      SELECT * FROM  companies
    ");

    return $statement->fetchAll();
  }
  public function delete($id){
    $statement = $this->db->prepare(
      "DELETE FROM companies WHERE id=:id"
    );

    $statement->execute([
      ':id' => $id
    ]);

    return $statement->rowCount();
  }
  public function findById($id){
    $query = "
      SELECT * FROM companies WHERE id = :id
    ";

    $statement = $this->db->prepare($query);

    $statement->execute([
      ":id" => $id 
    ]);
    $row = $statement->fetchAll();
    return $row ?? false;
  }
  public function edit($data){
    $query = "
      UPDATE companies SET 
      name = :name, 
      type = :type, 
      email = :email, 
      location = :location,
      image = :image
      WHERE id = :id
    ";
    $statement = $this->db->prepare($query);

    $statement->execute([
      ":id" => $data['id'],
      ":name" => $data['name'],
      ":type" => $data['type'],
      ":email" => $data['email'],
      ":location" => $data['location'],
      ":image" => $data['image']
    ]);
    
    return $statement->rowCount();
  }
  public function upload($id, $image){
    $query = "
      UPDATE companies SET image = :image WHERE id = :id
    ";
    $statement = $this->db->prepare($query);

    $statement->execute([
      ":id" => $id,
      ":image" => $image
    ]);

    return $statement->rowCount();
  }
}