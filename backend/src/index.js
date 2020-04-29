const express = require('express')
const monsgoose = require('mongoose')

//Iniciando o App
const app = express()

//Conecção com BD do MongoDB
monsgoose.connect('mongodb+srv://EricoBruner:erico2403@cluster0-sztec.mongodb.net/test?retryWrites=true&w=majority', {
  useNewUrlParser: true,
  useUnifiedTopology: true,

}).then(() => {
  console.log(">>> Conecção com MongoDB concluida <<<")

}).catch((erro) => {
  console.log("xxx Conecção com MongoDB não concluida xxx")
})

//Rota de requisição de usuarios
app.get('/users', (request, response) => {
  return response.json([])
})

app.post('/users', (request, response) => {
  const {  } = request.body
})

app.put('/users', (request, response) => {
  const {  } = request.body
})

app.listen(3333, () => {
  console.log('>>> Back-end esta no ar <<<')
})