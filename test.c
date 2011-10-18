#include <stdio.h>

#define SIZE 5

int paths = 0;
int targetX = SIZE - 1;
int targetY = SIZE - 1;

int grid[SIZE][SIZE];

void move(int x, int y) {
	grid[x][y] = 1;

	if (x == targetX && y == targetY) {
		paths = paths + 1;
	} else {
		// look right
		if (x < SIZE - 1 && 0 == grid[x + 1][y]) {
			move(x + 1, y);
		}

		// look left
		if (x > 0 && y < SIZE - 1 && y != 0 && 0 == grid[x - 1][y]) {
			move(x - 1, y);
		}

		// look up
		if (y < SIZE - 1 && 0 == grid[x][y + 1]) {
			move(x, y + 1);
		}

		// look down
		if (y > 0 && x > 0 && x < SIZE - 1 && 0 == grid[x][y - 1]) {
			move(x, y - 1);
		}
	}

	grid[x][y] = 0;
}

void main() {
	int x = 0;
	int y = 0;
	for (; x < SIZE; x++) {
		for (; y < SIZE; y++) {
			grid[x][y] = 0;
		}
	}

	// set start
	grid[0][0] = 1;

	move(0, 1);
	printf("%d paths\n", paths * 2);
}
