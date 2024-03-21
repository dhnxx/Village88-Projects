const Controller        = require('./controller');
const FormHelper		= require('../helpers/form.helper');
const UserModel      	= require("../models/user.model");

class UserController extends Controller {

    constructor() {
        super();
    }
    
    index(req, res) {
		this.page_params.PAGE.title = "Login";
        this.page_params.PAGE.view = "index";

        /* Custom javascript for index page */
		this.page_params.PAGE.assets.javascripts.push({ file: `/public/javascripts/custom/user/${this.page_params.PAGE.view}_be.js` });

        res.render("layouts/user.layout.ejs", this.page_params);
    }

    success(req, res) {
        this.page_params.PAGE.title = "Success";
        this.page_params.PAGE.view = "success";

        this.page_params.DATA.user       = req.session.user;
        this.page_params.DATA.user_id    = req.session.user_id;

        res.render("layouts/user.layout.ejs", this.page_params);
    }

    async login(req, res) {
        let formHelper      = new FormHelper();
        let params          = formHelper.checkLoginParams({require: "email, password"}, req);
        let result          = {};
    
        if(params.status){
            // check if user exists.
            let userModel = new UserModel();
            let user = await userModel.getUser(params.filtered_fields.email);
            console.log(user)
            if(user.status) {
                if(params.filtered_fields.password == user.result.password) {
                    // login
                    result.redirect_url = 'http://localhost:3001' + '/success';
                    result.status       = user.status;
                    req.session.user    = user.result.name;
                    req.session.user_id = user.result.id;
                    
                    res.json(result);
                } else {
                    res.json({
                        status: false,
                        message: "Invalid email or password combination.",
                        err: user.message
                    });    
                }
            } else {
                res.json({
                    status: false,
                    message: "Invalid email or password combination.",
                    err: user.message
                });
            }
        } else {
            res.json({
                status: false,
                message: "A required field is missing",
                err: params.missing_fields
            });
        } 
    }
}
module.exports = UserController;