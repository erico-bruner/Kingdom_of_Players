const dateUser = require('../../../models/NoSQL/dateUser')
const axios = require('axios')

module.exports = { 

  store(req, res) { 

    const apiKey = "RGAPI-39037566-f556-4896-948b-4464ffcaf651";
    const authDate = res.locals.authDate.user
    const { nick } = req.body
    
    axios.get(`https://br1.api.riotgames.com/lol/summoner/v4/summoners/by-name/${nick}?api_key=${apiKey}`
    ).then(async (responseApi) => {
      if(responseApi.data) {
        await dateUser.findOne({id_user: authDate.id
        }).then(async(user) => {
          axios.get(`https://br1.api.riotgames.com/lol/league/v4/entries/by-summoner/${responseApi.data.id}?api_key=${apiKey}`)
          .then(async (responseApiElo) => {
            if(!user) {
              await dateUser.create({ 
                id_user: authDate.id,
                name: authDate.name,
                Api:{
                  lol:{
                    id: responseApi.data.id,
                    name: responseApi.data.name,
                    elo: {
                      leagueId: responseApiElo.data.leagueId
                    }
                  },
                }
              }).then(newUser => {
                return res.status(200).json(
                  {success: "true", message: "dados do usuário criados", 
                  data: {user: responseApi.data, elo: responseApiElo.data, kingdomUser: authDate}})
              })
            }else{
              await dateUser.findOneAndUpdate({id_user: authDate.id},{ 
                Api:{
                  lol:{
                    id: responseApi.data.id,
                    name: responseApi.data.name,
                  },
                  elo: {
                    leagueId: responseApiElo.data.leagueId
                  }
                }
              }, { new: true }).then(updUser => {
                return res.status(200).json({success: "true", message: "Novos dados do usuário atualizados", 
                data: {user: responseApi.data, elo: responseApiElo.data, kingdomUser: authDate}})
              })
            }
          })
        })
      }
    })
    .catch(err => {
      if(!err.data) {
        return res.status(401).json({success: "false", message: "usuario inexistente"})
      }
      return res.status(401).json(err)
    })
  },
  
  async list(req, res) {
    
    const { latitude, longitude , distance } = req.body

    const users = await dateUser.find({
      lol:{ $exists: false
      },
      location:{
        $near: {
          $geometry: {
            type: 'Point',
            coordinates: [ longitude, latitude ]
          },
          $maxDistance: distance
        }
      }
    })
    
    if(!users) {
      return res.status(200).json({success: "false", message:"nenhum usuário nesta area ;-;"})
    }
    return res.status(200).json({success: "true", data: users})
  },
  
  async index(req, res) {

    const apiKey = "RGAPI-39037566-f556-4896-948b-4464ffcaf651";
    const id_user = req.params.id

    await dateUser.findOne({id_user: id_user})
    .then(async user => {
      await axios.get(`https://br1.api.riotgames.com/lol/summoner/v4/summoners/by-name/${user.Api.lol.name}?api_key=RGAPI-39037566-f556-4896-948b-4464ffcaf651`)
      .then(async responseApi => {
        await axios.get(`https://br1.api.riotgames.com/lol/league/v4/entries/by-summoner/${responseApi.data.id}?api_key=RGAPI-39037566-f556-4896-948b-4464ffcaf651`)       
        .then(responseApiElo => {
          const authDate = res.locals.authDate.user
          return res.status(200).json({success: "true", data: {user: responseApi.data, elo: responseApiElo.data, kingdomUser: authDate}})
        })
      })
    })
  }
}