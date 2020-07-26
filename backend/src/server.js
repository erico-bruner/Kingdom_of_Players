const express = require('express')
const bodyParser = require('body-parser')
const routes = require('./routes')
const cors = require('cors')
const axios = require('axios')

require('./database/SQL')
require('./database/noSQL')

//Iniciando o App
const app = express()

app.use(cors())


//Utilando body-parser para que o node entenda requisições no formato json e motodos url e http
app.use(bodyParser.json())
app.use(bodyParser.urlencoded())
app.use(bodyParser.json());
app.use(bodyParser.raw());

//axios.get('https://api.github.com/users/EricoBruner').then(dados => {
  //console.log(dados)})

//Iniciando Arquivo de rotas
app.use(routes)

//Escutando porta 3333
app.listen(3333, () => {
  console.log('>>> Back-end esta no ar <<<')
})