<?php
    class Controller_Notes extends Controller {
        function __construct() {
            $this->model = new Model_Notes;
            $this->view = new View;

            $this->view_modules = [
                'index' => 'note/note_template', 
                'list' => 'note/note_list', 
                'pagination' => 'note/note_pagination', 
                'modal_from' => 'note/note_modal_form'
            ];
        }

        function index() {
            $data = $this->model->getNotes(['limit' => 3, 'action' => 'notes']);
            $this->view->generate($data, $this->view_modules);
        }

        function filter() {
            $data = $this->model->filterNotes([
                'parameters' => $_GET,
                'limit' => 3,
                'action' => 'notes'
            ]);
            $this->view->generate($data, $this->view_modules);
        }
    }
?>