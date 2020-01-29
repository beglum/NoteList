<?php 
    class Model {
        protected $mysqli;

        public function mysqli_connect() {
            include 'app/config.php';

            $this->mysqli = new mysqli($host, $user, $password);
            if ($this->mysqli->connect_error) {
                include 'app/views/view_mysqli_connect_error.php';
                exit();
            }
            $this->mysqli->query("USE `notes`");
            if ($this->mysqli->error != "") {
                include 'app/views/view_mysqli_connect_error.php';
                exit();
            }
            $this->mysqli->select_db($db_name);
        }
    }
?>