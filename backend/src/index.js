const express = require('express')

const app = express()

app.get('/users', (request, response) => {
  return response.json([
    'conta 1',
    'conta 2',
  ])
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