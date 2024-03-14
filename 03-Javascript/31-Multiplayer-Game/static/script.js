const socket = io();
// Get the canvas element and its 2D rendering context
const canvas = document.getElementById("canvas1");
const ctx = canvas.getContext("2d");
const displayScore = document.getElementById("score");
const displayResources = document.getElementById("resources");
const displayMode = document.getElementById("mode");
const defenderMode = document.getElementById("defender-mode");
const enemyMode = document.getElementById("enemy-mode");
const modeSelector = document.getElementById("mode-selector");

// Set the canvas dimensions
canvas.width = 900;
canvas.height = 600;

// Global variables
const cellSize = 100; // Size of each grid cell
const cellGap = 3; // Gap between cells
let numberOfResources = 300; // Initial number of resources
let enemiesInterval = 600; // Interval for spawning enemies
let frame = 0; // Frame counter
let gameOver = false; // Flag to indicate game over
let score = 0; // Player's score
const winningScore = 50; // Score required to win
let gameMode = "spectator"; // Game mode: defender, enemy, or spectator

// Arrays to store game elements
const gameGrid = []; // The game grid
const defenders = []; // Array to store defender objects
const enemies = []; // Array to store enemy objects
const enemyPositions = []; // Array to store enemy positions
const projectiles = []; // Array to store projectile objects
const resources = []; // Array to store resource objects

//! Sprites

// Defenders
const defendersType = [];
const peashooter = []; // Peashooter sprites
for (let i = 1; i <= 25; i++) {
	const imageName = `PeashooterIdle${i.toString().padStart(4, "0")}.png`;
	const image = new Image();
	image.src = `/images/peashooter/${imageName}`;
	peashooter.push(image);
}
defendersType.push(peashooter);

// Enemies
const enemiesType = {};
const zombieWalking = []; // Zombie sprites
for (let i = 46; i <= 138; i++) {
	const imageName = `mustache${i.toString().padStart(4, "0")}.png`;
	const image = new Image();
	image.src = `/images/zombie/${imageName}`;
	zombieWalking.push(image);
}
enemiesType["walking"] = zombieWalking;
const zombieAttacking = []; // Zombie attacking sprites
for (let i = 139; i <= 178; i++) {
	const imageName = `mustache${i.toString().padStart(4, "0")}.png`;
	const image = new Image();
	image.src = `/images/zombie/${imageName}`;
	zombieAttacking.push(image);
}
enemiesType["attacking"] = zombieAttacking;

console.log(enemiesType);

const gameInfo = new Image();
gameInfo.src = "/images/brick.png";

const texture = [];
const grass = new Image();
grass.src = "/images/grass.png";

const moss = new Image();
moss.src = "/images/mossy.png";
texture.push(grass);
texture.push(moss);

// Mouse object
const mouse = {
	x: 10,
	y: 10,
	width: 0.1,
	height: 0.1,
};

// Game Board
const controlsBar = {
	width: canvas.width,
	height: cellSize,
};

