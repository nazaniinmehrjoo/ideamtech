@extends('layouts.app2')
@section('content')
    <!DOCTYPE html>
    <html lang="fa">
    <!DOCTYPE html>
    <html lang="fa">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>برناگستر برنا</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <style>
            body {
                background-color: #1e1e1e;
                font-family: sans-serif;
            }

            .container {
                max-width: 800px;
                margin: 120px auto;
                padding: 30px;
                border-radius: 20px;
                overflow: hidden;
                height: 700px;
                background: linear-gradient(135deg, rgba(40, 40, 40, 0.57), rgba(25, 25, 25, 0.45));
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.08);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            }

            h1 {
                text-align: center;
                font-size: 24px;
                margin-bottom: 20px;
                color: #f0f0f0 !important;
            }

            #chat-container {
                max-height: 100%;
                overflow-y: auto;
                padding: 15px;
                margin-bottom: 20px;
                border-radius: 10px;
                display: none;
                height: 65%;
                scrollbar-width: thin;
                direction: rtl;
                margin-top: 9%;
            }

            .chat-message {
                border-radius: 18px;
                padding: 12px 18px;
                margin: 10px 0;
                font-size: 15px;
                max-width: 70%;
                line-height: 1.6;
                word-wrap: break-word;
                position: relative;
            }

            .user-message {
                background-color: #f05928ba;
                color: white;
                margin-left: auto;
                margin-right: 0;
                text-align: right;
                direction: rtl;
                border-bottom-right-radius: 4px;
            }

            body.light-mode .user-message {
                background-color: #ffc7a2;
            }

            .ai-message {
                background-color: #333333b5;
                color: #fff;
                margin-right: auto;
                margin-left: 0;
                text-align: right;
                direction: rtl;
                border-bottom-left-radius: 4px;
            }

            .timestamp {
                font-size: 11px;
                color: #fff;
                margin-top: 5px;
                display: inline-block;
                margin-left: 8px;
            }

            .copy-button {
                background-color: transparent;
                color: #fff;
                font-size: 11px;
                border-radius: 10px;
                margin-top: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .copy-button:hover {
                background-color: #444;
            }

            form {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                max-width: 730px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 30px;
                background-color: transparent;
                padding: 6px 10px;
                margin: 0 auto;
                transition: all 0.3s ease;
            }

            .form-fixed {
                position: fixed;
                bottom: 6%;
                left: 50%;
                transform: translateX(-50%);
                z-index: 999;
            }

            #user-question {
                width: 100%;
                padding: 12px;
                border: none;
                outline: none;
                background-color: transparent;
                color: #fff;
                font-size: 14px;
                text-align: right;
                direction: rtl;
            }

            #user-question:focus {
                outline: none;
                border: none;
                box-shadow: none;
                background-color: transparent;
            }

            #user-question::placeholder {
                color: #f0f0f0;
            }

            .submit-button {
                padding: 7px 15px;
                font-size: 15px;
                border: none;
                color: #333;
                border-radius: 30px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                margin-right: 5px;
                background: #f0f0f0;
            }

            .submit-button:disabled {
                opacity: 0.5;
                cursor: not-allowed;
            }

            .typing-indicator {
                font-size: 14px;
                color: #888;
                font-style: italic;
                text-align: center;
            }

            .typing-indicator {
                font-size: 14px;
                color: #888;
                font-style: italic;
                text-align: center;
            }

            .chatAlert {
                top: 654px;
            }

            .questionBox {
                margin-top: 220px;
                padding: 34px;
                border-radius: 18px;
                height: 200px;
            }
        </style>
    </head>

    <body>

        <body>


            <div class="container">
                <h1>برناچت</h1>

                <div id="chat-container" class="scroll-to-bottom"></div>
                <div id="chat-container" class="scroll-to-bottom"></div>

                <div class="questionBox">
                    <div class="chatAlert" id="chatAlert">
                        <h1>چطور می‌تونم کمکتون کنم؟</h1>
                    </div>
                    <form id="chat-form">
                        <input type="text" id="user-question" placeholder="سوال خود را وارد کنید..." required>
                        <button type="submit" class="submit-button" disabled><i class="fa-solid fa-arrow-up"></i></button>
                    </form>
                </div>

                <div class="typing-indicator" id="typing-indicator" style="display: none;">برناچت در حال تایپ...</div>
            </div>
            <script>
                let formFixed = false;

                $('#user-question').on('input', function () {
                    $('.submit-button').prop('disabled', $(this).val().trim() === '');
                });

                function getTimeNow() {
                    const now = new Date();
                    return now.getHours() + ':' + String(now.getMinutes()).padStart(2, '0');
                }

                function typeWriter(text, targetElement, callback) {
                    let i = 0;
                    const speed = 15;
                    function typing() {
                        if (i < text.length) {
                            targetElement.append(text.charAt(i));
                            i++;
                            setTimeout(typing, speed);
                        } else {
                            if (callback) callback();
                        }
                    }
                    typing();
                }

                function createMessage(message, isUser = false) {
                    const time = getTimeNow();
                    const messageDiv = $('<div class="chat-message ' + (isUser ? 'user-message' : 'ai-message') + '"></div>');
                    const text = $('<div></div>');
                    const timestamp = $('<span class="timestamp">' + time + '</span>');

                    if (isUser) {
                        text.text(message);
                        messageDiv.append(text).append(timestamp);
                        $('#chat-container').append(messageDiv);
                    } else {
                        text.text(message);
                        const copyButton = $('<button class="copy-button"><i class="fa-regular fa-clone"></i></button>');

                        copyButton.on('click', function () {
                            navigator.clipboard.writeText(text.text()).then(() => {
                                copyButton.html(`<i class="fa-regular fa-check"></i>`);
                                setTimeout(() => copyButton.html(`<i class="fa-regular fa-clone"></i>`), 1500);
                            }).catch(() => {
                                copyButton.text('خطا!');
                            });
                        });

                        messageDiv.append(text).append(timestamp).append(copyButton);
                        $('#chat-container').append(messageDiv.hide());
                        messageDiv.fadeIn(300);

                        text.text('');
                        typeWriter(message, text);
                    }

                    $('#chat-container').scrollTop($('#chat-container')[0].scrollHeight);
                }

                $('#chat-form').on('submit', function (e) {
                    e.preventDefault();

                    const question = $('#user-question').val().trim();
                    if (question === '') return;

                    $('#chatAlert').fadeOut();

                    if (!formFixed) {
                        $('#chat-form').addClass('form-fixed');
                        formFixed = true;
                    }

                    $('#chat-container').show();
                    createMessage(question, true);
                    $('#user-question').val('');
                    $('.submit-button').prop('disabled', true);
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
                            createMessage(response.answer, false);
                        },
                        error: function () {
                            $('#typing-indicator').hide();
                            createMessage('مشکلی پیش آمد. لطفاً دوباره تلاش کنید.', false);
                        }
                    });
                });
            </script>

        </body>
    </body>

    </html>

    </html>
@endsection