public class test {
	private int[][] grid;
	private int size = 0;
	private int paths = 0;
	private int targetX = 0;
	private int targetY = 0;

	public static void main(String[] args) {
		test robot = new test(5, 5, 5);
		robot.setStart(0, 0);
		robot.move(0, 1);
		System.out.println(robot.getPathCount());
	}

	public test(int size, int x, int y) {
		this.size = size;
		this.targetX = x;
		this.targetY = y;
		this.grid = new int[5][5];

		for (int i = 0; i < this.size; i++) {
			for (int j = 0; j < this.size; j++) {
				this.grid[i][j] = 0;
			}
		}
	}

	public void setStart(int x, int y) {
		this.grid[x][y] = 1;
	}

	public void move(int x, int y) {
		this.grid[x][y] = 1;

		if (x == this.targetX - 1 && y == this.targetY - 1) {
			this.paths++;
		}
		else {
			// move right
			if (x < this.size - 1 && (0 == this.grid[x + 1][y])) {
				this.move(x + 1, y);
			}
			// look left
			if (x > 0 && y < this.size -1 && y != 0 && 0 == this.grid[x - 1][y]) {
				this.move(x - 1, y);
			}
			// look up
			if (y < this.size - 1 && (0 == this.grid[x][y + 1])) {
				this.move(x, y + 1);
			}
			// look down
			if (y > 0 && x > 0 && x < this.size - 1 && 0 == this.grid[x][y - 1]) {
				this.move(x, y - 1);
			}
		}
		this.grid[x][y] = 0;
	}

	public int getPathCount() {
		return (this.paths * 2);
	}
}
