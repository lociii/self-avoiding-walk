var grid = {
	grid: {},
	size: 0,
	paths: 0,
	x: 0,
	y: 0,

	init: function(size, x, y) {
		this.size = size;
		this.x = x - 1;
		this.y = y - 1;

		for (var i = 0; i < this.size; i++) {
			for (var j = 0; j < this.size; j++) {
				if (!this.grid[i]) {
					this.grid[i] = {}
				};
				this.grid[i][j] = 0;
			}
		}
	},

	setStart: function(x, y) {
		this.grid[x][y] = 1;
	},

	move: function(x, y) {
		this.grid[x][y] = 1;

		if (x == this.x && y == this.y) {
			this.paths++;
		}
		else {
			if (x < this.size - 1 && (0 === this.grid[x + 1][y])) {
				this.move(x + 1, y);
			}
			if (x > 0 && y < this.size - 1 && y != 0 && 0 === this.grid[x - 1][y]) {
				this.move(x - 1, y);
			}
			if (y < this.size - 1 && (0 === this.grid[x][y + 1])) {
				this.move(x, y + 1);
			}
			if (y > 0 && x > 0 && x < this.size - 1 && 0 === this.grid[x][y - 1]) {
				this.move(x, y - 1);
			}
		}
		this.grid[x][y] = 0;
	},

	getPathCount: function() {
		return this.paths;
	}
};

grid.init(5, 5, 5);
grid.setStart(0, 0);
grid.move(0, 1);
console.log(grid.getPathCount() * 2);