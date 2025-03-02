<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Interface</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .chat-container {
            height: 60vh;
            overflow-y: scroll;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .chat-input {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 20px;
            padding: 10px 20px;
            width: 100%;
            margin-right: 10px;
        }
        .btn-send {
            background-color: #2e3192;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
        }
        .suggestion-btn {
            border: 1px solid #2e3192;
            border-radius: 20px;
            padding: 8px 16px;
            margin: 5px;
            color: #2e3192;
            background: none;
            cursor: pointer;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 120px;
        }
        .header span {
            font-size: 18px;
            font-weight: bold;
        }
        .header i {
            font-size: 24px;
            color: #2e3192;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="header">
        <img src="/logo.png" alt="BPKP Logo">
        <span>CHAT</span>
        <i class="bi bi-person-circle"></i>
    </div>

    <div class="chat-container">
        <div class="text-center">
            <button class="suggestion-btn">Bagaimana prosedur mengajukan cuti?</button>
            <button class="suggestion-btn">Berapa sisa cuti yang saya miliki?</button>
            <button class="suggestion-btn">Berapa target KPI saya?</button>
        </div>
    </div>

    <div class="d-flex">
        <input type="text" class="chat-input" placeholder="Type your message...">
        <button class="btn-send">Send</button>
    </div>
</div>

<script>
    document.querySelectorAll('.suggestion-btn').forEach(button => {
        button.onclick = () => {
            document.querySelector('.chat-input').value = button.innerText;
        };
    });
</script>
</body>
</html>
