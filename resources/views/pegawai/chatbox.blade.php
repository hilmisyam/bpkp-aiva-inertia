<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Interface</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .chat-container {
            height: 80vh;
            overflow-y: scroll;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .chat-input {
            background-color: #d1d1d1;
            border: none;
            border-radius: 10px;
            padding: 10px;
            width: 100%;
        }
        .btn-send {
            background-color: #2e3192;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
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
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-between">
        <img src="/logo.png" alt="BPKP Logo" width="120">
        <div>
            <span class="fw-bold">CHAT</span>
        </div>
        <div>
            <i class="bi bi-person-circle" style="font-size: 24px;"></i>
        </div>
    </div>

    <div class="chat-container mt-4">
        <div class="text-center">
            <button class="suggestion-btn">Bagaimana prosedur mengajukan cuti?</button>
            <button class="suggestion-btn">Berapa sisa cuti yang saya miliki?</button>
            <button class="suggestion-btn">Berapa target KPI saya?</button>
        </div>
    </div>

    <div class="mt-3 d-flex">
        <input type="text" class="chat-input" placeholder="Type your message...">
        <button class="btn-send ms-2">Send</button>
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
