<?php


class IndexModel extends Model
{
    public function getAllTasks()
    {
        $sql = "SELECT * FROM tasks";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS);
    }

    public function getTasks($orderBy, $startIndex, $rows)
    {
        $sql = "SELECT * FROM tasks ORDER BY $orderBy LIMIT :startindex, :rows";
        $query = $this->db->prepare($sql);
        $query->bindParam(":startindex", $startIndex, PDO::PARAM_INT);
        $query->bindParam(":rows", $rows, PDO::PARAM_INT);

        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS);
    }
}