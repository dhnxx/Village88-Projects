const Express 			    = require("express");
const UserRoutes 		    = Express.Router();
const UserController        = require('../controllers/user.controller');

UserRoutes.get("/", function(req, res, next) {
    new UserController().index(req, res);
});

UserRoutes.post("/login", function(req, res, next) {
    new UserController().login(req, res);
});

UserRoutes.get("/success", function(req, res, next) {
    new UserController().success(req, res);
});

module.exports = UserRoutes;
