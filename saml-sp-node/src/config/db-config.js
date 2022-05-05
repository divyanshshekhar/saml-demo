const mysql = require("mysql");

function createUsersTable(connection) {
    connection.query(`CREATE TABLE IF NOT EXISTS users(
        id INT NOT NULL AUTO_INCREMENT,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(32) NOT NULL,
        PRIMARY KEY(id)
    )`)
}

function createTables(connection) {
    createUsersTable(connection);
}

function isConnected(connection) {
    return connection && connection.state === 'authenticated';
}

let db;

function connect() {
    return new Promise((resolve) => {
        if(isConnected(db)) {
            resolve(db);
        }
        db = mysql.createConnection({
            host: process.env.DB_HOST,
            port: process.env.DB_PORT,
            password: process.env.DB_PASSWORD,
            user: process.env.DB_USER,
            database: process.env.DB_NAME
        })

        db.connect((err) => {
            if(err) {
                console.warn("Failed to connect to database. Retrying in 3 seconds");
                setTimeout(connect, 3000);
            } else {
                createTables(db);
                resolve(db);
            }
        })
    });
}

const getDbConnection = async () => {
    return await connect();
}

module.exports = getDbConnection