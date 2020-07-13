const mongoose = require('mongoose')
require('dotenv').config

mongoose.connect( process.env.URL_DATEBASE_NOSQL, {
  useUnifiedTopology: true
}).then(() => {
  console.log('✔ Connection has been established successfully - NoSQL ✔')
}).catch((error) => {
  console.log('❌ Unable to connect to the database ❌ :', error)
})

module.exports = mongoose