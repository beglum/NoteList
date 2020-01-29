<?php
    class View {
        function generate($data = NULL, $content_view = NULL, $template_view = 'view_template') {
            if ($content_view != NULL) {
                foreach ($content_view as $index=>$content_template_link) {
                    $content_view[$index] = 'app/views/' . $content_template_link . '.php';
                }
            }
            include 'app/views/' . $template_view . '.php';
        }
    }
?>