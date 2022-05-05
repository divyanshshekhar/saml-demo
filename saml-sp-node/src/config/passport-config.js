const passport = require('passport')
const LocalStrategy = require('passport-local');
const getDbConnection = require('./db-config')


const localStrategy = new LocalStrategy(async function verify(username, password, cb) {

    (await getDbConnection()).query('SELECT * FROM users WHERE username = ?', [ username ], function(err, row) {
        if (err) { return cb(err); }
        if(row.length === 0) {
            return cb(null, false, { message: 'Incorrect username or password.' });
        }
        const user = row[0]['username']
        const password_from_db = row[0]['password']
        if (!user) {
            return cb(null, false, { message: 'Incorrect username or password.' });
        }

        crypto.pbkdf2(password, user.salt, 310000, 32, 'sha256', function(err, hashedPassword) {
            if (err) { return cb(err); }
            if (!crypto.timingSafeEqual(password_from_db, hashedPassword)) {
                return cb(null, false, { message: 'Incorrect username or password.' });
            }
            return cb(null, user);
        });
    });
});

passport.use('password', localStrategy)

module.exports = { localStrategy }