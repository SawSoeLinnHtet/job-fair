<?php

  namespace Models\Database;

  class JobTypesTable
  {
    private $db = null;

    public function __construct(MYSQL $db)
    {
      $this->db = $db->connect();
    }
    public function getAll(){
      $statement = $this->db->query("
          SELECT * FROM job_types        
      ");
      
      return $statement->fetchAll();
    }
  }