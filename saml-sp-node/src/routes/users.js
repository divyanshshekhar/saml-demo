var express = require('express');
var router = express.Router();
var session = require('express-session')
var passport = require('passport')

router.post(
    '/login',
    passport.authenticate('password', {failureRedirect: '/login', failureMessage: true}),
    function (req, res) {
      res.redirect('/');
    });

router.post(
    '/logout',
    function (req, res) {
      req.logout();
      res.redirect('/');
    });

module.exports = router;
