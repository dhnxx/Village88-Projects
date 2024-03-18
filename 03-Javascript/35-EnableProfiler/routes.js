//! Do not modify
const express = require("express");
const router = express.Router();

/*
|--------------------------------------------------------------------------
| IMPORT THE CONTROLLERS
|--------------------------------------------------------------------------
| Format: const controller = require
| const users = require("./controllers/users");
|--------------------------------------------------------------------------
*/

const template = require("./controllers/Users");

/*
|--------------------------------------------------------------------------
| ROUTES
|--------------------------------------------------------------------------
| Format: router.METHOD(PATH, HANDLER)
|--------------------------------------------------------------------------
*/

router.get("/", template.index);
router.post("/register", template.register);
router.post("/login", template.login);
router.get("/students/profile", template.profile);

/*
|--------------------------------------------------------------------------
| EXPORT THE ROUTER, DO NOT MODIFY
|--------------------------------------------------------------------------
*/

module.exports = router;
