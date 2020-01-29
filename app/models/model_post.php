<?php 
    class Model_Post extends Model {
        function __construct() {
            $this->mysqli_connect();
        }

        function addNote($parameters) {
            $name = htmlspecialchars($parameters['name']);
            $note = htmlspecialchars($parameters['note']);
            $email = htmlspecialchars($parameters['email']);
            if ($name != '' and $note != '' and $email != '') {
                $this->mysqli->query("INSERT INTO `note_list` (`username`, `description`, `email`) VALUES ('". $name ."', '". $note ."', '". $email ."')");    
            }
        }

        function adminAuth($parameters) {
            $username = htmlspecialchars($parameters['username']);
            $password = htmlspecialchars($parameters['password']);
            if ($username != '' and $password != '') {
                $sql = "SELECT `id` FROM `administrators` WHERE `username`='" . $username . "' and `password`='" . md5($password) . "'";
                $get_user = $this->mysqli->query($sql);
            }
            $id = $get_user->fetch_row()[0];
            if ($id != NULL) {
                $_SESSION['isAuth'] = true;
            }
        }

        function editNote($parameters) {
            $note = htmlspecialchars($parameters['note']);
            $id = htmlspecialchars($parameters['id']);
            if (isset($parameters['status'])) {
                $status = 1;
            } else {
                $status = 0;
            }
            if ($note != '') {
                $this->mysqli->query("UPDATE `note_list` SET `description`='". $note ."', `status`=" . $status . " WHERE `id`='". $id ."'");    
            }
        }
    }
?>