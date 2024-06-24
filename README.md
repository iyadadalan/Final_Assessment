# INFO 4345 Final Project - Website Security Enhancement

# Table of Contents

- [Group Members](#group-members)
- [Web Application Overview](#webapp)
- [Objectives](#objectives)
- [Enhancements](#enhancements)
  - [Input Validation](#input-validation)
  - [Authentication](#authentication)
  - [Authorization](#authorization)
  - [XSS and CSRF Prevention](#xss-and-csrf-prevention)
  - [Database Security](#database-security)
  - [File Security](#file-security)

## Group Members
Wan Hamzah Iyad bin Wan Adlan (2115449) - Leader
- Input Validation
- XSS & CSRF Defence

Muhammad bin Abas (2113201)
- Authentication
- Authorization

Muhammad Arif Faisal bin Zahari (2117277)
- Database Security
- File Security

## <a name="webapp"/>Web Application Overview
**Name of Website:** SweatFactory

### Introduction
SweatFactory is an engaging website designed specifically for a mock organization focused on gym services and promoting a healthy lifestyle. The website offers a variety of features ranging from exercise tutorials, dietary guidance, lifestyle management tips, and a user-friendly BMI calculator. This platform stands out by providing a comprehensive fitness experience that is both informative and engaging.

Key features of the SweatFactory website include:
- **Gym Registration:** Prospective gym members can navigate from the "Register Now" button on the Home page to the Registration page, where various membership plans are detailed, allowing users to sign up and access the gym facilities located in Kuala Lumpur.
- **Educational Content:** Extensive information is available on home exercises and detailed diet plans, including various nutritional strategies.
- **Interactive Tools:** Features like a BMI calculator help users actively engage with their health, offering valuable tools to assess and maintain their wellness.

## Objectives
1. **Improving Data Integrity and Security:** Implement robust security measures to protect personal data of users from unauthorized access, alteration, or destruction.
2. **Enhancing User Privacy:** Strengthen privacy protocols to ensure that all user data is handled confidentially and in compliance with applicable privacy laws and regulations.
3. **Preventing Web Attacks:** Introduce advanced safeguards to defend against common web vulnerabilities such as Cross-Site Scripting (XSS), Cross-Site Request Forgery (CSRF), and SQL injection.
4. **Ensuring Secure User Interactions:** Deploy mechanisms like Content Security Policies (CSP) to secure user interactions with the website.

## Database Setup

Step 1: Create a new database:
```sql
CREATE DATABASE final_assessment;
```
Step 2: Switch to the new database:
```sql
USE final_assessment;
```
Step 3: Create the users table:
```sql
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    gender ENUM('male', 'female', 'Other') NOT NULL,
    user_type ENUM('user', 'admin') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
Step 4:  Create a stored procedure to fetch user details by email:
```sql
-- Create the stored procedure to get user by email
DELIMITER //

CREATE PROCEDURE GetUserByEmail(IN p_email VARCHAR(255))
BEGIN
    SELECT * FROM users WHERE email = p_email LIMIT 1;
END //

DELIMITER ;

```
```sql
-- Create the stored procedure to register a new user
DELIMITER //

CREATE PROCEDURE RegisterUser(
    IN p_user_id VARCHAR(255),
    IN p_email VARCHAR(255),
    IN p_password VARCHAR(255),
    IN p_username VARCHAR(255),
    IN p_gender ENUM('male', 'female'),
    IN p_user_type ENUM('admin', 'user')
)
BEGIN
    INSERT INTO users (user_id, email, password, username, gender, user_type)
    VALUES (p_user_id, p_email, p_password, p_username, p_gender, p_user_type);
END //

DELIMITER ;
```
Step 5: Insert admin account
```sql
-- Username: admin 
-- Password: Admin123

INSERT INTO users (username, email, password, gender, user_type)
VALUES ('admin', 'admin@example.com', '$2y$10$rqOZP1q4uLVgu/9TfZ6rZesQ8y9iynGs1UGfOMAV5brG58cMyOS72', 'Male', 'admin');
```


## Enhancements

### <a name="input-validation"/>Input Validation - Iyad
Description and implementation details of input validation methods.

For input validation, extensive use of both client-side and server-side strategies was implemented across all forms. Each input field in forms such as signup and login uses regex patterns that enforce specific formatting rules. These rules ensure that the input matches expected patterns such as valid email formats, strong password requirements (including upper and lowercase letters, numbers, and minimum length), and valid full names. On the client-side, JavaScript regex validation is used to provide immediate feedback before form submission. On the server-side, PHP scripts sanitize and validate data to prevent any malicious input from being processed or stored.

### <a name="authentication"/>Authentication - Muhammad
Details on the authentication mechanisms implemented.

This PHP script handles user authentication by validating the user's email and password during login. The authentication process involves verifying the supplied credentials against stored user data in a MySQL database. When the user want to sign in, there will be a comaprison login in the application with the Hashed Password.

[signup.php](Enhanced/reister_user/signup.php)

## Form Handling
```php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $user_name = htmlspecialchars($_POST['user_name']);
    $gender = htmlspecialchars($_POST['gender']);
    $user_type = 'user';
```

- Checks if the request method is POST, indicating that the form has been submitted.

## Password Hashing
```php
    if (!empty($email) && !empty($password)) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $user_id = random_num(5);
```

- Ensures that both email and password fields are not empty.
- Hashes the password using password_hash with the default algorithm (currently bcrypt).
- Generates a random user ID using the random_num function.

## Database Query
```php
        if ($stmt = $conn->prepare("CALL RegisterUser(?, ?, ?, ?, ?, ?)")) {
            $stmt->bind_param("ssssss", $user_id, $email, $password_hash, $user_name, $gender, $user_type);
            $stmt->execute();
            $stmt->close();

            header("Location: ../login_user/signin.php");
            die;
        } else {
            echo "Database error: " . $conn->error;
        }
    } else {
        echo "Please enter some valid information!";
    }
}
```

- Prepares a stored procedure call to register the user with the provided details.
- Binds the parameters (user_id, email, password_hash, user_name, gender, and user_type) to the prepared statement and executes it.
- Closes the statement and redirects the user to the login page upon successful registration.

[signin.php](Enhanced/reister_user/signin.php)

## Credential Verification
```php
if ($result && $result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
    
    if (password_verify($password, $user_data['password'])) {
        $_SESSION['user_id'] = $user_data['user_id'];
        $_SESSION['username'] = $user_data['username'];
        $_SESSION['email'] = $user_data['email'];
        $_SESSION['user_type'] = $user_data['user_type'];
```

- Checks if the result set contains any rows, indicating that a user with the provided email exists.
- Fetches the user data and verifies the supplied password against the hashed password stored in the database using password_verify.

## Session Management and Redirection
```php
if ($user_data['user_type'] == 'admin') {
    header('Location: ../adminpage/admin_index.php');
} elseif ($user_data['user_type'] == 'user') {
    header('Location: ../au_userpage/user_index.php');
}
exit;
```

- If password verification is successful, sets session variables with user details.
- Redirects the user to the appropriate page based on their user type (admin or user).

Protecting Website with .htaccess file

### <a name="authorization"/>Authorization - Muhammad
Explanation of the authorization processes enhanced.

### <a name="xss-and-csrf-prevention"/>XSS and CSRF Prevention - Iyad
Strategies used to prevent XSS and CSRF vulnerabilities.

To combat XSS and CSRF vulnerabilities, several measures have been taken:

- **Content Security Policy (CSP):** A strict CSP is implemented to control the sources of content that can be loaded on the website. This includes restrictions on scripts, styles, and images to trusted sources and disallows inline scripts and styles to mitigate XSS attacks.
- **CSRF Tokens:** CSRF tokens are used in all forms to ensure that requests are originated from the website's forms and not from external sources. This token is generated on the server-side, embedded in forms, and verified on each form submission.
- **Sanitization:** All inputs from users are sanitized using PHP to encode or strip out potentially malicious characters and scripts, reducing the risk of XSS attacks.
- **Escaping Output:** When displaying user input or data retrieved from the database, the application uses PHP functions to escape the output, ensuring that any executable code is rendered harmless.

These strategies collectively enhance the security of the website by validating input data rigorously and defending against common web vulnerabilities like XSS and CSRF.

### <a name="database-security"/>Database Security - Arif

Security Principles Implemented
1. Prepared Statements <br>
Both the login and registration scripts use prepared statements to interact with the database. Prepared statements are a powerful way to mitigate SQL injection attacks. By using prepared statements, SQL queries are precompiled by the database, and user inputs are treated as data rather than executable code.

#### Vulnerable SQL Query (Without Prepared Statement) ####
- login.php
```php
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);
```
- register.php
```php
    // Vulnerable to SQL injection
    $query = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";
    if ($conn->query($query) === TRUE) {
        // Registration successful, redirect to login page
        header("Location: login.php");
        exit;
    } else {
        $error = "Email already exists";
    }
}
```
Secure SQL Query (With Prepared Statement)

- login.php 
```php
if ($stmt = $conn->prepare("CALL GetUserByEmail(?)")) {
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
}
```
- register.php
```php
if ($stmt = $conn->prepare("CALL RegisterUser(?, ?)")) {
    $stmt->bind_param("ss", $email, $hashed_password);
    $stmt->execute();
}
```

2. Stored Procedures <br>
Stored procedures encapsulate SQL queries and logic within the database and reduces the risk of SQL injection. They are stored in the database and can be executed by calling them from applications. The provided code already uses stored procedures (GetUserByEmail and RegisterUser), which is a good practice.

Vulnerable SQL Query (Without Stored Procedure)
```php
$email = $_POST['email'];
$query = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($query);
```
Secure SQL Query (With Stored Procedure)
Stored Procedure Definition:
```sql
DELIMITER $$
CREATE PROCEDURE GetUserByEmail(IN userEmail VARCHAR(255))
BEGIN
    SELECT * FROM users WHERE email = userEmail;
END $$
DELIMITER ;
```
PHP Code to Call Stored Procedure:
```php
if ($stmt = $conn->prepare("CALL GetUserByEmail(?)")) {
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    // process result
    $stmt->close();
}
```
3. Password Hashing <br>
Passwords are hashed before being stored in the database. Hashing ensures that even if the database is compromised, the actual passwords are not exposed. The ```password_hash``` function is used to create a secure hash of the password.

Example:
```php
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

```
### <a name="file-security"/>File Security - Arif
Methods used to secure file management and storage.
1. Restrict Diretory Listing <br>
Directory listing in a web server like Apache (which XAMPP uses) can expose the contents of directories to users, potentially revealing sensitive information or files that should not be publicly accessible. Restricting directory listing is an important security measure.

  Step 1: Navigate to C:/xampp/apache/conf/. <br>
  ![image](https://github.com/iyadadalan/Final_Assessment/assets/59950029/e4fe23de-daa5-47b4-92c7-db734321f654)
  <br><br>
  Step 2: Open the httpd.conf file with a text editor like Notepad++ or any other text editor. <br>
  ![image](https://github.com/iyadadalan/Final_Assessment/assets/59950029/255cff2c-27a3-410b-a186-8c535dfc8928)
  <br><br>
  Step 3: Change the Options directive to remove Indexes <br>
```
<Directory "C:/xampp/htdocs">
    Options FollowSymLinks Includes ExecCGI
    AllowOverride All
    Require all granted
</Directory>
```
- Options: This directive controls which server features are enabled or disabled in that directory.
- Indexes: When enabled, if a user requests a directory and no index file (like index.html or index.php) is present, Apache will display a listing of the directory's contents.
- FollowSymLinks: Allows Apache to follow symbolic links.
- Includes: Allows server-side includes (SSI).
- ExecCGI: Allows execution of CGI scripts.
