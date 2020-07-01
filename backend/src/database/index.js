const Sequelize = require('sequelize')
const dbConfig = require('../config/database')

const connection = new Sequelize('kop', 'Erico', 'erico2403', {
  host: 'localhost',
  dialect:'mysql'
})

//Teste de coneção com Banco de Dados
connection.authenticate().then(() => {
  console.log('✔ Connection has been established successfully ✔')
}).catch((error) => {
  console.log('❌ Unable to connect to the database ❌ :', error)
})

module.exports = connection