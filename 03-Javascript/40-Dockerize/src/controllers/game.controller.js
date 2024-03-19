const GameModel         = require('../models/game.model');

class GameController {
    
    async index(req, res) {
        let gameModel   = new GameModel();
        let session     = await gameModel.getSession();
        let view_data   = {};

        if(session.status == false || session.result.generate == true) {
            view_data.random_num = Math.floor((Math.random() * 100) + 1);
            view_data.result     = "none";
            view_data.generate   = false;

            await gameModel.clearSession();

            await gameModel.createSession(
                view_data.random_num, 
                view_data.result, 
                view_data.generate
            );
        }
        else {
            view_data.random_num    = session.result.random_num;
            view_data.result        = session.result.result;
            view_data.generate      = session.result.generate;
            view_data.guess_num     = session.result.guess_num;
        }

        res.render("index.ejs", view_data);
    }

    async reset(req, res) {
        let gameModel               = new GameModel();
        let update_session_result   = await gameModel.updateSessionStatus();

        res.redirect(update_session_result.redirect_url);
    }

    async process(req, res) {
        let gameModel   = new GameModel();
        let session     = await gameModel.getSession();
        let result      = "";
        if(req.body.guess_num == session.result.random_num) {
            result = "correct";
        }
        else if(req.body.guess_num > session.result.random_num) {
            result = "higher";
        } 
        else {
            result = "lower";
        }

        let update_session_result = await gameModel.updateSessionResult(result, req.body.guess_num);

        res.redirect(update_session_result.redirect_url);        
    }
}
module.exports = GameController;