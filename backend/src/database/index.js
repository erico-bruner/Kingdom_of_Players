const Sequelize = require('sequelize')
const dbConfig = require('../config/database')

const User = require('../models/User')

const connection = new Sequelize(dbConfig)

//Teste de coneção com Banco de Dados
connection.authenticate().then(() => {
  console.log('✔ Connection has been established successfully ✔')
}).catch((error) => {
  console.log('❌ Unable to connect to the database ❌ :', error)
})

User.init(connection)

module.exports = connection