class Cell {
	constructor(x, y) {
		this.x = x;
		this.y = y;
		this.width = cellSize;
		this.height = cellSize;
	}
	draw() {
		if (this.x >= canvas.width - cellSize) {
			ctx.drawImage(texture[1], this.x, this.y, this.width, this.height);
		} else {
			ctx.drawImage(texture[0], this.x, this.y, this.width, this.height);
		}

		// Check for mouse collision
		if (gameMode === "defender") {
			if (mouse.x && mouse.y && collision(this, mouse)) {
				ctx.fillStyle = "rgba(0, 0, 0, 0.5)";
				ctx.fillRect(this.x, this.y, this.width, this.height);
			}
		} else if (gameMode === "enemy") {
			if (mouse.x && mouse.y && collision(this, mouse)) {
				const fillX = canvas.width - cellSize;
				ctx.fillStyle = "rgba(255, 0, 0, 0.5)";
				ctx.fillRect(fillX, this.y, this.width, this.height);
			}
		}
	}
}
function createGrid() {
	for (let y = cellSize; y < canvas.height; y += cellSize) {
		for (let x = 0; x < canvas.width; x += cellSize) {
			gameGrid.push(new Cell(x, y));
		}
	}
}
createGrid();
function handleGameGrid() {
	for (let i = 0; i < gameGrid.length; i++) {
		gameGrid[i].draw();
	}
}
// Projectiles
class Projectile {
	constructor(x, y) {
		this.x = x;
		this.y = y;
		this.width = 10;
		this.height = 10;
		this.power = 60;
		this.speed = 4;
	}
	update() {
		this.x += this.speed;
	}
	draw() {
		ctx.fillStyle = "#69BE28";
		ctx.beginPath();
		ctx.arc(this.x, this.y, this.width, 0, Math.PI * 2);
		ctx.fill();
	}
}
function handleProjectiles() {
	for (let i = 0; i < projectiles.length; i++) {
		projectiles[i].update();
		projectiles[i].draw();

		for (let j = 0; j < enemies.length; j++) {
			if (enemies[j] && projectiles[i] && collision(projectiles[i], enemies[j])) {
				enemies[j].health -= projectiles[i].power;
				projectiles.splice(i, 1);
				i--;
			}
		}

		if (projectiles[i] && projectiles[i].x > canvas.width - cellSize) {
			projectiles.splice(i, 1);
			i--;
		}
	}
}

// Defenders
class Defender {
	constructor(x, y) {
		this.x = x;
		this.y = y;
		this.width = cellSize - cellGap * 2;
		this.height = cellSize - cellGap * 2;
		this.shooting = false;
		this.health = 700;
		this.projectiles = [];
		this.timer = 0;
		this.currentFrame = 0;
	}
	update() {
		if (frame % 8 === 0) {
			this.currentFrame = (this.currentFrame + 1) % defendersType[0].length; // Cycle through frames
		}
		if (this.shooting) {
			this.timer++;
			if (this.timer % 200 === 0) {
				projectiles.push(new Projectile(this.x + 60, this.y + 30));
			}
		} else {
			this.timer = 0;
		}
	}
	draw() {
		// delay the draw
		ctx.drawImage(
			defendersType[0][this.currentFrame],
			this.x,
			this.y + 20,
			this.width - 20,
			this.height - 20
		);
	}
}

function handleDefenders() {
	for (let i = 0; i < defenders.length; i++) {
		defenders[i].draw();
		defenders[i].update();
		if (enemyPositions.indexOf(defenders[i].y) !== -1) {
			defenders[i].shooting = true;
		} else {
			defenders[i].shooting = false;
		}
		for (let j = 0; j < enemies.length; j++) {
			if (defenders[i] && collision(defenders[i], enemies[j])) {
				enemies[j].movement = 0;
				defenders[i].health -= 1;

				enemies[j].status = "attacking";
				if (enemies[j].currentFrame >= enemiesType[`${enemies[j].status}`].length) {
					enemies[j].currentFrame = 0;
				}
			}
			// defender dies
			if (defenders[i] && defenders[i].health <= 0) {
				defenders.splice(i, 1);
				i--;
				enemies[j].movement = enemies[j].speed;
				enemies[j].status = "walking";
				if (enemies[j].currentFrame >= enemiesType[`${enemies[j].status}`].length) {
					enemies[j].currentFrame = 0;
				}
			}
		}
	}
}
// Enemies
class Enemy {
	constructor(verticalPosition) {
		this.x = canvas.width;
		this.y = verticalPosition;
		this.width = cellSize - cellGap * 2;
		this.height = cellSize - cellGap * 2;
		// this.speed = Math.random() * 0.2 + 0.4;
		this.speed = 0.15;
		this.movement = this.speed;
		this.health = 1000;
		this.maxHealth = this.health;
		this.currentFrame = 0;
		this.status = "walking";
	}
	update() {
		if (frame % 5 === 0) {
			this.currentFrame++;
			if (this.currentFrame >= enemiesType[`${this.status}`].length) {
				this.currentFrame = 0;
			}
		}
		this.x -= this.movement;
	}
	draw() {
		if (this.status === "walking") {
			ctx.drawImage(
				enemiesType["walking"][this.currentFrame],
				this.x - 100,
				this.y - 30,
				this.width + 50,
				this.height + 50
			);
		} else if (this.status === "attacking") {
			ctx.drawImage(
				enemiesType["attacking"][this.currentFrame],
				this.x - 100,
				this.y - 30,
				this.width + 50,
				this.height + 50
			);
		}
	}
}

