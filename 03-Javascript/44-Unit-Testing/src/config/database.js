const Mysql = require("mysql2");

let isConnected = false;

const connection = Mysql.createConnection({
	host: "localhost",
	user: "root",
	password: "test",
	database: "hh",
});

const executeQuery = async function (query) {
	try {
		if (!isConnected) {
			await connect();
		}
		return await execute(query);
	} catch (error) {
		throw error;
	}
};

const connect = async function () {
	try {
		await connection.connect();
		isConnected = true;
		console.log("Connected to the database.");
	} catch (error) {
		console.error("Error connecting to the database:", error);
		throw error;
	}
};

const execute = function (query) {
	return new Promise((resolve, reject) => {
		connection.query(query, (err, result) => {
			if (err) {
				reject(err);
			} else {
				resolve(result);
			}
		});
	});
};

module.exports = executeQuery;
