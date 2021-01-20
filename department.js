var mysql = require('mysql');

var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "mydb"
});

con.connect(function (err) {
    if (err) throw err;
    console.log("Connected!");
    var sql = "CREATE TABLE department (id int auto_increment primary key, name VARCHAR(150), created_date date)";
    con.query(sql, function (err, result) {
        if (err) throw err;
        console.log("Department Table created");
    });
});