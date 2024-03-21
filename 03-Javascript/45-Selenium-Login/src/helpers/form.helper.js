class FormHelper {
    /* DOCU: Function that decrypt the data passed by dc side */
    checkLoginParams(options={}, req) {
        let required_fields = [];
        let missing_fields  = [];
        let filtered_fields = {};
        let status          = true;

        if(options.require){
            required_fields = options.require.split(",").map(v => v.trim());
        }

        for(let field of required_fields){
            if(req.body[field]){
                filtered_fields[field] = req.body[field];
            }
            else {
                status = false;
                missing_fields.push(field);
            }
        }

        if(status){
            return {status, filtered_fields: filtered_fields};
        }
        else {
            return {status, missing_fields: missing_fields};
        }        
    }
}

module.exports = FormHelper;