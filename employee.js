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
    var sql = "CREATE TABLE employee (id int auto_increment primary key, name VARCHAR(150), emp_no int(3), dept_id int, join_date date, end_date date, FOREIGN KEY (dept_id) REFERENCES department (id) ON DELETE CASCADE ON UPDATE CASCADE);";
    con.query(sql, function (err, result) {
        if (err) throw err;
        console.log("Department Table created");
    });
});


