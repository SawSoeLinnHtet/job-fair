<?php

namespace Models\Database;

use PDOException;

class JobsTable
{
  private $db = null;

  public function __construct(MYSQL $db)
  {
    $this->db = $db->connect();
  }
  public function insert($data){
    $query = "
        INSERT INTO jobs (
          name,
          company_id,
          category_id,
          gender,
          salary,
          job_type_id,
          address,
          description,
          requirements,
          close_date,
          created_at
        ) VALUES (
          :name,
          :company_id,
          :category_id,
          :gender,
          :salary,
          :job_type_id,
          :address,
          :description,
          :requirements,
          :close_date,
          now()
        )
      ";
    $statement = $this->db->prepare($query);

    $statement->execute($data);
    return $this->db->lastInsertId();
  }
  public function getAll(){
    $query = "
      SELECT jobs.*, 
      companies.name AS company_name,
      categories.name AS category_name, 
      job_types.name AS job_type_name
      FROM jobs 
      JOIN companies 
      ON jobs.company_id = companies.id
      JOIN categories
      ON jobs.category_id = categories.id
      JOIN job_types
      ON jobs.job_type_id = job_types.id
    ";
    $statement = $this->db->query($query);

    return $statement->fetchAll();
  }
  public function findById($id){
    $query = "
      SELECT jobs.*, 
      companies.name AS company_name,
      categories.name AS category_name, 
      job_types.name AS job_type_name
      FROM jobs 
      JOIN companies 
      ON jobs.company_id = companies.id
      JOIN categories
      ON jobs.category_id = categories.id
      JOIN job_types
      ON jobs.job_type_id = job_types.id
      WHERE jobs.id = :id
    ";
    $statement = $this->db->prepare($query);

    $statement->execute([":id" => $id]);

    $row = $statement->fetchAll();

    return $row ?? '';
  }
  public function delete($id){
    $statement = $this->db->prepare("
      DELETE FROM jobs WHERE id = :id
    ");
    $statement->execute([":id"=>$id]);

    return $statement->rowCount();
  }
  public function edit($id, $name, $company_id, $category_id, $gender, $salary, $job_type_id, $address, $description, $requirements, $close_date){

    try {
      $query = "
      UPDATE jobs SET 
      name = :name,
      company_id = :company_id,
      category_id = :category_id,
      gender = :gender,
      salary = :salary,
      job_type_id = :job_type_id,
      address = :address,
      description = :description,
      requirements = :requirements,
      close_date = :close_date
      WHERE id = :id
    ";
      $statement = $this->db->prepare($query);

      $statement->execute([
        ":id" => $id,
        ":name" => $name,
        ":company_id" => $company_id,
        ":category_id" => $category_id,
        ":gender" => $gender,
        ":salary" => $salary,
        ":job_type_id" => $job_type_id,
        ":address" => $address,
        ":description" => $description,
        ":requirements" => $requirements,
        ":close_date" => $close_date
      ]);

      return $statement->rowCount();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
