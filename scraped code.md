doctor model

```php
of your code.

// MySQL DB connection for PHP Procedural
<?php
$host = localhost; // Host name 
$username = username; // Mysql username 
$password = password; // Mysql password 
$db_name = databasename; // Database name 

// Connect to server and select databse.
$con = mysqli_connect($host, $username, $password)or die(cannot connect); 
mysqli_select_db($con, $db_name)or die(cannot select DB);

// Check connection
if (mysqli_connect_errno())
  {
  echo Failed to connect to MySQL:  . mysqli_connect_error();
  }
?>

// PHP Procedural Database Model

<?php
// Create table
$sql=CREATE TABLE doctors(
ID INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(ID) NOT NULL AUTO_INCREMENT,
name VARCHAR(30),
specialty VARCHAR(50),
address VARCHAR(
);

// Execute query
if (mysqli_query($con,$sql))
  {
  echo Table doctors created successfully;
  }
else
  {
  echo Error creating table:  . mysqli_error($con);
  }
?>

// PHP Procedural CRUD Endpoints Code

<?php
// Create
function create_doctor($name, $specialty, $address) {
    global $con;
    $sql = INSERT INTO doctors (name, specialty, address) VALUES ('$name', '$specialty', '$address');

    if (mysqli_query($con,$sql)) {
        return true;
    } else {
        echo Error creating record:  . mysqli_error($con);
    }
}

// Read
function read_doctor($id) {
    global $con;
    $sql = SELECT * FROM doctors WHERE id = '$id';

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    return $row;
}

// Update
function update_doctor($id, $name, $specialty, $address) {
    global $con;
    $sql = UPDATE doctors SET name = '$name', specialty = '$specialty', address = '$address' WHERE id = '$id';

    if (mysqli_query($con,$sql)) {
        return true;
    } else {
        echo Error updating record:  . mysqli_error($con);
    }
}

// Delete
function delete_doctor($id) {
    global $con;
    $sql = DELETE FROM doctors WHERE id = '$id';

    if (mysqli_query($con,$sql)) {
        return true;
    } else {
        echo Error deleting record:  . mysqli_error($con);
    }
}
?>

```

Hospital
```php
of code

// MySQL DB connection for PHP procedural
$host = localhost;
$user = username;
$pass = password;
$dbname = db_name;

$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    die(Connection failed:  . mysqli_connect_error());
} 

// PHP procedural database model
// Create the structure of the database
CREATE TABLE hospitals (
    hospital_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    hospital_name varchar(255) NOT NULL,
    hospital_address varchar(255) NOT NULL,
    hospital_phone varchar(20) NOT NULL,
    area varchar(120),
    city varchar(120),
    district varchar(120),
    state varchar(120),
    pincode varchar(8),
    location varchar(120),
);

CREATE TABLE doctors (
    doctor_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    doctor_name varchar(255),
    doctor_specialty varchar(255) NOT NULL,
    hospital_id int NOT NULL,
    is_available bool NOT NULL,
    timings varchar(12),
    FOREIGN KEY (hospital_id) REFERENCES hospitals (hospital_id)
);

CREATE TABLE patients (
    patient_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    patient_name varchar(255) NOT NULL,
    patient_address varchar(255) NOT NULL,
    patient_phone varchar(20) NOT NULL,
    hospital_id int NOT NULL,
    FOREIGN KEY (hospital_id) REFERENCES hospitals (hospital_id)
);

// PHP procedural CRUD endpoints code
// Create a new hospital
function createHospital($hospitalName, $hospitalAddress, $hospitalPhone) {
    global $conn;
    $sql = INSERT INTO hospitals (hospital_name, hospital_address, hospital_phone)
            VALUES (?, ?, ?);

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, sss, $hospitalName, $hospitalAddress, $hospitalPhone);
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }
    }
    return false;
}

// Read a hospital
function readHospital($hospitalId) {
    global $conn;
    $sql = SELECT * FROM hospitals WHERE hospital_id = ?;
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, i, $hospitalId);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            return mysqli_fetch_assoc($result);
        }
    }
    return false;
}

// Update a hospital
function updateHospital($hospitalId, $hospitalName, $hospitalAddress, $hospitalPhone) {
    global $conn;
    $sql = UPDATE hospitals SET hospital_name = ?, hospital_address = ?, hospital_phone = ? WHERE hospital_id = ?;
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, sssi, $hospitalName, $hospitalAddress, $hospitalPhone, $hospitalId);
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }
    }
    return false;
}

// Delete a hospital
function deleteHospital($hospitalId) {
    global $conn;
    $sql = DELETE FROM hospitals WHERE hospital_id = ?;
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, i, $hospitalId);
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }
    }
    return false;
}?>
```


Appointment
```php
of the code

PHP Procedural Database Model
<code>&lt;?php
// Create a database connection
$db = mysqli_connect(host, username, password, database);

// Create a appointments table
$sql = CREATE TABLE appointments (
id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
time DATETIME NOT NULL,
status VARCHAR(50) NOT NULL,
other_fields VARCHAR(50) NOT NULL
); 

if(mysqli_query($db, $sql)){
    echo Table created successfully;
} else {
    echo Error creating table:  . mysqli_error($db);
}

?&gt;
</code>
PHP Procedural CRUD Endpoints Code
<code>&lt;?php
// Create a database connection
$db = mysqli_connect(host, username, password, database);

// Create
function create_appointment($time, $status, $other_fields){
    global $db;
    $sql = INSERT INTO appointments (time, status, other_fields) VALUES ('$time', '$status', '$other_fields');
    $result = mysqli_query($db, $sql);
    return $result;
}

// Read
function get_appointment(){
    global $db;
    $sql = SELECT * FROM appointments;
    $result = mysqli_query($db, $sql);
    $appointments = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $appointments;
}

// Update
function update_appointment($id, $time, $status, $other_fields){
    global $db;
    $sql = UPDATE appointments SET time='$time', status='$status', other_fields='$other_fields' WHERE id=$id;
    $result = mysqli_query($db, $sql);
    return $result;
}

// Delete
function delete_appointment($id){
    global $db;
    $sql = DELETE FROM appointments WHERE id=$id;
    $result = mysqli_query($db, $sql);
    return $result;
}

?&gt;
</code>
```