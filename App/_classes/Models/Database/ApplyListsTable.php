<?php

  namespace Models\Database;

  class ApplyListsTable{
    private $db = null;

    public function __construct(MYSQL $db)
    {
      $this->db = $db->connect();
    }
    public function insert($data){
      $query =  "
        INSERT INTO applier_lists (
          name,
          email,
          phone_number,
          cv_name,
          user_id,
          job_id,
          created_at
        ) VALUES (
          :name,
          :email,
          :phone_number,
          :cv_name,
          :user_id,
          :job_id,
          now()
        )
      ";
      $statement = $this->db->prepare($query);
      
      $statement->execute($data);

      return $this->db->lastInsertId();
    }
    public function findByJobId($job_id){
      $statement = $this->db->prepare(
        "
          SELECT * 
          FROM applier_lists 
          WHERE job_id = :job_id"
      );
      $statement->execute([
        ":job_id" => $job_id
      ]);
      
      $row = $statement->fetchAll();

      return $row ?? "";
    }
    public function accept($user_id, $job_id){
      $query = "
        DELETE FROM applier_lists 
        WHERE user_id != :user_id AND job_id = :job_id
      ";
      $statement = $this->db->prepare($query);

      $statement->execute([
        ":job_id" => $job_id,
        ":user_id" => $user_id
      ]);

      return $statement->rowCount();
    }
    public function denied($id){
      $query = "
          DELETE FROM applier_lists 
          WHERE id = :id
        ";
      $statement = $this->db->prepare($query);

      $statement->execute([
        ":id" => $id
      ]);
      return $statement->rowCount();
    }
    public function findByAccept($accept, $job_id){
      $statement = $this->db->prepare("
        SELECT * FROM applier_lists WHERE accept = :accept AND job_id = :job_id
      ");
      $statement->execute([
        ":accept" => $accept,
        ":job_id" => $job_id
      ]);
      return $statement->fetchAll();
    }
    public function updateAccept($apply_id){
      $query = "
        UPDATE applier_lists SET accept = 1 WHERE id = :id
      ";
      $statement = $this->db->prepare($query);

      $statement->execute([
        ":id" => $apply_id
      ]);
      return $statement->rowCount();
    }
    public function deleteByUserId($user_id){
      $query = "
        DELETE FROM applier_lists 
        WHERE user_id = :user_id
      ";
      $statement = $this->db->prepare($query);

      $statement->execute([
        ":user_id" => $user_id
      ]);
      return $statement->rowCount();
    }
    public function deleteByJobId($job_id)
    {
      $query = "
          DELETE FROM applier_lists 
          WHERE job_id = :job_id
        ";
      $statement = $this->db->prepare($query);

      $statement->execute([
        ":job_id" => $job_id
      ]);
      return $statement->rowCount();
    }
  }