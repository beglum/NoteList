<?php
    Controller::include_class('notes');

    class Controller_Admin extends Controller_Notes {
        function __construct() {
            $this->model = new Model_Admin;
            $this->model_notes = new Model_Notes;
            $this->view = new View;

            $this->view_modules = [
                'index' => 'admin/admin_template',
                'list' => 'note/note_list', 
                'pagination' => 'note/note_pagination',
                'modal_form' => 'admin/admin_modal_form'
            ];
        }
        function index() {
            if (isset($_SESSION['isAuth'])) {
                $data = $this->model_notes->getNotes([
                    'limit' => 10,
                    'action' => 'admin'
                ]);

                $this->view->generate($data, $this->view_modules);
            } else {
                $this->view->generate('', ['index' => 'admin/admin_auth']);
            }
        }

        function filter() {
            if (isset($_SESSION['isAuth'])) {
                $data = $this->model_notes->filterNotes([
                    'parameters' => $_GET,
                    'limit' => 10,
                    'action' => 'admin'
                ]);

                $this->view->generate($data, $this->view_modules);
            } else {
                header('Location: /admin');
            }
        }

        function exit() {
            $_SESSION = [];
            header('Location: /');
        }
    }
?>