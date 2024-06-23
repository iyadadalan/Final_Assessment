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

## Web Application Overview
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

## Enhancements

### <a name="input-validation"/>Input Validation - Iyad
Description and implementation details of input validation methods.

### <a name="authentication"/>Authentication - Muhammad
Details on the authentication mechanisms implemented.

### <a name="authorization"/>Authorization - Muhammad
Explanation of the authorization processes enhanced.

### <a name="xss-and-csrf-prevention"/>XSS and CSRF Prevention - Iyad
Strategies used to prevent XSS and CSRF vulnerabilities.

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


