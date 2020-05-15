const User = require("../models/User");
const ErrorResponse = require("../utils/errorResponse");
const asyncHandler = require("../middleware/async");

//@desc Register user
//@route POST /api/v1/auth/register
//@acess Public

exports.store = asyncHandler(async (req, res, next) => {
  const { name, email, password, role } = req.body;

  // Create user
  const user = await User.create({
    name,
    email,
    password,
    role,
  });

  sendTokenResponse(user, 200, res);

  // res.status(200).json({ success: true, token });
});

//@desc Login user
//@route POST /api/v1/auth/login
//@acess Public

exports.login = asyncHandler(async (req, res, next) => {
  const { email, password } = req.body;

  // Validate email & password

  if (!email || !password) {
    return next(new ErrorResponse(`Please provide an email and password`, 400));
  }

  // Check for user
  const user = await User.findOne({ email }).select("+password");

  if (!user) {
    return next(new ErrorResponse(`Invalid credentials`, 401));
  }

  // Check if password matches

  const isMatch = await user.matchPassword(password);

  if (!isMatch) {
    return next(new ErrorResponse(`Invalid credentials`, 401));
  }

  sendTokenResponse(user, 200, res);

  // res.status(200).json({ success: true, token });
});

//@desc Get current loggged user
//@route POST /api/v1/auth/me
//@acess Private
exports.getMe = asyncHandler(async (req, res, next) => {
  const user = await User.findById(req.user.id);

  res.status(200).json({
    success: true,
    data: user,
  });
});

//@desc Get current loggged user
//@route GET /api/v1/auth/me
//@acess Private
exports.getMe = asyncHandler(async (req, res, next) => {
  const user = await User.findById(req.user.id);

  res.status(200).json({
    success: true,
    data: user,
  });
});

//@desc Get current loggged user
//@route GET /api/v1/auth/me
//@acess Private
exports.getAll = asyncHandler(async (req, res, next) => {
  const user = await User.find();

  res.status(200).json({
    success: true,
    data: user,
  });
});

//@desc Forgot password
//@route POST /api/v1/auth/forgotpassword
//@acess Public
exports.forgotPassword = asyncHandler(async (req, res, next) => {
  const user = await User.findOne({ email: req.body.email });

  if (!user) {
    return next(new ErrorResponse("There is no user with that email", 404));
  }

  //Get reset token
  const resetToken = user.getResetPasswordToken();

  await user.save({ validateBeforeSave: false });

  res.status(200).json({
    success: true,
    data: user,
  });
});

// Get token from model, create a cookie and send response
const sendTokenResponse = (user, statusCode, res) => {
  // Create token
  const token = user.getSignedJwtToken();
  const options = {
    expires: new Date(
      Date.now() + process.env.JWT_COOKIE_EXPIRE * 24 * 60 * 60 * 1000
    ),
    httpOnly: true,
  };

  if (process.env.NODE_ENV === "production") {
    options.secure = true;
  }

  res
    .status(statusCode)
    .cookie("token", token, options)
    .json({ success: true, token });
};
