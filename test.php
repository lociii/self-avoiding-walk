<?php

class grid {
	private $grid = array();
	private $size = 0;
	private $paths = 0;
	private $x = 0;
	private $y = 0;

	public function __construct($size, $x, $y) {
		$this->size = (int)$size;
		$this->x = (int)$x - 1;
		$this->y = (int)$y - 1;

		for ($i = 0; $i < $this->size; $i++) {
			for ($j = 0; $j < $this->size; $j++) {
				$this->grid[$i][$j] = 0;
			}
		}
	}

	public function setStart($x, $y) {
		$this->grid[$x][$y] = 1;
	}

	public function move($x, $y) {
		$this->grid[$x][$y] = 1;

		if ($x == $this->x && $y == $this->y) {
			$this->paths++;
		}
		else {
			// move right
			if ($x < $this->size - 1 && (0 === $this->grid[$x + 1][$y])) {
				$this->move($x + 1, $y);
			}
			// look left
			if ($x > 0 && $y < $this->size -1 && $y != 0 && 0 === $this->grid[$x - 1][$y]) {
				$this->move($x - 1, $y);
			}
			// look up
			if ($y < $this->size - 1 && (0 === $this->grid[$x][$y + 1])) {
				$this->move($x, $y + 1);
			}
			// look down
			if ($y > 0 && $x > 0 && $x < $this->size - 1 && 0 === $this->grid[$x][$y - 1]) {
				$this->move($x, $y - 1);
			}
		}
		$this->grid[$x][$y] = 0;
	}

	public function getPathCount() {
		return $this->paths;
	}
}

$grid = new grid(5, 5, 5);
$grid->setStart(0, 0);
$grid->move(0, 1);
echo $grid->getPathCount() * 2;