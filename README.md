# 💼 Smart Job Portal (Full Stack Web Development Project)

## 📌 Project Overview

The **Smart Job Portal** is a full-stack web application that allows users to search and apply for jobs, while administrators can manage job listings and view applications.

This project demonstrates **authentication, CRUD operations, and role-based access control** using PHP and MySQL.

---

## 🚀 Features

### 👤 User Features

* User Registration & Login (Secure Authentication)
* Password Hashing using `password_hash()`
* Search for jobs
* Apply for jobs
* Prevent duplicate applications

### 🧑‍💼 Admin Features

* Admin Login (Role-Based Access)
* Add new job listings
* Edit existing jobs
* Delete jobs
* View all job applications (Candidates list)

---

## 🛠️ Tech Stack

* **Frontend:** HTML, CSS
* **Backend:** PHP
* **Database:** MySQL
* **Server:** XAMPP (Apache)
* **Version Control:** Git & GitHub

---

## 📁 Project Structure

```
ApexTask5/
│
├── admin/
│   ├── admin_dashboard.php
│   ├── add_job.php
│   ├── edit_job.php
│   ├── delete_job.php
│   └── view_applications.php
│
├── auth/
│   ├── login.php
│   ├── register.php
│   └── logout.php
│
├── user/
│   ├── dashboard.php
│   └── apply_job.php
│
├── config/
│   └── db.php
│
├── assets/
│   ├── style.css
│   └── auth.css
│
└── database.sql
```

---

## 🗄️ Database Setup

1. Open **phpMyAdmin**
2. Create a database:

```
job_portal
```

3. Import or run the following SQL:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('user','admin') DEFAULT 'user'
);

CREATE TABLE jobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    company VARCHAR(100),
    location VARCHAR(100),
    description TEXT
);

CREATE TABLE applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    job_id INT,
    applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## ▶️ How to Run the Project

1. Install **XAMPP**

2. Start:

   * Apache
   * MySQL

3. Place project folder inside:

```
C:\xampp\htdocs\
```

4. Open browser:

```
http://localhost/ApexTask5/auth/register.php
```

---

## 🔑 Default Admin Setup

1. Register a normal user
2. Go to phpMyAdmin → `users` table
3. Run:

```sql
UPDATE users SET role='admin' WHERE email='admin@gmail.com';
```

---

## 📸 Screens (Optional - Add Later)

* Login Page
* Register Page
* User Dashboard
* Admin Dashboard
* Applications Page

---

## 🎯 Key Concepts Used

* Session Management
* Password Security (Hashing)
* Role-Based Authorization
* CRUD Operations
* SQL Joins
* Form Validation
* Responsive UI Design

---

## 💬 Future Enhancements

* Resume Upload
* Email Notifications
* Job Filtering by Category
* Admin Analytics Dashboard
* AJAX Live Search

---

## 👩‍💻 Author

**Yogita Bojanki**

---

## ⭐ Acknowledgement

This project was developed as part of a **Full Stack Web Development Internship Task**.
