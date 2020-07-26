const mongoose = require('mongoose')
const PointSchema = require('./utils/PointSchema')

const dateUserSchema = new mongoose.Schema({
  id_user: Number,
  name: String, 
  location: {
    type: PointSchema,
    index: '2dsphere'
  },
  Api: {lol: {id: String, name: String, profileIconId: Number, accountLevel: Number}}
})

module.exports = mongoose.model('dateUser', dateUserSchema)