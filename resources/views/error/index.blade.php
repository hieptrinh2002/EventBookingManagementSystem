<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error Page</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=K2D&display=swap');



        *,*:before,*:after{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        ::selection{
            background-color: #FFE7CE;
            color: #FF0060;
        }
        body{
            background: linear-gradient(90deg,#ff0030,#FF0060);
            min-height: 100vh;
            display: grid;
            place-content: center;
        }
        .container{
            height: 90vh;
            position: relative;
            display: flex;
            text-align: center;
            flex-direction: column;
            justify-content: center;
            gap: 1rem;
            color: #FFE7CE;
            font-family: 'K2D', sans-serif;
            line-height: 1.2;
            border: 8px solid #F6FA70;
            overflow: hidden;
            border-top: transparent;
            border-bottom: transparent;
            border-radius: 6px;
            padding: 4rem 10px;
            margin: .5rem;
            box-shadow: inset 0 0 10px #F6FA70,
            0 0 5px #F6FA70;
        }
        .container h4{
            font-size: 20px;
        }
        .container h1{
            font-size: 120px;
        }
        .container h5{
            font-size: 22px;
        }
        .container p{
            font-size: 15px;
        }
        .container p a{
            color: #F6FA70;

        }
        .container .bubble{
            position: absolute;
            width: 8rem;
            height: 8rem;
            border: 1px solid #FFE7CE;
            border-radius: 50%;
            filter: blur(2px);
            opacity: .25;
            box-shadow: inset 0 0 100px #F6FA70,
            0 0 30px #FFE7CE;
            animation: move 10s alternate infinite;
        }
        @media screen and (min-width: 700px)  {
            .container .bubble{
                position: absolute;
                width: 200px;
                height: 200px;
                border: 1px solid #FFE7CE;
                border-radius: 50%;
                box-shadow: inset 0 0 100px #F6FA70,
                0 0 30px #f48105,
                0 0 20px #FFE7CE;
                animation: move 10s alternate infinite;
            }
        }
        .container .bubble:nth-of-type(1){
            top: .7rem;
            left: 5rem;
        }
        .container .bubble:nth-of-type(2){
            bottom: 0;
            left: 1rem;
            animation: move 15s alternate infinite;
        }
        .container .bubble:nth-of-type(3){
            bottom: 1rem;
            right: 3rem;
            animation: move 30s alternate infinite;
        }
        .container .bubble:nth-of-type(4){
            top: 5rem;
            right: 2rem;
            animation: move 20s alternate infinite;
        }

        @keyframes move{
            0%{
                transform: translate(0,0);
            }
            25%{
                transform: translate(1rem,3rem);
            }
            50%{
                transform: translate(-3rem, -1rem);
            }
            100%{
                transform: translate(.5rem, 2rem);
            }
        }
    </style>

</head>
<body>
<div class="container">
    <h4>NicoHDL</h4>
    <h1>500</h1>
    <h5>There are something wrong!!!
    </h5>
    <p>Visit the <a href="#">home page</a> or <a href="#">contact me</a></p>
    <span class="bubble"></span>
    <span class="bubble"></span>
    <span class="bubble"></span>
    <span class="bubble"></span>
</div>
</body>
</html>
