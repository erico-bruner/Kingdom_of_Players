const User = require('../models/SQL/User')
const jwt = require('jsonwebtoken')
require('dotenv').config()

module.exports = (req, res, next) => {
  const token = req.headers['authorization']

  if(typeof token !== 'undefined') {
    jwt.verify(token, process.env.JWT_KEY, (error, authDate) => {
      if(error) {
        return res.status(401).json({success: false, message:'token invalid'})
      } else {
        res.locals.authDate = authDate
        next() 
      }
    })
  }else{
    return res.status(401).json({success: false, message: 'token not informed'})
  }

}