<?php

require_once 'Crud.php';

class User extends Crud {
	
	protected $table = 'users';
	private $name;
	private $email;

	public function setName($name){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (name, email) VALUES (:name, :email)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':email', $this->email);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET name = :name, email = :email WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();

	}

}