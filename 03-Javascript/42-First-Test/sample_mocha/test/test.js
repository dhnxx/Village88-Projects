const chai = import("chai");
const expect = chai.expect;
const UserModel = import("../models/user.model");
describe("Login feature", function () {
	it("data.status should return true if email exists in the database.", async function () {
		//prepare
		let email = "jrosales@village88.com";
		let userModel = new UserModel();
		//execute
		let data = await userModel.getUser(email);
		//compare
		expect(data.status).to.equal(true);
	});
});
