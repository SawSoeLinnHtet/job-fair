<?php

  namespace Models\Database;

  use PDO;
  use PDOException;
  class MailsTable{
    private $db = null;

    public function __construct(MYSQL $db)
    {
      $this->db = $db->connect();
    }
    public function insert($data){
      try{
        $query = "
          INSERT INTO mails (
            recipient,
            title,
            message,
            sender,
            user_id,
            job_id,
            created_at
          ) VALUES (
            :recipient,
            :title,
            :message,
            :sender,
            :user_id,
            :job_id,
            now()
          )
        ";
        $statement = $this->db->prepare($query);
      
        $statement->execute($data);
        return $this->db->lastInsertId();
      }catch(PDOException $e){
        return $e->getMessage();
      }
    }
    public function getByUser($user_id){
      $query = "SELECT * FROM mails WHERE user_id = :user_id";
      $statement = $this->db->prepare($query);

      $statement->execute([":user_id"=>$user_id]);

      return $statement->fetchAll() ?? null;
    }
  }