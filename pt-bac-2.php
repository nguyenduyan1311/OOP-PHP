<form method="post">
    <input type="number" name="a" placeholder=""><br>
    <input type="number" name="b" placeholder=""><br>
    <input type="number" name="c" placeholder=""><br>
    <button>Calculate</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    $result = new QuadraticEquation($a,$b,$c);
    $result->getRoot();
}
class QuadraticEquation {
    private $a, $b, $c;
    function __construct($a, $b, $c) {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
    function get_a() {
        return $this->a;
    }
    function get_b() {
        return $this->b;
    }
    function get_c() {
        return $this->c;
    }
    function getDiscriminant() {
        return ($this->b * $this->b) - 4 * $this->a * $this->c;
    }
    function getRoot1() {
        return (-$this->b + Math.pow($this->getDiscriminant(), 0.5)) / (2 * $this->a);
    }
    function getRoot2() {
        return (-$this->b - Math.pow($this->getDiscriminant(), 0.5)) / (2 * $this->a);
    }
    function getRoot() {
        $delta = $this->getDiscriminant();
            if ($delta < 0) {
                echo "The equation has no roots";
            }
            if ($delta == 0) {
                echo "Phương trình có nghiệm kép: " . $this->getRoot1();
            }
            if ($delta > 0) {
                echo "Phương trình có 2 nghiệm phân biệt: " . $this->getRoot1() . " và " . $this->getRoot2();
            }
    }
}
