const express = require('express')

const UserController = require('./controllers/UserController')
const dateUserController = require('./controllers/dateUserController')
const lolController = require('./controllers/apiControllers/lolController')

const routes = express.Router()

const authentication = require('./middlewares/Authentication')

routes.post('/users', UserController.store)
routes.post('/login', UserController.login)
routes.get('/users', authentication, UserController.list)

routes.post('/kingdom', authentication, dateUserController.store)
routes.post('/kingdom/league_of_legends', authentication, lolController.store)
routes.get('/kingdom/league_of_legends', authentication, lolController.index)



module.exports = routes