@extends('layouts.app2')
@section('content')
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>هوش مصنوعی برنا</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        #chat-container {
            max-height: 450px;
            overflow-y: auto;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.05);
            display: none; /* Initially hidden */
        }

        .chat-message {
            background-color: #e0f7fa;
            border-radius: 18px;
            padding: 12px 18px;
            margin: 10px 0;
            font-size: 16px;
            max-width: 80%;
            line-height: 1.5;
            word-wrap: break-word;
            position: relative;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .user-message {
            background-color: #ffc7a2;
            color: white;
            margin-left: auto;
            margin-right: 0;
            text-align: right;
            direction: rtl;
        }

        .ai-message {
            background-color: #f3f3f3;
            margin-left: 0;
            margin-right: auto;
            color: #333;
            text-align: left;
        }

        form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        #user-question {
            width: 80%;
            padding: 12px 18px;
            border-radius: 30px;
            border: 1px solid #ddd;
            font-size: 16px;
            outline: none;
            transition: all 0.3s;
        }

        #user-question:focus {
            border-color: #ffa87e  ;
            /* box-shadow: 0 0 5px rgba(76, 175, 80, 0.5); */
        }

        .submit-button {
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            background-color: #FF5733; 
            color: white;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #e04e28; 
        }

        .typing-indicator {
            font-size: 14px;
            color: #888;
            font-style: italic;
            text-align: center;
        }

        .scroll-to-bottom {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>برناچت</h1>

        <div id="chat-container" class="scroll-to-bottom"></div>

        <form id="chat-form">
            <input type="text" id="user-question" placeholder="سوال خود را وارد کنید..." required>
            <button type="submit" class="submit-button">ارسال</button>
        </form>

        <div class="typing-indicator" id="typing-indicator" style="display: none;">برناچت در حال تایپ...</div>
    </div>

    <script>
        $(document).ready(function () {
            $('#chat-form').on('submit', function (e) {
                e.preventDefault();

                const question = $('#user-question').val();
                const chatContainer = $('#chat-container');

                // Show chat container when a question is asked
                chatContainer.show();

                // Append user question to chat
                chatContainer.append('<div class="chat-message user-message"><strong>شما:</strong> ' + question + '</div>');
                $('#user-question').val('');
                chatContainer.scrollTop(chatContainer[0].scrollHeight);

                // Show typing indicator
                $('#typing-indicator').show();

                $.ajax({
                    url: '/ask-question',
                    method: 'POST',
                    data: {
                        question: question,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        $('#typing-indicator').hide();

                        chatContainer.append('<div class="chat-message ai-message"><strong>هوش مصنوعی:</strong> ' + response.answer + '</div>');
                        chatContainer.scrollTop(chatContainer[0].scrollHeight);
                    },
                    error: function () {
                        $('#typing-indicator').hide();
                        chatContainer.append('<div class="chat-message ai-message"><strong>هوش مصنوعی:</strong> مشکلی پیش آمد. لطفا دوباره تلاش کنید.</div>');
                    }
                });
            });
        });
    </script>

</body>

</html>
@endsection
