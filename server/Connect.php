<?php

    class Conn {
        private static $connection;
        private $debug;
        private $server;
        private $user;
        private $password;
        private $database;

        public function __construct() {
            $this->debug = true;

            $this->server   =  '151.106.96.51';
            $this->user     =  'u372636767_caravelas';
            $this->password =  'Supercaravelas2020';
            $this->database =  'u372636767_caravelas';
        }

        private function getConnection() {
            try {
                if (self::$connection == null):
                    self::$connection = new PDO("mysql:host={$this->server};dbname={$this->database};charset=utf8", $this->user, $this->password);
                    self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                    self::$connection->setAttribute(PDO::ATTR_PERSISTENT, true);
                endif;

                return self::$connection;
            } catch (PDOException $ex) {
                if ($this->debug):
                    echo "<b>Error on getConnection(): </b>" . $ex->getMessage() . "<br/>";
                endif;

                die();
            }
        }
    
        public function getConn() {
            return $this->getConnection();
        }

        /* DESCONECTAR BANCO */
        public function Disconnect() {
            self::$connection = null;
        }

        /* PEGAR O ID */
        public function getLastID() {
            return $this->getConn()->lastInsertId();
        }

        public function getDebugState() {
            return $this->debug;
        }
    }
?>