<?php
    require_once '../../library_config.php';
    require_once ROOT . DS . 'services' . DS . 'TurnoverService.php';
    $turnover_service = new TurnoverService();

    if ($_GET['type'] == "month") {
        $month_revenue = $turnover_service->getTurnOverOfMonth();
        $month_revenue = $month_revenue['total_turnover_of_month'];
        if ($month_revenue == NULL) {
            $month_revenue = 0;
        }
        $data_chart = $turnover_service->getTurnOverEachDayOfMonth();

        $xValue = array();
        $yValue = array();
        
        $month = date('m');
        $year = date('Y');

        for($d = 1; $d <= 31; $d++)
        {
            $time = mktime(12, 0, 0, $month, $d, $year);          
            if (date('m', $time) == $month) {
                $date_this = date('d-m', $time);
                array_push($xValue, $date_this);
                $had = false;
                foreach ($data_chart as $row) {
                    if ($row['day'] == $date_this) {
                        array_push($yValue, $row['turnover']);
                        $had = true;
                        break;
                    }
                }
                if(!$had) array_push($yValue, 0);
            }
        }
        echo json_encode(array($month_revenue, js_array($yValue), js_array($xValue)));

    } else if ($_GET['type'] == "week") {
        $week_revenue = $turnover_service->getTurnOverOfWeek();
        $week_revenue = $week_revenue['total_turnover_of_week'];
        if ($week_revenue == NULL) {
            $week_revenue = 0;
        }
        $data_chart = $turnover_service->getTurnOverEachDayOfWeek();

        $xValue = array();
        $yValue = array();

        $num = 6;
        while ($num >= 0) {
            $had = 0;
            $temp = date('d-m',strtotime("-" . $num . " days"));
            array_push($xValue, $temp);
            foreach ($data_chart as $key) {
                if ($key['day'] == $temp) {
                    array_push($yValue, $key['turnover']);
                    $had = 1;
                    break;
                }
            }
            if ($had === 0) array_push($yValue, 0);
            $num--;
        }

        echo json_encode(array($week_revenue, js_array($yValue), js_array($xValue)));
    }

    function js_str($s)
    {
        return '"' . addcslashes($s, "\0..\37\"\\") . '"';
    }

    function js_array($array)
    {
        $temp = array_map('js_str', $array);
        return '[' . implode(',', $temp) . ']';
    }