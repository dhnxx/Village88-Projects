class MyLogger {
	constructor(db) {
		this.db = db;
	}

	logRequest(req, res, next) {
		console.log("--------------------------------------------------");
		console.log("|                     REQUEST                     ");
		console.log("--------------------------------------------------");

		// Session
		console.log("| Session:");
		console.log(req.session);
		console.log("--------------------------------------------------");

		// POST data
		console.log("| POST Data:");
		console.log(req.body);
		console.log("--------------------------------------------------");

		// GET data
		console.log("| GET Data:");
		console.log(req.query);
		console.log("--------------------------------------------------");

		const queryFn = this.db.connection.execute.bind(this.db.connection);
		this.db.connection.execute = function () {
			const queryResult = queryFn.apply(this, arguments);
			console.log("| SQL Query:");
			console.log("|   - Query:", arguments[0]);
			console.log("--------------------------------------------------");
			return queryResult;
		};

		next();
	}
}

const db = require("./dbConnection");
const enableProfiler = new MyLogger(db);

module.exports = enableProfiler;
