const mongoose = require('mongoose')

const dateUserSchema = new mongoose.Schema({
  id_user: Number,
  name: String, 
})

module.exports = mongoose.model('dateUser', dateUserSchema)