const express = require("express");
const mongoose = require("mongoose");
const colors = require("colors");
const errorHandler = require("./middleware/error");
const dotenv = require("dotenv").config();
const connectDB = require("./config/db");
// const bodyparser = require('body-parser')

//Routes
const auth = require("./routes/auth");

connectDB();

//Iniciando o App
const app = express();
app.use(express.json());
// app.use(bodyParser());

if (process.env.NODE_ENV === "development") {
  console.log(process.env.NODE_ENV);
}

const PORT = process.env.PORT || 3333;

const server = app.listen(
  PORT,
  console.log(
    `Server running in ${process.env.NODE_ENV} mode on 
port ${PORT}`.yellow.bold
  )
);

//Using Routes
app.use("/api/v1/auth", auth);
app.use(errorHandler);

process.on("unhandledRejection", (err, promise) => {
  console.log(`Error: ${err.message}`.red);

  server.close(() => process.exit(1));
});

//Rota de requisição de usuarios
// app.get("/users", (request, response) => {
//   return response.json([]);
// });

// app.post("/users", (request, response) => {
//   const {} = request.body;
// });

// app.put("/users", (request, response) => {
//   const {} = request.body;
// });

// app.listen(3333, () => {
//   console.log(">>> Back-end esta no ar <<<");
// });
