<?php
class Rosa
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function createRosa($id_squad, $id_league, $id_player)
    {
        $sql = "INSERT INTO `rosa` (id_squad, id_league, id_player)
                VALUES (?, ?, ?);";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('iii', $id_squad, $id_league, $id_player);
        return $stmt->execute();
    }

    public function getRosa($id)
    {
        $sql = "SELECT * FROM `rosa` WHERE id = ". $this->conn->real_escape_string($id) .";";

        return $this->conn->query($sql);
    }

    public function getArchiveRosa()
    {
        $sql = "SELECT * FROM `rosa`";

        return $this->conn->query($sql);
    }

}
?>