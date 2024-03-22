const socket = io.connect();

let playerName = prompt("What is your name?");

socket.emit("newPlayer", playerName);

class Empire {
	currentBlock = "brick";
	container = document.getElementById("canvas");
	resetBtn = document.getElementById("clear");
	blocks = document.querySelectorAll(".options");

	changeBlock = (block) => {
		this.currentBlock = block;
	};

	createBlock = (x, y, selectedBlock) => {
		const newBlock = document.createElement("div");
		newBlock.classList.add("block", selectedBlock);
		newBlock.style.left = y - 50 + "px";
		newBlock.style.top = x - 125 + "px";
		this.container.appendChild(newBlock);
	};
}

// Empire class
const empire = new Empire();

empire.resetBtn.addEventListener("click", () => {
	// empire.container.innerHTML = "";
	socket.emit("reset");
});

empire.blocks.forEach((block) => {
	block.addEventListener("click", () => {
		empire.changeBlock(block.id);
	});
});

empire.container.addEventListener("click", (e) => {
	// empire.createBlock(e.clientY, e.clientX, empire.currentBlock);
	socket.emit("block", { x: e.clientY, y: e.clientX, block: empire.currentBlock });
});

socket.on("newBlock", function (data) {
	empire.createBlock(data.x, data.y, data.block);
});

socket.on("updateBlocks", function (data) {
	data.forEach((block) => {
		empire.createBlock(block.x, block.y, block.block);
	});
});

socket.on("resetCanvas", function () {
	empire.container.innerHTML = "";
});

// Cursor
const cursorContainer = document.getElementById("cursor-list");
class Cursor {
	container = cursorContainer;
	constructor(name = "Anonymous") {
		this.cursor = document.createElement("div");
		this.cursorImg = document.createElement("img");
		this.name = document.createElement("p");
		this.cursor.classList.add("cursor");
		this.name.classList.add("name");
		this.name.textContent = name;
		this.cursorImg.style.width = "50px";
		this.cursorImg.style.height = "50px";
		this.cursorImg.src = "/cursor.png";
		this.cursor.appendChild(this.cursorImg);
		this.cursor.appendChild(this.name);
		this.container.appendChild(this.cursor);
	}

	move = (x, y) => {
		this.cursor.style.left = y + "px";
		this.cursor.style.top = x + 50 + "px";
	};
}

let cursorList = {};
socket.on("updatePlayers", function (data) {
	// Clear the cursor container
	cursorContainer.innerHTML = "";
	cursorList = {};
	data.forEach((player) => {
		if (player.id !== socket.id) {
			const cursor = new Cursor(player.name);
			cursorList[player.id] = { cursor: cursor, name: player.name, id: player.id };
		}
	});
});

// Send the cursor position to all other clients
empire.container.addEventListener("mousemove", (e) => {
	socket.emit("cursor", { x: e.clientY, y: e.clientX });
});

// Other players' cursors
socket.on("newCursor", function (data) {
	if (cursorList[data.id]) {
		cursorList[data.id].cursor.move(data.x, data.y);
	}
});

// Players
socket.on("updatePlayers", function (data) {
	const contentElement = document.getElementById("content");
	contentElement.innerHTML = ""; // Clear the content

	data.forEach(function (player) {
		let playerDiv = document.createElement("div");
		playerDiv.className = "player";
		playerDiv.textContent = player.name;
		contentElement.appendChild(playerDiv);
	});
});
