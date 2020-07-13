const User = require('../models/SQL/User')
const bcrypt = require('bcrypt')
const jwt = require('jsonwebtoken')
require('dotenv').config()

// index - mostrar_lista, show - mostar_unico, store - criar, update, destroy

module.exports = {
  
  async store(req, res) 
  {
    const { name, email, password, id_games, location, puctuation } = req.body

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
              id_games, 
              location, 
              puctuation,
            })
            let token = jwt.sign({ User }, process.env.JWT_KEY, { expiresIn: "24h"})
            return res.status(201).send({message: 'User created successfully', token: token})
          }else{
            return res.status(401).send({message: 'Email already registered'})
          }
        }).catch(err => {
          return res.send({error: err})
        })
      }else{
        return res.status(401).send({message: 'Name already registered'})
      }
    }).catch(err => {
      return res.send({error: err})
    })
  },

  async login(req, res) {
    const { name, password } = req.body

    await User.findOne({
      where: {
        name: name
      }
    }).then(user => {
      if(user){
        if(bcrypt.compareSync(password, user.password )){
          let token = jwt.sign({user}, process.env.JWT_KEY, { expiresIn: "24h"})
          return res.status(200).send({message: 'successfully logged in', token: token })
        }else{
          return res.status(401).send({message: 'Invalid credentials'})
        }
      }else{
        return res.status(401).send({message: 'Invalid credentials'})
      }
    }).catch(err => {
      return res.send({error: err})
    })
  },

  async list(req, res) {
    const { name, password } = req.body

    await User.findAll().then(users => {
      return res.json(users)
    }).catch(err => {
      return res.send({error: err})
    })
  },

  async teste(req, res) {
    const { name, password } = req.body

  }
}
