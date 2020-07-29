const Sequelize = require('sequelize')
const dbConfig = require('../../config/database')

const User = require('../../models/SQL/User')

const connection = new Sequelize(dbConfig)

connection.authenticate().then(() => {
  console.log('✔ Connection has been established successfully - SQL ✔')
}).catch((error) => {
  console.log('❌ Unable to connect to the database ❌ :', error)
})

User.init(connection)

module.exports = connection



