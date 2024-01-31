<?php

class queryBuilder extends databaseConnection {

    public $query_list;
    public $table_name;
    public $count = "COUNT(*)";
    public $complete_query;

    public function select($columns) {
        $query = "SELECT ";
        //* $columns = array("column1", "column2", "column3")
        $query .= (implode(",", $columns) . " FROM " . $this->table_name);
        $this->query_list = [$query];
        return $this;
    }

    public function where($conditions) {

        //* $condition = array("fruits" => "apple")
        $index = 1;
        $query = "WHERE ";
        foreach ($conditions as $keys => $condition) {
            if (count($conditions) < ($index)) {
                $query .= " AND ";
            }
            $query .=  ($keys . " = " . "'" .$condition . "'");

            $index++;
        }
        $this->query_list[] = $query;
        return $this;
    }

    public function group_by($columns) {
        if (is_array($columns)) {
            $columns = implode(",", $columns);
        }
        $query = "GROUP BY ";
        $query .= $columns;
        $this->query_list[] = $query;
        return $this;
    }

    public function having($column, $operator, $value) {
        $query = "HAVING $column $operator $value";
        $this->query_list[] = $query;
        return $this;
    }

    public function get() {
        $this->complete_query = implode(" ", $this->query_list);
        
        return $this;
    }
}
