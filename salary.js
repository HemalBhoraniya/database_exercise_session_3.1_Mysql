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
    var sql = "CREATE TABLE salary (id int auto_increment primary key, emp_id int, month varchar(11), year int(4), amount int(6), generated_date date, FOREIGN KEY (emp_id) REFERENCES employee (id) ON DELETE CASCADE ON UPDATE CASCADE);";
    con.query(sql, function (err, result) {
        if (err) throw err;
        console.log("Department Table created");
    });
});