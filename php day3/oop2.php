<!-- ======== ball task========== -->

<?php

class Ball {
    private float $x;
    private float $y;
    private int $radius;
    private float $xDelta;
    private float $yDelta;

   
    public function __construct(float $x, float $y, int $radius, float $xDelta, float $yDelta) {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
        $this->xDelta = $xDelta;
        $this->yDelta = $yDelta;
    }

    public function getX(): float {
        return $this->x;
    }

    public function setX(float $x): void {
        $this->x = $x;
    }

    public function getY(): float {
        return $this->y;
    }

    public function setY(float $y): void {
        $this->y = $y;
    }

    public function getRadius(): int {
        return $this->radius;
    }

    public function setRadius(int $radius): void {
        $this->radius = $radius;
    }

    public function getXDelta(): float {
        return $this->xDelta;
    }

    public function setXDelta(float $xDelta): void {
        $this->xDelta = $xDelta;
    }

    public function getYDelta(): float {
        return $this->yDelta;
    }

    public function setYDelta(float $yDelta): void {
        $this->yDelta = $yDelta;
    }

    public function move(): void {
        $this->x += $this->xDelta;
        $this->y += $this->yDelta;
    }

    
    public function reflectHorizontal(): void {
        $this->xDelta = -$this->xDelta;
    }

   
    public function reflectVertical(): void {
        $this->yDelta = -$this->yDelta;
    }

    public function toString(): string {
        return "Ball[({$this->x},{$this->y}),speed=({$this->xDelta},{$this->yDelta})]";
    }
}


$ball = new Ball(1.1, 2.2, 10, 0.5, 1.5);
echo "begining of motion " . $ball->toString() . "\n";


$ball->move();
echo "(move): " . $ball->toString() . "\n";


$ball->reflectHorizontal();
$ball->move();
echo "after reflection " . $ball->toString() . "\n";
?>