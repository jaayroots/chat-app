<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title id="headerTitle">Loading ...</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Socket.io -->
    <script src="https://cdn.socket.io/4.5.0/socket.io.min.js"
        integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    <style>
        body {
            background: rgb(26, 26, 26);
            color: white;
        }

        .card-body {
            background: rgba(49, 49, 49, 0.569);
        }

        .chat-row {
            margin: 50px;
        }

        .card {
            color: black
        }

        .emojioption {
            font-size: 200%;
        }

        .myChat {
            /* background: #4ef16158; */
            color: rgb(0, 0, 0);
            font-style: italic;
            text-align: right;
            padding-right: 3%;
            font-size: 150%;

        }

        .revChat {
            /* background: rgba(102, 55, 255, 0.324); */
            color: rgb(0, 0, 0);
            font-style: italic;
            text-align: left;
            padding-left: 3%;
            font-size: 150%;
        }

        .messageRev {
            text-align: right;
        }

        .chat-input {
            border: 1px soild lightgray;
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
            padding: 8px 10px;
            color: #fff;
        }

        @import url('https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .waviy {
            position: relative;
            -webkit-box-reflect: below -20px linear-gradient(transparent, rgba(0, 0, 0, .2));
            font-size: 20px;
        }

        .waviy span {
            font-family: 'Alfa Slab One', cursive;
            position: relative;
            display: inline-block;
            color: rgb(0, 0, 0);
            text-transform: uppercase;
            animation: waviy 1.5s infinite;
            animation-delay: calc(.1s * var(--i));

        }

        @keyframes waviy {

            0%,
            20%,
            100% {
                transform: translateY(0)
            }

            20% {
                transform: translateY(-20px)
            }
        }

        .demo {
            text-align: center;
        }

        .rainbow-bg {
            animation: rainbow-bg 1s linear;
            animation-iteration-count: infinite;
        }

        .rainbow {
            animation: rainbow 1s linear;
            animation-iteration-count: infinite;
        }

        @keyframes rainbow-bg {

            100%,
            0% {
                background-color: rgb(255, 0, 0);
            }

            8% {
                background-color: rgb(255, 127, 0);
            }

            16% {
                background-color: rgb(255, 255, 0);
            }

            25% {
                background-color: rgb(127, 255, 0);
            }

            33% {
                background-color: rgb(0, 255, 0);
            }

            41% {
                background-color: rgb(0, 255, 127);
            }

            50% {
                background-color: rgb(0, 255, 255);
            }

            58% {
                background-color: rgb(0, 127, 255);
            }

            66% {
                background-color: rgb(0, 0, 255);
            }

            75% {
                background-color: rgb(127, 0, 255);
            }

            83% {
                background-color: rgb(255, 0, 255);
            }

            91% {
                background-color: rgb(255, 0, 127);
            }
        }

        @keyframes rainbow {

            100%,
            0% {
                color: rgb(255, 0, 0);
            }

            8% {
                color: rgb(255, 127, 0);
            }

            16% {
                color: rgb(255, 255, 0);
            }

            25% {
                color: rgb(127, 255, 0);
            }

            33% {
                color: rgb(0, 255, 0);
            }

            41% {
                color: rgb(0, 255, 127);
            }

            50% {
                color: rgb(0, 255, 255);
            }

            58% {
                color: rgb(0, 127, 255);
            }

            66% {
                color: rgb(0, 0, 255);
            }

            75% {
                color: rgb(127, 0, 255);
            }

            83% {
                color: rgb(255, 0, 255);
            }

            91% {
                color: rgb(255, 0, 127);
            }
        }
    </style>
</head>

<html>
<body>
    <div class="container">
        <br>
        <br>
        <br>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col" align="left">
                        <h3>🧔🏿‍♂️ You’ve gone Incognito Room 🕷</h3>
                    </div>
                    <div class="col" align="right">
                        <h3 id="clock">Loading ..</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="input-group mb-1">
                </div>
                <div class="chat-row">
                    <div class="chat-content">
                    </div>
                    <div class="chat-section">
                        <div class="chat-box">
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="username"></span>
                                </div>
                                <input type="text" class="form-control highlighted" id="keyp"
                                    placeholder="Message" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <body>
                                <div class="waviy" id="typingStatus">
                                    <br>
                                    <span style="--i:1">S</span>
                                    <span style="--i:2">o</span>
                                    <span style="--i:3">m</span>
                                    <span style="--i:4">e</span>
                                    <span style="--i:5">o</span>
                                    <span style="--i:6">n</span>
                                    <span style="--i:7">e</span>
                                    <span style="--i:8">T</span>
                                    <span style="--i:9">y</span>
                                    <span style="--i:10">p</span>
                                    <span style="--i:11">i</span>
                                    <span style="--i:12">n</span>
                                    <span style="--i:13">g</span>
                                    <span style="--i:14">.</span>
                                    <span style="--i:15">.</span>
                                    <span style="--i:16">.</span>
                                    <br>
                                    <br>
                                </div>
                            </body>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text demo rainbow">Emoji Option</span>
                                </div>

                                <div class="row emojioption" id="emojioption">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card-title">
            <div class="col" align="left">
                <h4>🟢 Online 📣</h4>
            </div>
            <ul id="userOnline">
            </ul>
        </div>
    </div>
