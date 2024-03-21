const executeQuery = require("../config/database.js");

class UserModel {
	async verifyAccount(email, password) {
		try {
			const query = `SELECT * FROM users WHERE email = '${email}' AND password = '${password}'`;
			const result = await executeQuery(query);
			return result;
		} catch (error) {
			throw error;
		}
	}
	async existsAccount(email, password) {
		try {
			const query = `SELECT * FROM users WHERE email = '${email}' AND password = '${password}'`;
			const result = await executeQuery(query);
			if (result.length > 0) {
				return true;
			} else {
				return false;
			}
		} catch (error) {
			throw error;
		}
	}

    async validateAccount(email, password) {

        // if email and password are empty   
		if (!email && !password) {
			return "Email and password is required";
		} else if (!email) {
			return "Email is required";
		} else if (!password) {
			return "Password is required";
        }
        
        // check if the account exists
        const exists = await this.existsAccount(email, password);
        

        // if the account exists, return the success page
        if (exists === true) {
            return "/success";
        } else {
            return "Invalid email or password";
        }
	}
}

module.exports = UserModel;
