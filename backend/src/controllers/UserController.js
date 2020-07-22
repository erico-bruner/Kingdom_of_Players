const User = require('../models/SQL/User')
const bcrypt = require('bcrypt')
const jwt = require('jsonwebtoken')
require('dotenv').config()

// index - mostrar_lista, show - mostar_unico, store - criar, update, destroy

module.exports = {
  
  async store(req, res) 
  {
    const { name, email, password } = req.body

    await User.findOne({where:{name:name}
    }).then( async userName => {
      if(!userName) 
      {
        await User.findOne({where:{email:email}
        }).then( async userEmail => {
          if(!userEmail)
          {
            const hash = bcrypt.hashSync( password, 10 )
            await User.create({ 
              name, 
              email, 
              password: hash, 
            })
            let token = jwt.sign({ User }, process.env.JWT_KEY, { expiresIn: "24h"})
            return res.status(201).json({success: 'true', message: 'User created successfully', token: token})
          }else{
            return res.status(401).json({success: 'false', message: 'Email already registered'})
          }
        }).catch(err => {
          console.log(User)
          return res.json({error: err, message:"email"})
        })
      }else{
        return res.status(401).json(
          {
            "success": "false",
            "message":"Name already registered",
          })
      }
    }).catch(err => {
      return res.json({error: err, message: "name"})
    })
  },

  async login(req, res) {
    const { email, password } = req.body

    await User.findOne({
      where: {
        email: email
      }
    }).then(user => {
      if(user){
        if(bcrypt.compareSync(password, user.password )){
          let token = jwt.sign({user}, process.env.JWT_KEY, { expiresIn: "24h"})
          return res.status(200).json({success: "true", message: 'successfully logged in', token: token })
        }else{
          console.log(email, password)
          return res.status(401).json({success: "false", message: 'Invalid credentials SENHA'})
        }
      }else{
        console.log(email, password)
        return res.status(401).json({sucess: "false", message: 'Invalid credentials EMAIL'})
      }
    }).catch(err => {
      return res.json({error: err})
    })
  },

  async list(req, res) {
    await User.findAll().then(users => {
      return res.json({success: "true", users: users})
    }).catch(err => {
      return res.json({success: "false", error: err})
    })
  },

  async teste(req, res) {
      res.json({success: "false", users: "users", teste: "testeDentroDoTeste"})
  }
}
