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
		response.render("index", { title: "sdfsdfX" });
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
