<?php
    class Controller_Post {
        static function index($parameters) {
            include('app/models/model_post.php');
            switch ($parameters['action']) {
                case 'note_add':
                    $model = new Model_Post;
                    $model->addNote($parameters);
                break;
                case 'note_edit':
                    $model = new Model_Post;
                    $model->editNote($parameters);
                break;
                case 'admin_auth':
                    $model = new Model_Post;
                    $model->adminAuth($parameters);
                break;
            }
        }
    }
?>