<?php

  namespace Models\Database;

  class BookmarkTable{
    private $db = null;

    public function __construct(MYSQL $db)
    {
      $this->db = $db->connect();
    }
    public function insert($user_id, $job_id){
      $statement = $this->db->prepare("
        INSERT INTO bookmarks (
        user_id, 
        job_id, 
        created_at, 
        updated_at) 
        VALUES (:user_id, 
        :job_id, 
        now(), 
        now())
      "); 
      $statement->execute([
        ":user_id" => $user_id,
        ":job_id" => $job_id
      ]);

      return $this->db->lastInsertId();
    }
    public function getByUserId($user_id){
      $statement = $this->db->prepare("
        SELECT * FROM bookmarks WHERE user_id = :user_id
      ");

      $statement->execute([
        ":user_id" => $user_id
      ]);

      $row = $statement->fetchAll();
      return $row ?? "";
    }
  }