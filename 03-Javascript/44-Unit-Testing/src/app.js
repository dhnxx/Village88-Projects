const Express = require("express");
const App = Express();

const UserModel = require("./models/user.model.js");
const user = new UserModel();

App.get("/", function (req, res) {
	res.send("<h1> Login Assignment </h1>");
});

App.listen(3000, function () {
	console.log("Your node js server is running on PORT " + 3000);
});
