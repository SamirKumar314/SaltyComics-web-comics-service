# SaltyComics 🎭

SaltyComics is a PHP-based web application that fetches and displays daily XKCD comics in a clean, modern Bootstrap interface. It allows users to subscribe with their email to receive regular comic updates and also provides an easy unsubscribe mechanism.

---

## 🚀 Features

- 📥 **Email Subscription**: Users can subscribe with their email to receive the latest comics from [xkcd.com](https://xkcd.com/).
- 📤 **Unsubscribe Feature**: Users can unsubscribe using a secure 6-digit verification code.
- 🎞️ **Carousel**: Homepage displays the 3 latest XKCD comics in a Bootstrap carousel.
- 🖼️ **Comic Gallery**: A 3x3 grid of comic cards with images, alt-text, and view options.
- 🛠️ **Email Verification**: Uses a custom 6-digit code system for verification.
- 📡 **Cron Job Ready**: Backend PHP setup to automate comic email delivery (Comic fetcher).
- 🧑‍💻 **Responsive Design**: Clean UI built using Bootstrap 5.
- 🗂️ **MySQL Integration**: Stores subscriber emails securely using MySQLi.

---

## 🖼️ Some Glimpses

### 1. Homepage
- Comic carousel
![Carousel](https://drive.google.com/uc?export=view&id=1ocEHV48Iqw66QyuOvbYQKZYQ1RgzfAHf)
- Comic cards
![Cards](https://drive.google.com/uc?export=view&id=1ctBP48YLir9YaWH7w6Z-u11W4p3sxJHh)
- Comic modal
![Modal](https://drive.google.com/uc?export=view&id=18UBqQ9RxFiigT5Ky7g378X8sZNIDmwFK)

### 2. Sign-up page
![Signup](https://drive.google.com/uc?export=view&id=14fZg8OJKXhHWXKSdtoF6xeOHwkOD08nV)

### 3. Unsubscribe page
![Unsub](https://drive.google.com/uc?export=view&id=1H8o4EOFoJGtEb5mpjeatNkvEiEsthvv5)

### 4. Comic email
![Comic](https://drive.google.com/uc?export=view&id=1GZVkHiJFAYtMLN1MiM5PH27_RPV9ZDqa)

---

## 📦 Libraries & Tools Used

- PHP
- MySQL Database(using MySQLi)
- HTML, Bootstrap 5(CSS and JS library)
- XAMPP(PHP environment)
- Mailpit or SMTP for email delivery

---

## ⚙️ Setup Instructions

### 1. 🧱 Prerequisites
- XAMPP/LAMP/WAMP for local testing(PHP >= 7.4)
- Mail server like Mailpit or real SMTP for actual emails.

### 2. 🛠️ Installation
```bash
git clone https://github.com/SamirKumar314/SaltyComics-web-comics-service.git
cd SaltyComics
```

### 3. ⚙️ Configure Database
- Create your database schema.
- Update db/config.php with your database credentials.
```php
$host = 'localhost';
$db = 'comic_subscription'; //database name
$user = 'root';             //default username for mysql
$pass = '';
```

### 4. 📧 Email Setup
- To send emails, use mailpit for local testing, or send real emails via SMTP.
- Instructions for configuring SMTP is [here](https://www.geeksforgeeks.org/php/how-to-configure-xampp-to-send-mail-from-localhost-using-php/).

### 5. 📆 Scheduled Tasks
1. **For Linux system**: To set the cron job to run daily.
- Open your crontab editor, and add the following line.
```bash
0 10 * * * /usr/bin/php /path/to/cron.php
```
2. **For Windows**:
- Open task scheduler.
- Click `Create Basic Task`, and give it a name.
- Set the time.
- Choose `Start a program`. Browse and select `run_setup_cron.bat`.
- Finish and save.

---

## 📎 Data Source
All comic content is extracted from the public API provided by [xkcd.com](https://xkcd.com/).
**Comic API:**
`https://xkcd.com/info.0.json`
(e.g., `https://xkcd.com/614/info.0.json` for comic #614)

---

## 📄 License
This project is for educational purposes only. All comic content belongs to [xkcd.com](https://xkcd.com/).