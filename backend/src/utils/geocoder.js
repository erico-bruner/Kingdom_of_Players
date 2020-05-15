const NodeGeocoder = require("node-geocoder");

const options = {
  provider: "mapquest",
  httpAdapter: "https",
  apiKey: "nsJWm08ueRmXjJgUwMZGVoKziAr99bRl",
  formatter: null,
};

const geocoder = NodeGeocoder(options);
module.exports = geocoder;
