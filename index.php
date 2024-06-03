<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=todo", "root", "");

$qeury = $conn->query("SELECT * FROM tasks ORDER BY date desc");
$tasks = $qeury->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "poppins", sans-serif;


        }

        body {
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            color: rgb(103, 116, 131);
            text-align: center;
            font-size: 50px;
            margin-bottom: 15px;
        }

        input {
            background-color: white;
            padding: 20px;
            width: 500px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            outline: none;
            box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
            transition: all .1s ease;
        }

        input:hover {
            transform: translateX(0px);
        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        button {
            /* background-color: rgba(233, 236, 241, 1); */
            background-color: transparent;
            border: none;
            outline: none;
            font-size: 16px;
            padding: 9px 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
            transition: all .1s ease;
            position: relative;
            animation: button 1s ease;

        }

        button::before {
            content: '';
            background-color: #4783c7;
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            border-radius: 50%;
            transform: scale(0);
            transition: all .2s ease;

            box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
         

        }

        input:focus {
            border: 2px solid #4783c7;
            /* margin-right: 5px; */
        }

        button:hover {
            color: white;
            margin-left: 10px;
        }

        button:hover #add {
            transform: rotate(90deg);
        }

        button:hover::before {
            transform: scale(1.5);
        }

        ion-icon {
            transition: all .4s ease;
        }

        .task {
            display: flex;
            align-items: center;
            padding: 20px;
            justify-content: space-between;
            margin: 10px 0px;
            gap: 10px;
            box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
            width: 500px;
            border-radius: 10px;

        }

        .task div {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        #add {
            font-size: 30px;
        }

        
        

        .none {
            display: none;
        }

        @keyframes button {
            0% {
                transform: translateX(-20px);
                opacity: 0;
            }

            100% {
                transform: translateX(0px);
                opacity: 1;
            }
        }

        button:hover {
            color: rgba(233, 236, 241, .7);
        }

        ion-icon {
            transition: all .1s ease;
        }

        .task {
            animation: anime 1s ease;

        }
        .save {
            /* background-color: ; */
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            display: none;
            font-weight: 400;
            /* font-size: 20px; */
            color: black;

            overflow: hidden;
        }

         
        


        @keyframes anime {
            0% {
                transform: translateY(-20px);
                opacity: 0;
            }

            100% {
                transform: translateY(0px);
                opacity: 1;
            }
        
        }
        .task a button:last-of-type::before  {
            background-color: #e5383b;
        }
        .task button:last-of-type::before {
            background-color: #55a630 ;
            z-index: 0;
        }
        .save::before {
            display: none;
        }
        .save:hover {
            color: #55a630;
            border: 1px solid #55a630   ;
        }
    </style>
    <title>TODO</title>
</head>

<body>
   



    <h1>To Do List</h1>
    <form action="add.php" method="POST">
        <input type="text" name="taskvalue" placeholder="Enter Your Today Task" id="input">
        <button ><ion-icon name="add-outline" id="add"></ion-icon></button>
    </form>
    <div class="container">
        <?php
        foreach ($tasks as $task) {
            echo "<div class='task'>";
            echo "<span class='main-task'>" . $task["name"] . "</span>";
            echo "<div class='links'>";
            echo "<button class='modify'><ion-icon name='create-outline' ></ion-icon></button>";
            echo "<a href='delete.php?id=" . $task["id"] . "' class='rm'><button><ion-icon name='close-outline'></ion-icon></button></a>";
            echo "<button class='save' data-id= '".$task["id"]."'>Save<ion-icon name='checkmark-done-outline'></ion-icon></button>";
            echo "</div>";
            
            echo "</div>";
        }
        ?>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>

</html>