function handleEnemies() {
	for (let i = 0; i < enemies.length; i++) {
		enemies[i].update();
		enemies[i].draw();
		// if (enemies[i].x < 0) {
		// 	gameOver = true;
		// }

		//? if enemy dies
		if (enemies[i].health <= 0) {
			let gainedResources = enemies[i].maxHealth / 10;
			numberOfResources += gainedResources;
			score += gainedResources;
			const findThisIndex = enemyPositions.indexOf(enemies[i].y);
			enemyPositions.splice(findThisIndex, 1);
			enemies.splice(i, 1);
			i--;
		}
	}
	//! Spawning enemies (computer controlled)
	// if (frame % enemiesInterval === 0 && score < winningScore) {
	// if (frame % enemiesInterval === 0) {
	// 	let verticalPosition = Math.floor(Math.random() * 5 + 1) * cellSize + cellGap;
	// 	// let verticalPosition = 1 * cellSize + cellGap;
	// 	enemies.push(new Enemy(verticalPosition));
	// 	enemyPositions.push(verticalPosition);
	// 	if (enemiesInterval > 120) enemiesInterval -= 50;
	// }
}

// Resources
const amounts = [20, 30, 40];
class Resource {
	constructor() {
		this.x = Math.random() * (canvas.width - cellSize);
		this.y = (Math.floor(Math.random() * 5) + 1) * cellSize + 25;
		this.width = cellSize * 0.6;
		this.height = cellSize * 0.6;
		this.amount = amounts[Math.floor(Math.random() * amounts.length)];
	}
	draw() {
		ctx.fillStyle = "yellow";
		ctx.fillRect(this.x, this.y, this.width, this.height);
		ctx.fillStyle = "black";
		ctx.font = "20px Orbitron";
		ctx.fillText(this.amount, this.x + 15, this.y + 25);
	}
}
function handleResources() {
	if (frame % 500 === 0 && score < winningScore) {
		resources.push(new Resource());
	}

	//! Spawn resources
	// for (let i = 0; i < resources.length; i++) {
	// 	resources[i].draw();
	// 	if (resources[i] && mouse.x && mouse.y && collision(resources[i], mouse)) {
	// 		numberOfResources += resources[i].amount;
	// 		resources.splice(i, 1);
	// 		i--;
	// 	}
	// }
}

// Utilities
function handleGameStatus() {
	displayScore.innerHTML = score;
	displayResources.innerHTML = numberOfResources;
	//! End game status
	// if (gameOver) {
	// 	ctx.fillStyle = "black";
	// 	ctx.font = "90px Orbitron";
	// 	ctx.fillText("GAME OVER", 135, 330);
	// 	gameOver = false;
	// }
	// if (score >= winningScore && enemies.length === 0) {
	// 	ctx.fillStyle = "black";
	// 	ctx.font = "60px Orbitron";
	// 	ctx.fillText("LEVEL COMPLETE", 130, 300);
	// 	ctx.font = "30px Orbitron";
	// 	ctx.fillText("You win with " + score + " points!", 134, 340);
	// }
}

