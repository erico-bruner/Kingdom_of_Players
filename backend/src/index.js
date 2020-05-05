const express = require('express')
const monsgoose = require('mongoose')
const bodyParser = require('body-parser')
const requireDir = require('require-dir')

//Iniciando o App
const app = express()

//Utilando body-parser para que o node entenda requisições no formato json e motodos url e http
app.use(bodyParser.json())
app.use(bodyParser.urlencoded())

//Conecção com BD do MongoDB
monsgoose.connect('mongodb+srv://EricoBruner:erico2403@cluster0-sztec.mongodb.net/KOP?retryWrites=true&w=majority', {
  useNewUrlParser: true,
  useUnifiedTopology: true,

}).then(() => {
  console.log(">>> Conecção com MongoDB concluida <<<")

}).catch((erro) => {
  console.log("xxx Conecção com MongoDB não concluida xxx")
})

//Inicia os models do Banco na Aplicação
requireDir('./models')

const User = monsgoose.model('Users')

//Rota de requisição de usuarios
app.get('/users', (request, response) => {
  return response.json([])
})

//Rota criação de novo Usuario
app.post('/users', (request, response) => {
  const { name, email, password, games } = request.body

  User.create({
    name: name,
    email: email,
    password: password,
    games: games,
  })

  return response.status(200).json({message:"Account successfully created"})
})

app.put('/users', (request, response) => {
  const {  } = request.body
})

app.listen(3333, () => {
  console.log('>>> Back-end esta no ar <<<')
})