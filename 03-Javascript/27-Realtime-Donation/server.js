const express = require("express");
const app = express();
const server = app.listen("4444", () => {
	console.log("localhost:4444");
});
const io = require("socket.io")(server);

app.use(express.static(__dirname + "/static"));
app.set("view engine", "ejs");

app.get("/", (request, response) => {
	response.render("index");
});

class DonationSystem {
	constructor(initialCash) {
		this.cash = initialCash;
	}

	donate(socket) {
		this.cash += 10;
		this.updateCash(socket, "Successfully Donated $10", "Someone Donated $10");
	}

	redeem(socket) {
		if (this.cash >= 10) {
			this.cash -= 10;
			this.updateCash(socket, "Successfully Redeemed $10", "Someone Redeemed $10");
		} else {
			socket.emit("donationMessage", { message: "Redeem Failed: Insufficient Funds" });
		}
	}

	updateCash(socket, message, broadcastMessage) {
		io.emit("cashDonation", { cash: this.cash });
		socket.emit("donationMessage", { message });
		socket.broadcast.emit("donationMessage", { message: broadcastMessage });
	}
}

const donationSystem = new DonationSystem(100);

io.on("connection", function (socket) {
	io.emit("cashDonation", { cash: donationSystem.cash });

	// Handle donation requests from clients
	socket.on("donate", function (data) {
		donationSystem.donate(socket);
	});

	// Handle redemption requests from clients
	socket.on("redeem", function (data) {
		donationSystem.redeem(socket);
	});
});