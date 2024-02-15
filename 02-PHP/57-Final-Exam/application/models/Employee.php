<?php

class Employee extends CI_Model {

    public function filter($post, $request) {

        $query = "SELECT * FROM employees";
        $count_query = "SELECT COUNT(id) AS count FROM employees";
        $where = array();
        
        if (!empty($post["date"])) {
            if ($post["date"] == "recent") {
                $where[] = "request_date BETWEEN '2024/02/05' AND '2024/02/11'";
            } elseif ($post["date"] == "old") { 
                $where[] = "request_date < '2024/02/04'";
            }
        }

        if (!empty($post["leave_type"])) {
            if ($post["leave_type"] == "vacation") {
                $where[] = "leave_type = 'vacation'";
            } elseif ($post["leave_type"] == "sick_leave") {
                $where[] = "leave_type = 'sick leave'";
            } elseif ($post["leave_type"] == "unpaid_leave") {
                $where[] = "leave_type = 'unpaid leave'";
            } elseif ($post["leave_type"] == "paid_leave") {
                $where[] = "leave_type = 'paid leave'";
            } elseif ($post["leave_type"] == "half_day_unpaid") {
                $where[] = "leave_type = 'half day unpaid'";
            }
        }

        if (!empty($where)) {
            $query .= " WHERE " . implode(" AND ", $where);
            $count_query .= " WHERE " . implode(" AND ", $where);
        }

        if ($request == "result"){
            return $this->db->query($query)->result_array();
        }

        if ($request == "count"){
            return $this->db->query($count_query)->row_array();
        }
    }
}
