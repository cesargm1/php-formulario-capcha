<?php

class Departaments

{
    public $name;
    public $teacher_id;
    private $conn;

    public function __construct($name, $teacher_id, $conn)
    {
        $this->conn = $conn;
        $this->teacher_id = $teacher_id;
        $this->name = $name;
    }

    public function create()
    {
        $sql__insert_employe = "INSERT INTO departments (name, teacher_id) VALUES (?, ?)";

        $stmt = $this->conn->prepare($sql__insert_employe);
        $stmt->bind_param('ss', $this->name, $this->teacher_id);

        $stmt->execute();
    }
}
