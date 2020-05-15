const express = require("express");
const {
  store,
  login,
  getMe,
  getAll,
  forgotPassword,
} = require("../controllers/AuthController");
const { protect } = require("../middleware/auth");
const router = express.Router();

router.post("/register", store);
router.post("/login", login);
router.get("/me", protect, getMe);
router.get("/all", getAll);
router.post("/forgotpassword", forgotPassword);

module.exports = router;
