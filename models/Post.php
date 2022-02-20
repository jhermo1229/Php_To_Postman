<?php
    class Post {

        private $conn;
        private $table = 'products';


        //properties

        public $id;
        public $product_name;
        public $description;
        public $url;

        //constructor with db
        public function __construct($db) {
            $this->conn = $db;
        }


        public function read(){
            //create query

            $query = 'SELECT 
                        c.id,
                        c.product_name,
                        c.description,
                        c.image_url
                        FROM
                        ' .$this->table . ' c
                        ORDER BY
                            c.id';


            //Prepared statement

            $stmt = $this->conn->prepare($query);

            //Execute Query
            $stmt->execute();

            return $stmt;
        }

        public function read_single(){
            //create query

            $query = 'SELECT 
                        c.id,
                        c.product_name,
                        c.description,
                        c.image_url
                        FROM
                        ' .$this->table . ' c
                        WHERE 
                            c.id = ?
                        LIMIT 0,1';


            //Prepared statement

            $stmt = $this->conn->prepare($query);

            $stmt->bindparam(1, $this->id);

            

            //Execute Query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id = $row['id'];
            $this->product_name = $row['product_name'];
            $this->description = $row['description'];
            $this->url = $row['image_url'];

            
        }
    }