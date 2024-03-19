const user = require("../models/User");
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
	async index(request, response) {
		response.render("main");
	}

	async filter(request, response) {
		if (!request.query.gender || request.query.gender.length > 1) {
			request.query.gender = "all";
		}
		let data = await user.fetch(request.query.gender, request.query.sport, request.query.name);
		response.json(data);
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
