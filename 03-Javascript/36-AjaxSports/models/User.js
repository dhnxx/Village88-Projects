const db = require("../config/dbConnection");

class User {
	async fetch(gender = "all", sports = "all", name = "") {
		console.log(arguments);
		let query = `SELECT players.name AS name, players.image_url AS image_url, GROUP_CONCAT(sports.name) AS sports FROM player_sports INNER JOIN players ON players.id = player_sports.user_id INNER JOIN sports ON player_sports.sport_id = sports.id `;

		let where = `players.name LIKE '%${name}%'`; 
		if (gender !== "all") {
			where += ` AND gender = '${gender}'`; 
		}
		let group = `players.name, players.image_url`;
		let having = `HAVING sports LIKE '%${sports}%'`; 

		query += `WHERE ${where} GROUP BY ${group} ${having}`;

		return await db.fetchAll(query); 
	}
}

module.exports = new User();
