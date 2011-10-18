package main

import fmt "fmt"

const SIZE = 5

var paths int = 0
var targetX int = SIZE - 1
var targetY int = SIZE - 1
var grid [SIZE][SIZE]int

func main() {
	for ix := 0; ix < len(grid); ix++ {
		for iy := 0; iy < len(grid[ix]); iy++ {
			grid[ix][iy] = 0
		}
	}

	// set start
	grid[0][0] = 1

	move(0, 1)
	fmt.Printf("%d paths\n", paths * 2)
}

func move(x int, y int) {
	grid[x][y] = 1

	if x == targetX && y == targetY {
		paths = paths + 1
	} else {
		// look right
		if x < SIZE - 1 && 0 == grid[x + 1][y] {
			move(x + 1, y)
		}

		// look left
		if x > 0 && y < SIZE - 1 && y != 0 && 0 == grid[x - 1][y] {
			move(x - 1, y)
		}

		// look up
		if y < SIZE - 1 && 0 == grid[x][y + 1] {
			move(x, y + 1)
		}

		// look down
		if y > 0 && x > 0 && x < SIZE - 1 && 0 == grid[x][y - 1] {
			move(x, y - 1)
		}
	}

	grid[x][y] = 0
}
