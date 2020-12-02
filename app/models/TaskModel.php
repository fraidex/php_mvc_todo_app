<?php


class TaskModel extends Model
{
    public function save($data)
    {
        $sql = "INSERT INTO tasks (name, email, description) VALUES (:name, :email, :description)";
        $query = $this->db->prepare($sql);
        $query->execute($data);
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM tasks WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(":id", $id, PDO::PARAM_STR);
        $query->execute();
    }

    public function updateById($data)
    {
        $sql = "UPDATE tasks SET name = :name, email = :email, description = :description, completed = :completed, edited = :edited WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute($data);
        print_r($query->errorInfo());
    }

    public function updateComplete($id, $complete)
    {
        $sql = "UPDATE tasks SET completed = :completed WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(":id", $id, PDO::PARAM_STR);
        $query->bindParam(":completed", $complete, PDO::PARAM_STR);
        $result = $query->execute();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM tasks WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(":id", $id, PDO::PARAM_STR);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_CLASS);
        if (!empty($result)) {
            return $result;
        } else {
            return false;
        }
    }


}