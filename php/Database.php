<?php
require_once('Connection.php');

class Database
{
    public $query;
    public $conn;
    public $mysqli;

    public function __construct()
    {
        $this->conn = new Connection();
        $this->mysqli = $this->conn->mysqli;
    }

    public function table(string $table): self
    {
        $this->query = "SELECT * FROM $table";
        return $this;
    }

    public function select(string ...$str): self
    {
        $sql = '';

        foreach ($str as $value) {
            $sql .= $value.", ";
        }

        $sql = substr($sql, 0, -2);
        $this->query = str_replace('*', $sql, $this->query);
        
        return $this;
    }

    public function where(array $array): self
    {
        $sql = ' WHERE ';

        if(count($array) == 1) {
            $sql .= array_keys($array)[0] ." = '". $array[array_keys($array)[0]] ."'";
        } else {
            foreach($array as $key => $value) {
                $sql .= $key ." = '". $value . "' AND ";
            }
            $sql = substr($sql, 0, -5);
        }

        $this->query .= $sql;

        return $this;
    }

    public function orderBy(array $array): self
    {
        $sql = ' ORDER BY ';

        foreach($array as $key => $value) {
            $sql .= $key." ".$value.", ";
        }
        $sql = substr($sql, 0, -2);
        $this->query .= $sql;

        return $this;
    }

    public function get()
    {
        $result = $this->mysqli->query($this->query) or trigger_error('Terdapat kesalahan query: '.$this->mysqli->error);
        
        return $result->fetch_all(MYSQLI_ASSOC);
        // echo $this->query;
    }

    public function first()
    {
        $this->query .= ' limit 1';

        $result = $this->mysqli->query($this->query) or trigger_error('Terdapat kesalahan query: '.$this->mysqli->error);
        
        return $result->fetch_assoc();
    }
}

$db = new Database();

$mahasiswa = $db->table('mahasiswa')
    ->select('npm', 'nama', 'prodi', 'kelas')
    // ->where([
    //     'npm' => '111',
    //     'kelas' => 'A',
    //     'prodi' => 'Informatika'
    // ])
    ->orderBy(['npm' => 'DESC'])
    ->get();

    echo "<pre>";
    print_r($mahasiswa);
    echo "</pre>";
