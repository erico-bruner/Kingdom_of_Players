const User = require('../models/SQL/User')
const jwt = require('jsonwebtoken')
require('dotenv').config()

module.exports = (req, res, next) => {
  const token = req.headers['authorization']

  if(typeof token !== 'undefined') {
    jwt.verify(token, process.env.JWT_KEY, (error, authData) => {
      if(error) {
        return res.status(401).send('token invalid')
      } else {
        module.exports = authData
        next() 
      }
    })
  }else{
    return res.status(401).send({error: 'token not informed'})
  }

}