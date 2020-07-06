const express = require('express')
const bodyParser = require('body-parser')
const routes = require('./routes')

require('./database')

//Iniciando o App
const app = express()


//Utilando body-parser para que o node entenda requisições no formato json e motodos url e http
app.use(bodyParser.json())
app.use(bodyParser.urlencoded())

//Iniciando Arquivo de rotas
app.use(routes)

//Escutando porta 3333
app.listen(3333, () => {
  console.log('>>> Back-end esta no ar <<<')
})