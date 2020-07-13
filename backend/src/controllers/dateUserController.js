const dateUser = require('../models/NoSQL/dateUser')
const authData = require('../middlewares/Authentication')

module.exports = {
  async store(req, res, authDate) {
    await dateUser.create({
      id_user: authDate.id,
      name: authDate
    }).then(() => {
      return res.status(200).send({message: 'Tudo certo', dateUser})
    }).catch((err) => {
      return res.status(401).send({message: 'Tudo errado', err})
    })
  }
}