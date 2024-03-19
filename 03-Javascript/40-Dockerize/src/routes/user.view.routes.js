const Express 			            = require("express");
const UserViewRoutes                = Express.Router();
const GameController                = require('../controllers/game.controller');

UserViewRoutes.get("/", function(req, res, next) {
    new GameController().index(req, res);
});

UserViewRoutes.get("/reset", function(req, res, next) {
    new GameController().reset(req, res);
});

UserViewRoutes.post("/process", function(req, res, next) {
    new GameController().process(req, res);
});

module.exports = UserViewRoutes;
