class Database {
	constructor(config) {
		this.mysql = require("mysql2/promise");
		this.connection = this.mysql.createConnection(config);
		this.connect();
	}

	/*
	|--------------------------------------------------------------------------
	| Connect to the database
	|--------------------------------------------------------------------------
	| This method is used to connect to the MySQL database.
	|--------------------------------------------------------------------------
	*/

	async connect() {
		try {
			this.connection = await this.connection;
			console.log("Connected to database successfully!");
		} catch (err) {
			console.error("Connection failed:", err);
		}
	}

	/* 
	|--------------------------------------------------------------------------
	| Fetch a single row from a table based on a query
	|--------------------------------------------------------------------------
	| This method is used to fetch a single row from a table based on a query.
	| For example, SELECT * FROM users WHERE id = 1;
	|--------------------------------------------------------------------------
	*/

	async singleFetch(query, values = null) {
		try {
			const results = await this.connection.execute(query, values);
			return results[0];
		} catch (err) {
			console.error("Query failed:", err);
			return null;
		}
	}
	/* 
	|--------------------------------------------------------------------------
	| Fetch all rows from a table based on a query
	|--------------------------------------------------------------------------
	| This method is used to fetch all rows from a table based on a query.
	| For example, SELECT * FROM users;
	|--------------------------------------------------------------------------
	*/

	async fetchAll(query, values = null) {
		try {
			const results = await this.connection.execute(query, values);
			return results;
		} catch (err) {
			console.error("Query failed:", err);
			return null;
		}
	}

	/*
	|--------------------------------------------------------------------------
	| Execute a query
	|--------------------------------------------------------------------------
	| This method is used to execute queries that do not return any results.
	| For example, INSERT, UPDATE, DELETE, and CREATE TABLE queries.
	|--------------------------------------------------------------------------
	*/

	async executeQuery(query, values = null) {
		try {
			const results = await this.connection.execute(query, values);
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
	database: "users",
};

module.exports = new Database(dbConfig);
