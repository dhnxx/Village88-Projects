//Load the model
const user = require("../models/databasecon.js");

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
| Always use async/await for database operations.
|--------------------------------------------------------------------------
*/
	async index(request, response) {
		if (!request.session) {
			request.session.visit = 0;
		} else {
			request.session.visit++;
		}

		let visit = request.session.visit;

		const query = "SELECT * FROM cars";
		const cars = await user.fetchAll(query);
		let count = await user.singleFetch("SELECT COUNT(*) as count FROM cars");
		count = count.count;
		response.render("index", { cars: cars, count: count, visit: visit });
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
