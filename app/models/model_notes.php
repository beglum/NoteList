<?php
    class Model_Notes extends Model {
        function __construct() {
            $this->mysqli_connect();
        }

        public function getNotes($filters) {
            $result = $this->mysqli->query("SELECT * FROM `note_list` ORDER BY `created_at` DESC LIMIT " . $filters['limit']);
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data['notes'][] = $row;
            }
            $data['pagination']['currentPage'] = 1;

            $resultCountNotes = $this->mysqli->query("SELECT COUNT(*) FROM `note_list`");
            $data['pagination']['countPages'] = ceil((float)$resultCountNotes->fetch_row()[0] / $filters['limit']);
            $data['generalLink'] = "/". $filters['action'] ."/filter/";
            $data['action'] = $filters['action'];
            $data['filterLink'] = $data['generalLink'];
            $data['pagination']['paginationLink'] = $data['filterLink'] . "?page=";
            return $data;
        }

        public function filterNotes($filters) {
            $parameters = $filters['parameters'];
            $count_parameters = count($parameters);
            
            $data = array();
            $sql_filter = array();
            $filter_list = array();
            $sql_limit = $filters['limit'];
            $data['pagination']['currentPage'] = 1;

            foreach ($parameters as $key => $value) {
                switch ($key) {
                    case 'user':
                        if ($value != '') {
                            $sql_filter[] = "`username`='" . rawurldecode($value) . "'";
                            $data['filters'] = true;
                            $filter_list[] = $key . "=" . $value;
                        }
                    break;
                    case 'email':
                        if ($value != '') {
                            $sql_filter[] = "`email`='" . rawurldecode($value) . "'";
                            $data['filters'] = true;
                            $filter_list[] = $key . "=" . $value;
                        }
                    break;
                    case 'status':
                        if ($value != '') {
                            $sql_filter[] = "`status`='" . $value . "'";
                            $data['filters'] = true;
                            $filter_list[] = $key . "=" . $value;
                        }
                    break;
                    case 'page':
                        if ($value != '') {
                            $sql_limit = $this->limitController($value, $filters['limit']);
                            $data['pagination']['currentPage'] = $this->getPage($value);
                        }
                    break;
                }
            }

            $data['generalLink'] = "/". $filters['action'] ."/filter/";
            $data['filterLink'] = $data['generalLink'];
            $data['pagination']['paginationLink'] = $data['generalLink'] . "?page=";

            if (count($filter_list) != 0) {
                $data['filterLink'] .= "?" . implode("&", $filter_list);
                $data['pagination']['paginationLink'] = $data['filterLink'] . "&page=";
            }

            if (count($sql_filter) > 0) {
                $sql_filter = " WHERE " . implode(" and ", $sql_filter);
            } else {
                $sql_filter = "";
            }

            $result = $this->mysqli->query("SELECT * FROM `note_list`". $sql_filter ." ORDER BY `created_at` DESC LIMIT " . $sql_limit);
            $data['notes'] = array();
            if (!$this->mysqli->error) {
                while ($row = $result->fetch_assoc()) {
                    $data['notes'][] = $row;
                }
            }

            $resultCountNotes = $this->mysqli->query("SELECT COUNT(*) FROM `note_list`". $sql_filter);
            $data['pagination']['countPages'] = ceil((float)$resultCountNotes->fetch_row()[0] / $filters['limit']);
            $data['action'] = $filters['action'];

            return $data;
        }

        private function getPage($page) {
            if (preg_match("/^\d+$/", (int)$page)) {
                return (int)$page;
            } else {
                return 1;
            }
        }

        private function limitController($page, $limit) {
            $page = $this->getPage($page);
            $sql_string = (($page - 1) * $limit) . ", " . $limit;
            return $sql_string;
        }
    }
?>