const db = require("../config/dbConnection");

class User {
	async registerUser(post) {
		let query = `INSERT INTO users (first_name, last_name, email, password)
        VALUES(?, ?, ?, ?)`;

		let values = [
			post.first_name,
			post.last_name,
			post.email,
			await this.hashPassword(post.password),
		];

		db.executeQuery(query, values);

		return await db.singleFetch(`SELECT * FROM users WHERE email = ?`, [post.email]);
	}

	async validateRegister(post) {
		if (post.password !== post.confirm_password) {
			return "Passwords do not match";
		}

		if (post.password.length < 8) {
			return "Password must be at least 8 characters";
		}

		if (post.first_name.length < 2) {
			return "First name must be at least 2 characters";
		}

		if (post.last_name.length < 2) {
			return "Last name must be at least 2 characters";
		}

		if (!post.first_name || !post.last_name || !post.email || !post.password) {
			return "All fields are required";
		}

		if (!post.email.includes("@")) {
			return "Invalid email";
		}

		// Check if email is already in use
		let query = `SELECT * FROM users WHERE email = ?`;
		let values = [post.email];
		let result = await db.singleFetch(query, values);
		console.log(result);
		if (result.length > 0) {
			return "Email is already in use";
		}
	}

	async login(post) {
		let query = `SELECT * FROM users WHERE email = ?`;
		let values = [post.email];
		let result = await db.singleFetch(query, values);
		if (result.length === 0) {
			return false;
		}

		let match = await this.comparePassword(post.password, result[0].password);
		if (!match) {
			return false;
		}

		return result[0];
	}

	async hashPassword(password) {
		const bcrypt = require("bcrypt");
		const saltRounds = 10;
		const hashedPassword = await bcrypt.hash(password, saltRounds);
		return hashedPassword;
	}

	async comparePassword(password, hash) {
		const bcrypt = require("bcrypt");
		const match = await bcrypt.compare(password, hash);
		return match;
	}
}

module.exports = new User();
