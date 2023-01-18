<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');


        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            border: 0;
            outline: 0;
            text-decoration: none;
            list-style: none;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: green;
        }

        .wrapper {
            width: 400px;
            border-radius: 7px;
            background: #fff;
            padding: 1rem;
        }
        .pics{
            width:100%;
            height:210px;

        }
        small{
            display:block;
            color:black;
            cursor:pointer;
            font-size:15px;
            font-weight:400px;
            padding-bottom:20px;

        }
        span{
            color:green;
            font-size:20px;

        }
    </style>
</head>
<body>
    <!-- STYLING HAS TO BE INLINE OR INTERNAL FOR IT TO WORK -->
    <div class="wrapper">
        <h3>National Web Programing Board</h3>
        <img src="../adminimgs/logonew.png" alt=" National Board" class="pics">
        <p>Thanks for registering with us! Below are your details please do well to come with the registration number assigned to you </p>

        <small>Your Regno is :<span>{reg_no}</span></small>
        <small>Firstname :<span>{firstname}<span></small>
        <small>Surname :<span>{surname}<span></small>
        <small>Password :<span>{password}<span></small><br></br>
        <p>wish you so much luck </p>
        
     

    </div>
</body>
</html>