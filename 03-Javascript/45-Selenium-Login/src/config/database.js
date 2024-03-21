const Mysql         = require('mysql');

var isConnected     = false;

var connection      = Mysql.createConnection({
    host     : 'db',
    user     : 'root',
    password : 'password',
    database : 'hh'
});

var executeQuery = async function(query) {
    if(isConnected == false){
        return new Promise(function(resolve, reject){
            connection.on('error', function(err) {
                resolve(handleConnection(query, err));
            });

            connection.connect(function(err){
                resolve(handleConnection(query, err));
            });
        });

    }else{
        return execute(query);
    }
}

var execute = function(query) {
    return new Promise(function(resolve, reject){
        connection.query(query, function (err, result) {
            if(err) {
                reject(err);
            }else{
                resolve(result);
            }
        });
    });    
}

var handleConnection = function(query, err, limit = 1) {
    if(err) {
        isConnected = false;

        if(limit <= 10) {
            setTimeout(function(){
                console.log("Reconnecting... Attempt #" + limit);
                handleConnection(query, err, limit+1);
            }, 1500);
        } else {
            return new Promise(function(resolve, reject){
                reject(err);
            });		            
        }
    } else {
        isConnected = true;
        return execute(query);
    }
}

module.exports = executeQuery;
