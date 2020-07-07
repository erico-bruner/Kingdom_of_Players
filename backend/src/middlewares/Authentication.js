const User = require('../models/User')
const jwt = require('jsonwebtoken')
require('dotenv').config()

module.exports = (req, res, next) => {
  const token = req.headers['authorization']

  if(typeof token !== 'undefined') {
    jwt.verify(token, process.env.JWT_KEY, (error, authData) => {
      if(error) {
        return res.status(401).send('token invalid')
      } else {
        req.authData = authData
        next() 
      }
    })
  }else{
    return res.status(401).send({error: 'token not informed'})
  }

}