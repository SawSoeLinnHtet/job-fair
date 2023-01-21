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
      companies.image AS company_image,
      categories.name AS category_name, 
      job_types.name AS job_type_name
      FROM jobs 
      JOIN companies 
      ON jobs.company_id = companies.id
      JOIN categories
      ON jobs.category_id = categories.id
      JOIN job_types
      ON jobs.job_type_id = job_types.id
      ORDER BY jobs.created_at DESC
    ";
    $statement = $this->db->query($query);

    return $statement->fetchAll();
  }
  public function findById($id){
    $query = "
      SELECT jobs.*, 
      companies.name AS company_name,
      companies.image AS company_image,
      companies.location AS company_address,
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
  public function edit($data){

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
      close_date = :close_date,
      updated_at = now()
      WHERE id = :id
    ";
      $statement = $this->db->prepare($query);

      $statement->execute([
        ":id" => $data['id'],
        ":name" =>  $data['name'],
        ":company_id" => $data['company_id'],
        ":category_id" => $data['category_id'],
        ":gender" => $data['gender'],
        ":salary" => $data['salary'],
        ":job_type_id" => $data['job_type_id'],
        ":address" => $data['address'],
        ":description" => $data['description'],
        ":requirements" => $data['requirements'],
        ":close_date" => $data['close_date']
      ]);

      return $statement->rowCount();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
  public function findByCategory($category_id){
    $query = "
      SELECT jobs.*, 
      companies.name AS company_name,
      companies.image AS company_image,
      companies.location AS company_address,
      categories.name AS category_name, 
      job_types.name AS job_type_name
      FROM jobs 
      JOIN companies 
      ON jobs.company_id = companies.id
      JOIN categories
      ON jobs.category_id = categories.id
      JOIN job_types
      ON jobs.job_type_id = job_types.id
      WHERE jobs.category_id = :category_id
      ORDER BY jobs.created_at DESC
    ";
    $statement = $this->db->prepare($query);

    $statement->execute([
      ":category_id" => $category_id
    ]);

    return $statement->fetchAll();
  }
  public function findByCompany($company_id){
    $query = "
      SELECT jobs.*, 
      companies.name AS company_name,
      companies.image AS company_image,
      companies.location AS company_address,
      categories.name AS category_name, 
      job_types.name AS job_type_name
      FROM jobs 
      JOIN companies 
      ON jobs.company_id = companies.id
      JOIN categories
      ON jobs.category_id = categories.id
      JOIN job_types
      ON jobs.job_type_id = job_types.id
      WHERE jobs.company_id = :company_id
      ORDER BY jobs.created_at DESC
    ";
    $statement = $this->db->prepare($query);

    $statement->execute([
      ":company_id" => $company_id
    ]);

    return $statement->fetchAll();
  }
  public function findByCompanyAndCategory($company_id, $category_id){
    $query = "
      SELECT jobs.*, 
      companies.name AS company_name,
      companies.image AS company_image,
      companies.location AS company_address,
      categories.name AS category_name, 
      job_types.name AS job_type_name
      FROM jobs 
      JOIN companies 
      ON jobs.company_id = companies.id
      JOIN categories
      ON jobs.category_id = categories.id
      JOIN job_types
      ON jobs.job_type_id = job_types.id
      WHERE jobs.company_id = :company_id 
      AND jobs.category_id = :category_id
      ORDER BY jobs.created_at DESC
    ";
    $statement = $this->db->prepare($query);

    $statement->execute([
      ":company_id" => $company_id,
      ":category_id" => $category_id
    ]);

    return $statement->fetchAll();
  }
  public function findCategoryByCompanyId($company_id){
    $query = "
      SELECT 
        category_id
      FROM
        jobs
      WHERE company_id = :company_id
      GROUP BY category_id
    ";
    $statement = $this->db->prepare($query);

    $statement->execute([
      ":company_id" => $company_id
    ]);
    
    return $statement->fetchAll();
  }
}
