const user = require("../models/user");
/*
|--------------------------------------------------------------------------
| Users Controller
|--------------------------------------------------------------------------
|
| Modify the Users controller located in the controllers directory.
| Ensure that it follows the format specified below.
|--------------------------------------------------------------------------
 */

class Users {
	/*
|--------------------------------------------------------------------------
| Method
|--------------------------------------------------------------------------
|
| Parameters: request (Request), response (Response)
| You can pass data to the view by including a second parameter. 
| For example, response.render("index", { title: "Express" });
|--------------------------------------------------------------------------
*/
	index(request, response) {
		let data = {};
		if (!request.session.message) {
			request.session.message = {};
		}
		if (request.session.message && request.session.message.register) {
			// Check if request.session.message exists
			data.message = { register: request.session.message.register };
			request.session.message.register = null;
		}

		response.render("auth", { data: data });
	}

	async register(request, response) {
		let validation = await user.validateRegister(request.body);
		if (validation) {
			request.session.message = {};
			request.session.message.register = validation;
			response.redirect("/");
			return;
		}
		if (!request.session.user) {
			request.session.user = {};
		}
		request.session.user = await user.registerUser(request.body);
		await response.redirect("/students/profile");
	}

	async login(request, response) {
		let result = await user.login(request.body);
		if (!result) {
			response.render("login", { message: "Invalid email or password" });
			return;
		}
		if (!request.session.user) {
			request.session.user = {};
		}
		request.session.user = result;
		response.redirect("/students/profile");
	}

	async profile(request, response) {
		if (!request.session.user) {
			response.redirect("/");
			return;
		}


		response.render("profile", { user: request.session.user });
				console.log({user: request.session.user});
	}
}

/*
|--------------------------------------------------------------------------
| EXPORT THE CONTROLLER
|--------------------------------------------------------------------------
|
| Format: module.exports = new ClassName();
|--------------------------------------------------------------------------
*/
module.exports = new Users();
