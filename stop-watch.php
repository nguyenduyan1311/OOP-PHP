<?php
$number = array();
for ($i = 0;$i < 10000;$i++) {
    array_push($number,mt_rand(0,10000));
}
function selectSort($array) {
    for ($j = 0;$j < count($array);$j++) {
        $min = $j;
        for ($i = $j + 1; $i < count($array); $i++) {
            if ($array[$min] > $array[$i]) {
                $min = $i;
            };
        }
        $temp = $array[$j];
        $array[$j] = $array[$min];
        $array[$min] = $temp;
    }
    return $array;
}
class StopWatch {
    private $startTime;
    private $endTime;
    function __construct() {
        $this->startTime = currentTime(true);
    }
    public function get_startTime() {
        return $this->startTime;
    }
    public function get_endTime() {
        return $this->endTime;
    }
    public function start() {
        $this->startTime = currentTime(true);
    }
    public function stop() {
        $this->endTime = currentTime(true);
    }
    public function getElapsedTime() {
        $elapseTime = $this->endTime - $this->startTime;
        return round($elapseTime * 1000, 0);
    }
}
$stopWatch = new StopWatch();
echo ($stopWatch->get_startTime());
$stopWatch->start();
selectSort($number);
$stopWatch->stop();
echo "<br/>Times: " . $stopWatch->getElapsedTime() . " miliseconds<br/>";
print_r(selectSort($number));
?>