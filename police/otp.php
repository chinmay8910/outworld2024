<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('./bgimage.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
        .container {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .form-group {
            margin-bottom: 15px;
        }
        header {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #fff;
            width: 99%;
            margin: 2px;
            height: 150px;
            border-radius: 15px;
        }
        header img {
            height: 150px;
            width: auto;
            margin-left: 15px;
        }
        header p {
            margin-top: 10px;
            margin-left: 500px;
            color: black;
        }
    </style>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>
<body>
    <header>
        <img name="logo" id="logo" src="logo.jpg">  
    </header>
    <div class="container">
        <h2>OTP Verification</h2>
        <form id="otp-form">
            <div class="form-group">
                <label for="otp">Enter OTP:</label>
                <input type="text" id="otp" name="otp" required>
            </div>
            <input type="submit" value="Verify">
        </form>
    </div>

    <script>
        document.getElementById('otp-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const otp = document.getElementById('otp').value;

            fetch('verify_otp.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ otp: otp })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('OTP verified successfully!');
                } else {
                    alert('Invalid OTP. Please try again.');
                }
            })
            .catch(error => console.error('Error:', error));
        });

        function sendOTP(email) {
            Email.send({
                Host: "smtp.yourmailserver.com",
                Username: "rohitshinde70551@gmail.com",
                Password: "Rohit@2004",
                To: email,
                From: "rohitshinde70551@gmail.com",
                Subject: "Your OTP for verification",
                Body: "Your OTP code is: 1234", // Example OTP code, should be generated dynamically
            }).then(
                message => alert('OTP sent successfully')
            );
        }

        // Fetch the user's email and send OTP when the page loads
        window.onload = function() {
            fetch('fetch_email.php')
                .then(response => response.json())
                .then(data => {
                    if (data.email) {
                        sendOTP(data.email);
                    } else {
                        alert('Failed to fetch email.');
                    }
                })
                .catch(error => console.error('Error:', error));
        };
    </script>
</body>
</html>
