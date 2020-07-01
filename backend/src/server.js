const express = require('express')
const bodyParser = require('body-parser')
const routes = require('./routes')

require('./database')

//Iniciando o App
const app = express()


//Utilando body-parser para que o node entenda requisições no formato json e motodos url e http
app.use(bodyParser.json())
app.use(bodyParser.urlencoded())

app.use(routes)



//Rota de requisição de usuarios
app.get('/users', (request, response) => {
  return response.json([])
})

//Rota criação de novo Usuario
app.post('/users', (request, response) => {
  const { } = request.body
})

app.put('/users', (request, response) => {
  const {  } = request.body
})

app.listen(3333, () => {
  console.log('>>> Back-end esta no ar <<<')
})