var express = require('express');
var bodyParser = require('body-parser');
var cookieParser = require('cookie-parser');
var session = require('express-session');
const bcrypt = require('bcrypt-nodejs');
var DB = require("./db.js").DB;
var app = express();

app.set('port', (process.env.PORT || 5000));

app.use(express.static(__dirname + '/public'));
app.use(cookieParser());
app.use(bodyParser());
app.use(session({secret: 'thisisasecretthatnobodyknows'}));
app.use(logRequest);
app.use('/getServerTime', verifyLogin);

// views is directory for all template files
app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');

app.get('/', function(req, res) {
  res.sendFile(__dirname + '/public/test.html');
});

app.get('/getServerTime', function(req, res) {
  res.send({success: true, time: new Date()});
});

app.post('/login', function(req, res) {
  var username = req.body.username;
  var password = req.body.password;
  console.log("USER:", username);
  console.log("PASS:", password);
  DB.models.user.findOne({username: username})
  .then((user) => {
	  bcrypt.compare(password, user.password, function (err, result) {
		if (result) {
			req.session.user = user.username;
			res.send({success: true});
		} else {
			res.send({success: false});
		}
	  });
  })
  .catch((err) => {
		console.log(err);
  });
});

app.post('/logout', function(req, res) {
	console.log("Is logged in?",req.session.user);
  if (req.session.user) {
	  //DESTROY IT (the session)!!
	  req.session.destroy();
	  res.send({success: true});
  } else {
	  res.send({success: false});
  }
});

app.listen(app.get('port'), function() {
  console.log('Node app is running on port', app.get('port'));
});

function logRequest(req, res, next) {
	console.log("Received a request for: " + req.url);
	return next();
}

function verifyLogin(req, res, next) {
	if (req.session.user) {
		return next();
	} else {
		res.send({error: "Hey, you. Log in like a normal person!", status: 401});
	}
}
