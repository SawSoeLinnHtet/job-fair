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
  }