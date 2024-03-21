const chai = require("chai");
const expect = chai.expect;
const UserModel = require("../models/user.model");
const user = new UserModel();

describe("Login feature", function () {
	describe("User Model", function () {
		it("Given email and password as input, it should return user info (including password) when the email is found in the database", async function () {
			const [userInfo] = await user.verifyAccount("testuser@test.com", "password123");
			expect(userInfo).to.deep.equal({
				id: 1,
				name: "Anthony Dillahunty",
				email: "testuser@test.com",
				password: "password123",
			});
		});

		it("Given email and password as input, it should return false when email doesn't exist in database.", async function () {
			const result = await user.existsAccount("testuser@fake.com", "password123");
			expect(result).equal(false);
		});

		it("Given email and password as input, it should return true when email and password is correct", async function () {
			const result = await user.existsAccount("testuser@test.com", "password123");
			expect(result).equal(true);
		});

		it("Given email and password as input, it should return the expected redirect_url (/success page) on success", async function () {
			const result = await user.validateAccount("testuser@test.com", "password123");
			expect(result).equal("/success");
		});

		it("Given password as input, it should return an error message saying: Email is required, when email is missing", async function () {
			const result = await user.validateAccount("", "password123");
			expect(result).equal("Email is required");
		});

		it("Given email as input, it should return an error message saying: Password is required, when password is missing", async function () {
			const result = await user.validateAccount("testuser@test.com", "");
			expect(result).equal("Password is required");
		});

		it("Given empty input, it should return an error message saying: Email and password is required, when all fields are missing", async function () {
			const result = await user.validateAccount("", "");
			expect(result).equal("Email and password is required");
		});
	});
});
