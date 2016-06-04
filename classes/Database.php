<?php
class Database{
    private $connection;

    public function __construct($server='localhost',
                                $username='root',
                                $password='admin',
                                $databasename='catalog_site')
    {
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->databasename = $databasename;
    }
    
    private function open(){
        $this->connection = new mysqli($this->server, $this->username, $this->password, $this->databasename);
        if ($this->connection->connect_error){
            die("Соединение не установлено -- " . $this->connection->connect_error);
        }
    }
    
    private function close(){
        $this->connection->close();
    }

    public function add_category($data){
        $name = $data['name'];
        $short_description = $data['short_description'];
        $full_description = $data['full_description'];
        $active = $data['active'];
        
        $sql = "INSERT INTO category (name, short_description, full_description, active)".
                "VALUES ('".$name ."', '".$short_description."', '".$full_description."', '".$active."')";

        $this->open();
        if ($this->connection->query($sql) === TRUE){
            echo "Запрос выполнен";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
        }
        $this->close();

    }
    
    public function show_categories(){
        $sql = "SELECT * FROM category";
        $this->open();
        $result = $this->connection->query($sql);
        
        return $result;
    }
}