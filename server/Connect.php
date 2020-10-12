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

            $this->server   =  'localhost';
            $this->user     =  'root';
            $this->password =  '';
            $this->database =  'new_supermercado';
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
            } catch (\PDOException $ex) {
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

    /**
     * retorna o resultado de uma consulta (select) de apenas uma linha
     * @param string $sql the sql string
     * @param array $params the array of parameters (array(":col1" => "val1",":col2" => "val2"))
     * @return one array de posição para o resultado da consulta
     */
    
    public function executeQueryOneRow($sql, $params = null) {
        try {
            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            if ($this->debug) {
                echo "<b>Error on ExecuteQueryOneRow():</b> " . $ex->getMessage() . "<br />";
                echo "<br /><b>SQL: </b>" . $sql . "<br />";

                echo "<br /><b>Parameters: </b>";
                print_r($params) . "<br />";
            }
            die();
            return null;
        }
    }

    /**
     * retorna o resultado de uma consulta  (select)
     * @param string $sql the sql string
     * @param array $params the array of parameters (array(":col1" => "val1",":col2" => "val2"))
     * @return array para o resultado da consulta
     */

    
    public function executeQuery($sql, $params = null) {
        try {
            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            if ($this->debug) {
                echo "<b>Error on ExecuteQuery():</b> " . $ex->getMessage() . "<br />";
                echo "<br /><b>SQL: </b>" . $sql . "<br />";

                echo "<br /><b>Parameters: </b>";
                print_r($params) . "<br />";
            }
            die();
            return null;
        }
    }

    /**
     * retorna se a consulta foi bem sucedida
     * @param string $sql the sql string
     * @param array $params the array of parameters (array(":col1" => "val1",":col2" => "val2"))
     * @return boolean
     */

    
    public function executeNonQuery($sql, $params = null) {
        try {
            $stmt = $this->getConn()->prepare($sql);
            return $stmt->execute($params);
            
        } catch (\PDOException $ex) {
            if ($this->debug) {
                echo "<b>Error on ExecuteNonQuery():</b> " . $ex->getMessage() . "<br />";
                echo "<br /><b>SQL: </b>" . $sql . "<br />";

                echo "<br /><b>Parameters: </b>";
                print_r($params) . "<br />";
            }
            die();
            return false;
        }
    }

    /**
     * retorna o número de linhas afetadas
     * @param string $sql the sql string
     * @param array $params the array of parameters (array(":col1" => "val1",":col2" => "val2"))
     * @return int
     */
    
    public function numberRows($sql, $params = null) {
        try {
            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute($params);

            return $stmt->rowCount();
        } catch (\PDOException $ex) {
            if ($this->debug) {
                echo "<b>Error on ExecuteNonQuery():</b> " . $ex->getMessage() . "<br />";
                echo "<br /><b>SQL: </b>" . $sql . "<br />";

                echo "<br /><b>Parameters: </b>";
            }
            die();
            return -1;
        }
    }

    public function getDebugState() {
        return $this->debug;
    }
}