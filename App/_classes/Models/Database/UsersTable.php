<?php

  namespace Models\Database;

  use PDOException;

  class UsersTable
  {
    private $db = null;

    public function __construct(MYSQL $db)
    {
      $this->db = $db->connect();
    }
    public function insert($data){
      try{
        $query = "
          INSERT INTO users (
            name,
            email,
            password,
            phone_number,
            address,
            city,
            postal_code,
            created_at
          ) VALUES (
            :name,
            :email,
            :password,
            :phone_number,
            :address,
            :city,
            :postal_code,
            now()
          )
        ";
        var_dump($data);
        $statement = $this->db->prepare($query);
        
        $statement->execute($data);

        return $this->db->lastInsertId();
      }catch(PDOException $e){
        return $e->getMessage();
      }
    }
    public function findByEmailAndPassword($email, $password){
      $statement = $this->db->prepare(
        "
         SELECT * FROM users 
         WHERE email = :email
         AND password = :password
      ");
      $statement->execute(
        [
          ":email"=>$email,
          ":password"=>$password
        ]
      );
      $row = $statement->fetchAll();

      return $row ?? false;
    }
    public function findById($id){
      $statement = $this->db->prepare(
        "
          SELECT users.*, roles.name AS role 
          FROM users LEFT JOIN roles 
          ON users.role_id = roles.id 
          WHERE users.id = :id
        "
      );

      $statement->execute(
        [
          "id"=>$id
        ]
      );

      $row = $statement->fetchAll();

      return $row ?? false;
    }
    public function getALL(){
      $statement = $this->db->query(
        "
        SELECT 
        users.*, roles.name AS role
        FROM users LEFT JOIN roles 
        ON users.role_id = roles.id
      ");

      return $statement->fetchAll();
    }
    public function deleteById($id){
      $statement = $this->db->prepare("
        DELETE FROM users WHERE id = :id
        ");
      $statement->execute([
        ":id" => $id
      ]);
      return $statement->rowCount();
    }
    public function roleChangeById($id, $role){
      $statement = $this->db->prepare("
        UPDATE users SET role_id = :role WHERE id = :id
      ");
      var_dump($statement);
      $statement->execute([
        ":id" => $id,
        ":role" => $role
      ]);
      
      return $statement->rowCount();
    }
    public function edit($id, $name, $email, $phone_number, $address, $city, $postal_code){
      $query = "
        UPDATE users SET 
        name = :name, 
        email = :email,
        phone_number = :phone_number,
        address = :address,
        city = :city,
        postal_code = :postal_code
        where id = :id   
      ";

      $statement = $this->db->prepare($query);

      $statement->execute([
        ":name" => $name,
        ":email" => $email,
        ":phone_number" => $phone_number,
        ":address" => $address,
        ":city" => $city,
        ":postal_code" => $postal_code,
        ":id" => $id
      ]);
      return $statement->rowCount();
    }
    public function upload($id, $image){
      $query = "
        UPDATE users 
        SET image = :image 
        WHERE id = :id
      ";

      $statement = $this->db->prepare($query);

      $statement->execute([
        ":id" => $id,
        ":image" => $image
      ]);

      return $statement->rowCount();
    }
  }