<?php
    class Controller {
        public $model;
        public $view;
        public $view_modules;

        static function include_class($name) {
            require 'app/controllers/controller_' . $name . '.php';
            require 'app/models/model_' . $name . '.php';
        }
    }
?>