</body>
<footer>
    <div class="card-header">
        <div class="col" align="Center">
            <br>
            <br>
            <br>
            <h3>💻 Develop By Larave 9 And Socket.io 📡</h3>
            <br>
            <br>
            <br>
        </div>
    </div>
</footer>

</html>

<script>
    const emoji = ['😀', '🤬', '👽', '👾', '🤖', '🕶', '👋', '👌🏻', '‼️', '❤️', '🖤', '💣', '🧨', '🛵', '✈️', '🥓',
        '🍱', '☂️'
    ];
    var myId = '';

    $(document).ready(function() {
        setInterval('updateClock()', 1000);
        emoji.forEach(i => {
            $('#emojioption').append(`<div class="col" onclick="getemoji('${i}')">${i}</div>`)
        });
    });

    $(function() {

        $("#typingStatus").hide();
        let ip_address = '127.0.0.1';
        let socket_port = '3000';
        let socket = io(ip_address + ':' + socket_port);
        var userColor = genColorUser();
        $("#keyp").css("background-color", userColor);

        socket.on('connection');
        socket.on('getUserId', (id) => {
            if (myId == '') {
                myId = id;
                $('#username').html(id)
            }
        });

        socket.emit('callUserId', () => {});
        socket.emit('stayLogin', () => {});

        socket.on('showLogin', (alive) => {
            updateUserOnline(alive);
        })

        socket.on('getdisconnect', (alive) => {
            updateUserOnline(alive);
        })

        $('#keyp').keypress(function(e) {
            let message = $('#keyp').val();
            socket.emit('sendTypingToServer', myId, message.length ? true : false);

            if (e.which == 13 && !e.shiftKet) {
                if ($('#keyp').val().length == 0) {
                    return
                } else {
                    socket.emit('sendChatToServer', message, myId, userColor);
                    $('#keyp').val('');
                    socket.emit('sendTypingToServer', myId, false);
                    return false
                }
            }
        });

        socket.on('sendTypingStatus', (user, typing) => {
            if (typing) {
                if (user != myId) {
                    $("#typingStatus").show();
                } else {
                    $("#typingStatus").hide();
                }
            } else {
                $("#typingStatus").hide();
            }
        })

        socket.on('sendChatToClient', (message, user, colorUser) => {
            let userClass = myId == user ? 'myChat' : 'revChat';
            var dt = new Date();
            var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
            appendRowChat(user, time, userClass, colorUser, message);
        })
    })

    function genColorUser() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        var col = "rgb(" + r + "," + g + "," + b + ",0.324)";
        return col;
    }

    function updateClock() {
        var currentTime = new Date();
        var currentHours = currentTime.getHours();
        var currentMinutes = currentTime.getMinutes();
        var currentSeconds = currentTime.getSeconds();

        // Pad the minutes and seconds with leading zeros, if required
        currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
        currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

        // Choose either "AM" or "PM" as appropriate
        var timeOfDay = (currentHours < 12) ? "AM" : "PM";

        // Convert the hours component to 12-hour format if needed
        currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;

        // Convert an hours component of "0" to "12"
        currentHours = (currentHours == 0) ? 12 : currentHours;

        // Compose the string for display
        var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

        $("#clock").html(currentTimeString);
    }

    function getemoji(emoji) {
        $('#keyp').val($('#keyp').val() + emoji);
    }

    function updateUserOnline(alive) {
        const header = 'Chat Room👋🏻👋🏻';
        $('#headerTitle').html(header + ' (' + alive.length + ')');
        $("#userOnline").empty();
        alive.forEach(userid => {
            $('#userOnline').append(`<li id="${userid}">${userid} ( online )</li>`)
        });
    }

    function appendRowChat(user, time, userClass, colorUser, message) {
        $('.chat-content').append(`
                <div class="card">
                        <div class="card-header" >
                            <div class="row">
                                <div class="col" align="left">
                                    ${user}
                                </div>
                                <div class="col" align="right">
                                    ${time}
                                </div>
                              </div>
                        </div>
                        <div class="container ${userClass}" style="background-color:${colorUser};" ">
                            <div class="">${message}</div>
                        </div>
                    </div>
                    <br>
                `)
    }
</script>
