const Mysql                 = require('mysql2');
const executeQuery  		= require('../config/database.js');

class GameModel {

	async getSession() {
		let response_data 	    = {status: false, result: [], err: null};
		
		try{
			let get_session_query 		= Mysql.format(`
				SELECT *
				FROM sessions
				LIMIT 1;`
			);

			let [get_session_result] = await executeQuery(get_session_query);
	
			if(get_session_result){
				response_data.status 	= true;
				response_data.result 	= get_session_result;
			}else{
				response_data.message 	= "No session found";
			}
		}catch(err){
			response_data.err 			= err;
			response_data.message 		= "Error in getting a session.";
		};
	
		return response_data;		
	}

	async createSession(random_num, result, generate){
		let response_data 	    = {status: false, result: [], err: null, redirect_url: null};
		let redirect_url 		= 'http://localhost:3001/';
		
		
		try{
			let insert_session_query  	= Mysql.format(`INSERT INTO sessions(random_num, result, generate) VALUES (?, ?, ?);`, [random_num, result, generate]);
			let insert_session_result 	= await executeQuery(insert_session_query);

			if(insert_session_result){
				response_data.status 		= true;
				response_data.redirect_url 	= redirect_url;
			}else{
				response_data.message 	= "Something went wrong";
			}
		}catch(err){
			response_data.err 			= err;
			response_data.message 		= "Something went wrong";
		};

		return response_data;		
	}

	async updateSessionStatus() {
		let response_data 	    = {status: false, result: [], err: null, redirect_url: null};
		let redirect_url 		= 'http://localhost:3001/';
		
		try{
			let update_session_query  	= Mysql.format(`UPDATE sessions SET generate = 1 WHERE generate = 0;`);
			let update_session_result 	= await executeQuery(update_session_query);

			if(update_session_result){
				response_data.status 		= true;
				response_data.redirect_url 	= redirect_url;
			}else{
				response_data.message 	= "Something went wrong";
			}
		}catch(err){
			response_data.err 			= err;
			response_data.message 		= "Something went wrong";
		};

		return response_data;
	}

	async updateSessionResult(result, guess_num) {
		let response_data 	    = {status: false, result: [], err: null, redirect_url: null};
		let redirect_url 		= 'http://localhost:3001/';
		
		try{
			let update_session_query  	= Mysql.format(`UPDATE sessions SET result = ?, guess_num = ? WHERE generate = 0;`, [result, guess_num]);
			let update_session_result 	= await executeQuery(update_session_query);

			if(update_session_result){
				response_data.status 		= true;
				response_data.redirect_url 	= redirect_url;
			}else{
				response_data.message 	= "Something went wrong";
			}
		}catch(err){
			response_data.err 			= err;
			response_data.message 		= "Something went wrong";
		};

		return response_data;
	}

	async clearSession() {
		let response_data 	    = {status: false, result: [], err: null};
		
		try{
			let clear_session_query  	= Mysql.format(`DELETE FROM sessions WHERE generate = 1;`);
			let clear_session_result 	= await executeQuery(clear_session_query);

			if(clear_session_result){
				response_data.status 		= true;
			}else{
				response_data.message 	= "Something went wrong";
			}
		}catch(err){
			response_data.err 			= err;
			response_data.message 		= "Something went wrong";
		};

		return response_data;
	}
}

module.exports = GameModel;