function animate() {
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	ctx.drawImage(gameInfo, 0, 0, controlsBar.width, controlsBar.height);
	// ctx.fillRect(0, 0, controlsBar.width, controlsBar.height);
	handleGameGrid();
	handleDefenders();
	handleResources();
	handleProjectiles();
	handleEnemies();
	handleGameStatus();
	frame++;
	// if (!gameOver) requestAnimationFrame(animate);
	requestAnimationFrame(animate);
}

animate();

function collision(first, second) {
	if (
		!(
			first.x > second.x + second.width ||
			first.x + first.width < second.x ||
			first.y > second.y + second.height ||
			first.y + first.height < second.y
		)
	) {
		return true;
	}
}

//! Event listeners and Socket events

let canvasPosition = canvas.getBoundingClientRect();
// Hovering over the canvas
canvas.addEventListener("mousemove", function (e) {
	mouse.x = e.x - canvasPosition.left;
	mouse.y = e.y - canvasPosition.top;
});
canvas.addEventListener("mouseleave", function () {
	mouse.y = undefined;
	mouse.y = undefined;
});

//? Sockets

window.addEventListener("resize", function () {
	canvasPosition = canvas.getBoundingClientRect();
});

// place initial defenders
socket.on("initialDefenders", function (data) {
	// check if the defender is already placed
	for (let i = 0; i < data.length; i++) {
		defenders.push(new Defender(data[i].x, data[i].y));
	}
});
socket.on("serverPlacePlant", function (data) {
	defenders.push(new Defender(data.x, data.y));
});
socket.on("serverPlaceEnemy", function (data) {
	enemies.push(new Enemy(data.y));
	enemyPositions.push(data.y);
});

//? Event listener for placing defenders on the game grid
canvas.addEventListener("click", function () {
	if (gameMode === "defender") {
		const gridPositionX = mouse.x - (mouse.x % cellSize) + cellGap;
		const gridPositionY = mouse.y - (mouse.y % cellSize) + cellGap;

		if (gridPositionY < cellSize) return;
		for (let i = 0; i < defenders.length; i++) {
			if (defenders[i].x === gridPositionX && defenders[i].y === gridPositionY) return;
		}

		// Disable planting defenders on the last column
		if (gridPositionX >= canvas.width - cellSize) return;

		let defenderCost = 100;
		//! Place defender and reduce resources
		// if (numberOfResources >= defenderCost) {
		// 	defenders.push(new Defender(gridPositionX, gridPositionY));
		// 	numberOfResources -= defenderCost;
		// }
		socket.emit("clientPlacePlant", { x: gridPositionX, y: gridPositionY });
		// Place defender through socket event
	} else if (gameMode === "enemy") {
		// const gridPositionX = mouse.x - (mouse.x % cellSize) + cellGap;
		const gridPositionY = mouse.y - (mouse.y % cellSize) + cellGap;

		let enemyCost = 50; // Set the cost for placing enemies
		if (numberOfResources >= enemyCost && gridPositionY >= cellSize) {
			socket.emit("clientPlaceEnemy", { y: gridPositionY });
		}
	}
});

//? Switch game mode events

// Switch game mode events
displayMode.innerHTML = "Spectator";

function switchMode(newMode, displayText, backgroundUrl) {
	gameMode = newMode;
	displayMode.innerHTML = displayText;
	modeSelector.style.background = `url("${backgroundUrl}") no-repeat`;
	console.log(gameMode);
}

defenderMode.addEventListener("mouseup", function () {
	if (gameMode === "defender") {
		switchMode("spectator", "Spectator", "/images/uiwood3-s.png");
	} else {
		switchMode("defender", "Plants", "/images/uiwood3-p.png");
	}
});

enemyMode.addEventListener("mouseup", function () {
	if (gameMode === "enemy") {
		switchMode("spectator", "Spectator", "/images/uiwood3-s.png");
	} else {
		switchMode("enemy", "Zombies", "/images/uiwood3-z.png");
	}
});
