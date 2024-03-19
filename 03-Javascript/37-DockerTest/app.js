var express = require("express");
var app = express();

app.get('/', function(request, response) {
   response.send("<h1>Hello Docker</h1>");
})

app.listen(3000, function() {});