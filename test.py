class grid:
	grid = []
	size = 0
	paths = 0;
	x = 0
	y = 0

	def __init__(self, size, x, y):
		self.size = size
		self.x = x -1
		self.y = y -1

		self.grid = range(0, self.size)
		for x in range(0, self.size):
			self.grid[x] = range(0, self.size)
			for y in range(0, self.size):
				self.grid[x][y] = 0

	def setStart(self, x, y):
		self.grid[x][y] = 1

	def move(self, x, y):
		self.grid[x][y] = 1

		if x == self.x and y == self.y:
			self.paths = self.paths + 1
		else:
			# look right
			if x < self.size - 1 and 0 == self.grid[x + 1][y]:
				self.move(x + 1, y)

			# look left
			if x > 0 and y < self.size - 1 and y != 0 and 0 == self.grid[x - 1][y]:
				self.move(x - 1, y)

			# look up
			if y < self.size - 1 and 0 == self.grid[x][y + 1]:
				self.move(x, y + 1)

			# look down
			if y > 0 and x > 0 and x < self.size - 1 and 0 == self.grid[x][y - 1]:
				self.move(x, y - 1)

		self.grid[x][y] = 0

	def getPathCount(self):
		return self.paths

grid = grid(5, 5, 5)
grid.setStart(0, 0)
grid.move(0, 1)
print grid.getPathCount() * 2
