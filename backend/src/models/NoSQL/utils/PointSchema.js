const mongoose = require('mongoose')

const PointSchema = new mongoose.Schema({
  type: {
    type: String,
    enum: ['Point'],
  },
  coordinates: {
    type: [Number]
  }
})

module.exports = PointSchema