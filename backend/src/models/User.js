const { Model, DataTypes } = require('sequelize')

class User extends Model {
  static init(sequelize) {
    super.init({

      name: DataTypes.STRING,
      email: DataTypes.STRING,
      password: DataTypes.STRING,
      id_games: DataTypes.INTEGER,
      location: DataTypes.STRING,
      puctuation: DataTypes.STRING,
    }, {
      sequelize
    })
  }
}

module.exports = User