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
  }