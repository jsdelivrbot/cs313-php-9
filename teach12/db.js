const Sequelize = require('sequelize');
const bcrypt = require('bcrypt-nodejs');
const DB = new Sequelize("postgres://levan:password@127.0.0.1:5432/teach12");
DB.define('user', {
	username: {
		type: Sequelize.STRING,
		unique: 'userIndex'
	},
	password: {
		type: Sequelize.STRING,
		unique: 'userIndex'
	},
});

DB.models.user.sync({force: true})
.then(() => {
	console.log("Created the users table");
	DB.models.user.create({
		username: "admin",
		password: bcrypt.hashSync("password")
	});
});

module.exports = {
	DB: DB
};