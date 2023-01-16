<?php

  namespace Models\Database;

  class MailTable{
    private $db = null;

    public function __construct(MYSQL $db)
    {
      $this->db = $db->connect();
    }
    public function insert($data){
      $query = "
        INSERT INTO mails (
          user_id,
          message,
          created_at
        ) VALUES (
          :user_id,
          :message,
          now()
        )
      ";
      $statement = $this->db->prepare($query);
      
      $statement->execute($data);

      return $this->db->lastInsertId();
    }
    public function deleteByUser($user_id){
      $statement = $this->db->prepare("
        DELETE FROM mails WHERE user_id = :user_id
      ");
      $statement->execute(
        [":user_id"=>$user_id]
      );
      return $statement->rowCount();
    }
  }