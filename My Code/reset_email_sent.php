<!DOCTYPE html>
<html>

<head>
    <title>Email Sent</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: -webkit-linear-gradient(left, #7579ff, #b224ef);
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .mail-logo {
            position: absolute;
            top: -50px;
            left: 0;
            font-size: 30px;
            animation: flying-mail 10s infinite linear;
        }

        @keyframes flying-mail {
            0% {
                transform: translate(0, -50px);
            }

            100% {
                transform: translate(calc(100vw + 50px), calc(100vh + 50px));
            }
        }

        .container {
            text-align: center;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
            animation: pulse 2s infinite ease-in-out;
        }

        @keyframes pulse {
            0% {
                background-color: #fff;
            }

            50% {
                background-color: #b2f0ff;
            }

            100% {
                background-color: #fff;
            }
        }

        h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            line-height: 1.5;
            margin-bottom: 40px;
        }

        .back-link {
            font-size: 16px;
            color: blue;
        }

        .back-link:hover {
            color: #6b9aff;
        }


        .logo {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
            border-radius: 50%;
            background-image: linear-gradient(red, yellow);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            color: #fff;
            margin: 0 auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            animation: colorChangeAnimation 0.7s linear infinite;
        }

        @keyframes colorChangeAnimation {
            0% {
                background-image: linear-gradient(to bottom right, blue, purple);
            }

            14.3% {
                background-image: linear-gradient(to right, blue, purple);
            }

            28.5% {
                background-image: linear-gradient(to top right, blue, purple);
            }

            42.8% {
                background-image: linear-gradient(to top, blue, purple);
            }

            57.2% {
                background-image: linear-gradient(to top left, blue, purple);
            }

            71.5% {
                background-image: linear-gradient(to left, blue, purple);
            }

            85.8% {
                background-image: linear-gradient(to bottom left, blue, purple);
            }

            100% {
                background-image: linear-gradient(to bottom, blue, purple);
            }
        }
    </style>
</head>

<body>
    <div class="background"></div>
    <div class="container">
        <div class="logo">✉</div>
        <h1>Email Sent</h1>
        <p>An email to reset your password has been sent to your email address. Please check your inbox.</p>
        <a href="/" class="back-link"><button type="button" class="btn btn-primary">Back to home</button></a>

    </div>

    <script>
        // Function to create and append a mail logo element to the background
        function createMailLogo() {
            var mailLogo = document.createElement('span');
            mailLogo.classList.add('mail-logo');
            mailLogo.innerHTML = '✉️'; // Replace with the emoji or character representing a mail

            mailLogo.style.top = Math.floor(Math.random() * window.innerHeight) + 'px';
            mailLogo.style.left = Math.floor(Math.random() * window.innerWidth) + 'px';
            mailLogo.style.animationDelay = Math.random() * 10 + 's';

            document.querySelector('.background').appendChild(mailLogo);
        }

        // Determine the number of mail logos to create
        var mailLogoCount = Math.ceil(0.7 * (window.innerWidth * window.innerHeight) / (150 * 150)); // Assuming each logo is 150px x 150px

        // Create the mail logos
        for (var i = 0; i < mailLogoCount; i++) {
            createMailLogo();
        }
    </script>
</body>

</html>