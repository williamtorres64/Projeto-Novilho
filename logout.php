<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Logoff</title>
    <meta http-equiv="refresh" content="3; URL='index.php'">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #8b0000, #d32f2f);
            color: white;
            text-align: center;
            padding-top: 15%;
        }
        .message-box {
            background-color: rgba(0, 0, 0, 0.4);
            display: inline-block;
            padding: 30px 50px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
        .loader {
            border: 5px solid #f3f3f3;
            border-top: 5px solid #ffffff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin: 20px auto;
            animation: spin 2s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="message-box">
        <h1>Saindo da sessão...</h1>
        <p>Você será redirecionado em instantes.</p>
        <div class="loader"></div>
    </div>
</body>
</html>

