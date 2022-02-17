<?php
    class Post {

        private $conn;
        private $table = 'products';


        //properties

        public $id;
        public $productName;
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
                        c.productName,
                        c.description
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
    }