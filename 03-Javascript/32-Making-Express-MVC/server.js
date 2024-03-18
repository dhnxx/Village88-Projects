//! Do not modify
const express = require("express");
const routes = require("./routes");
const app = express();
const bodyParser = require("body-parser");
app.use(bodyParser.urlencoded({ extended: true }));

// const myLogger = function (req, res, next) {
// 	// session
// 	console.log({ session: req.session });
// 	// post
// 	console.log({ post: req.body });
// 	// get
// 	console.log({ get: req.query });
// 	// query
// 	req.sqlQueries.forEach((query, index) => {
// 		console.log(`  Query ${index + 1}:`);
// 		console.log(`    SQL: ${query.sql}`);
// 		console.log(`    Execution Time: ${query.executionTime}ms`);
// 	});

// 	next();
// };

// app.use(myLogger);
/*
|--------------------------------------------------------------------------
| SET VIEW ENGINE
|--------------------------------------------------------------------------
| Sets the view engine to EJS for rendering dynamic views.
|--------------------------------------------------------------------------
*/
app.set("view engine", "ejs");

/*
|--------------------------------------------------------------------------
| SET ASSETS FOLDER
|--------------------------------------------------------------------------
| Serves static files (such as CSS, images, and JavaScript) from the
| "assets" folder located in the current directory.
|--------------------------------------------------------------------------
*/
app.use(express.static(__dirname + "/assets"));

/*
|--------------------------------------------------------------------------
| MOUNT THE ROUTER
|--------------------------------------------------------------------------
| Mounts the router from the "routes" module.
|--------------------------------------------------------------------------
*/
app.use("/", routes);

/*
|--------------------------------------------------------------------------
| START THE SERVER
|--------------------------------------------------------------------------
| Starts the Express server on port 80 and logs a message to the console
| once the server has started.
|--------------------------------------------------------------------------
*/
app.listen(8080);
