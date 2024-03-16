class Database {
	constructor(config) {
		this.mysql = require("mysql2/promise");
		this.connection = this.mysql.createConnection(config);
		this.connect();
	}

	async connect() {
		try {
			this.connection = await this.connection;
			console.log("Connected to database successfully!");
		} catch (err) {
			console.error("Connection failed:", err);
		}
	}

	async singleFetch(query) {
		try {
			const [results, fields] = await this.connection.execute(query);
			return results[0];
		} catch (err) {
			console.error("Query failed:", err);
			return null;
		}
	}

	async fetchAll(query) {
		try {
			const [results, fields] = await this.connection.execute(query);
			return results;
		} catch (err) {
			console.error("Query failed:", err);
			return null;
		}
	}
}

/*
|--------------------------------------------------------------------------
| Modify the database configuration to match your MySQL database settings.
|--------------------------------------------------------------------------
*/

const dbConfig = {
	host: "localhost",
	user: "root",
	password: "test",
	database: "cars1",
};

module.exports = new Database(dbConfig);
