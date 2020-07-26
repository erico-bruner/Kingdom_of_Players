const dateUser = require('../../models/NoSQL/dateUser')
const axios = require('axios')

module.exports = { 
  
  store(req, res) { 

    const authDate = res.locals.authDate.user
    const apiKey = "RGAPI-59754aa6-2d78-4548-84f7-0b3b3c5b11e5"
    const { nick } = req.body
    
    axios.get(`https://br1.api.riotgames.com/lol/summoner/v4/summoners/by-name/${nick}?api_key=${apiKey}`
    ).then(async (responseApi) => {
      if(responseApi.data) {
        await dateUser.findOne({id_user: authDate.id
        }).then(async(user) => {
          if(!user) {
            await dateUser.create({ 
              id_user: authDate.id,
              name: authDate.name,
              Api:{
                lol:{
                  id: responseApi.data.id,
                  name: responseApi.data.name,
                  profileIconId: responseApi.data.profileIconId,
                  accountLevel: responseApi.data.summonerLevel
                },
              }
            }).then(newUser => {
              return res.status(200).json({success: "true", message: "dados do usuario criados", data: newUser})
            })
          }else{
            await dateUser.findOneAndUpdate({id_user: authDate.id},{ 
              Api:{
                lol:{
                  id: responseApi.data.id,
                  name: responseApi.data.name,
                  profileIconId: responseApi.data.profileIconId,
                  accountLevel: responseApi.data.summonerLevel
                }
              }
            }, { new: true }).then(updUser => {
              return res.status(200).json({success: "true", message: "dados do usuario atualizados", data: updUser})
            })
          }
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

  async index(req, res) {

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
  }
}