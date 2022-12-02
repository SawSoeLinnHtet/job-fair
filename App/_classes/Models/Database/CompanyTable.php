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
        created_at,
        updated_at
      ) VALUES (
        :name,
        :type,
        :email,
        :location,
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
  public function edit($id, $name, $type, $email, $location){
    $query = "
      UPDATE companies SET 
      name = :name, 
      type = :type, 
      email = :email, 
      location = :location
      WHERE id = :id
    ";
    $statement = $this->db->prepare($query);

    $statement->execute([
      ":id" => $id,
      ":name" => $name,
      ":type" => $type,
      ":email" => $email,
      ":location" => $location,
    ]);
    
    return $statement->rowCount();
  }
}