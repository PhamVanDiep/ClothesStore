<?php 
    require_once ROOT . DS . 'services' . DS . 'TurnoverService.php';
    $turnover_service = new TurnoverService();
    $week_revenue = $turnover_service->getTurnOverOfWeek();
    $week_revenue = $week_revenue['total_turnover_of_week'];
    $data_chart = $turnover_service->getTurnOverEachDayOfWeek();

    $month_revenue = $turnover_service->getTurnOverOfMonth();
    $month_revenue = $month_revenue['total_turnover_of_month'];
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