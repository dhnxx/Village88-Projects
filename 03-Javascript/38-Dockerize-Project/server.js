var express = require("express");
var app = express();

app.get('/', function(request, response) {
   response.send("<h1>My Awesome Project</h1>");
})

app.listen(8080, function() {});