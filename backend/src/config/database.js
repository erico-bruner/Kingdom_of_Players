require('dotenv').config

module.exports = {
  database: 'kop',
  password: process.env.KEY_USERNAME_DATEBASE,
  username: process.env.USERNAME_DATEBASE,
  host: 'localhost',
  dialect: 'mysql',
  define: {
    timestamp: true,
    underscored: true,
  }
}