<?php


require_once './autoloader.php';

class Transaction implements Model
{

    protected  $db ;
    protected  $table;

    public function create($data)
    {
             $this->db = new Connection();
             $connection = $this->db->connect();

            $keys = array_keys($data);

            $sql ="INSERT INTO $this->table ( ". implode(',' , $keys) .") VALUES('". implode("','" , $data) ."')";
            $stmt = $connection->prepare($sql);
            //print_r($data);
            $stmt->execute($data);

            $msg = "Record successfully created";

        return $msg;

    }

    public function read($id)
    {
        $this->db = new Connection();
        $connection = $this->db->connect();
        $stmt = $connection->prepare('SELECT * FROM'.$this->table.'WHERE id = ?');
        $stmt->execute([$id]);
        return  $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readAll()
    {
        $this->db = new Connection();
        $connection = $this->db->connect();

        $stmt = $connection->prepare('SELECT * FROM '.$this->table);
        $stmt->execute();

        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $records;
    }

    public function delete($id)
    {
            $this->db = new Connection();
            $connection = $this->db->connect();


            $stmt = $connection->prepare('SELECT * FROM contacts WHERE id = ?');
            $stmt->execute([$id]);

            $record = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$record) {
                exit('Contact doesn\'t exist with that ID!');
            }
            $stmt = $connection->prepare('DELETE FROM'.$this->table.' WHERE id = ?');
            $stmt->execute([$id]);

    }

    public function update($data,$id)
    {
        $this->db = new Connection();
        $connection = $this->db->connect();

        $columns = "";
        foreach ($data as $d){
            $columns. "?".",";

        }

        $stmt = $connection->prepare('UPDATE'.$this->table.'SET'.$columns.'WHERE id = ?');
        $stmt->execute([$data]);
    }
}