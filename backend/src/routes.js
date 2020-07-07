const express = require('express')
const UserController = require('./controllers/UserController')
const routes = express.Router()

const authentication = require('./middlewares/Authentication')

routes.post('/users', UserController.store)
routes.post('/login', UserController.login)

routes.get('/users', authentication, UserController.list )

module.exports = routes