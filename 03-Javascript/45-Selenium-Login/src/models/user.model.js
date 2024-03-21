const Mysql                 = require('mysql2');
const executeQuery  		= require('../config/database.js');

class UserModel {

	async getUser(email) {
		let response_data 	    = {status: false, result: [], err: null};
		
		try{
			let get_user_query 		= Mysql.format(`
				SELECT users.id, users.name, users.email, users.password
				FROM users
				WHERE users.email = ? LIMIT 1;`, [email]
			);

			let [get_user_result] = await executeQuery(get_user_query);
	
			if(get_user_result){
				response_data.status 	= true;
				response_data.result 	= get_user_result;
			}else{
				response_data.message 	= "No user found";
			}
		}catch(err){
			response_data.err 			= err;
			response_data.message 		= "Error in getting a user.";
		};
	
		return response_data;			
	}
}

module.exports = UserModel;
