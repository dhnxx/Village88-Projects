class Controller {

    constructor(req, res) {
        this.req = req;
        this.res = res;
        this.page_params = this.defaultPageParams();
    }

	/* DOCU: Private function to get/set default view assets */
	getViewAssets() {
		let stylesheets = [
			{ file: "/public/css/custom/user/style.css" }
		];

		let javascripts = [
			{ file: "/public/javascripts/vendor/jquery/jquery.min.js" }
		];

		return { stylesheets: stylesheets, javascripts: javascripts };
	}
	
	/* 
		DOCU: Private function to get default page layout parameters
		used_by: all ProjectViewController page methods / functions
	*/ 
	defaultPageParams() {
		return {
			PAGE: {
				title: "Project Manager",
				view: "index",
				assets: this.getViewAssets()
			},
			DATA: {
				users: [],
				modals: []
			}
		};
	}
}

module.exports = Controller;