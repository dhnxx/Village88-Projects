//! Do not modify
const enableProfiler = require("./config/profiler");
const express = require("express");
const routes = require("./routes");
const app = express();
const session = require("express-session");
app.use(express.urlencoded({ extended: true }));
app.use(
	session({
		secret: "test",
		resave: false,
		saveUninitialized: true,
		cookie: { maxAge: 60000 },
	})
);

/* 
|--------------------------------------------------------------------------
| ENABLE PROFILER MIDDLEWARE
|--------------------------------------------------------------------------
| This middleware logs the request data to the console.
| Uncomment the line below to enable the profiler.
|--------------------------------------------------------------------------
*/

// app.use((req, res, next) => {
// 	enableProfiler.logRequest(req, res, next);
// });


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
app.listen(80, () => {
	console.log("Server is running on port 80");
});
