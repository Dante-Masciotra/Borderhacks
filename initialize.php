<html>
    <head>
    <link rel="stylesheet" href="style.css">

        <style>
            body{
                text-align: center;
                background-color: #313131;
            }
            .Title{
                font-size: 25px;
                padding: 5px 5px;
                text-align: center;
            }
            .Text{
                font-size: 20px;
                padding: 20px 10px;
                text-align: center;  
            }
            .buttons{
                font-family: "Trebuchet MS", Helvetica, sans-serif;
                color: #8c7b88;
                background-color: #383838;
                padding: 7px 10px;
                font-size: 15px;
                width: 100%;
                margin-bottom: 1%;
                cursor: pointer;
                display: block;
                text-align: center; /*centers text in box*/
                text-decoration: none;
            }
            .centerButtons{
                width: 5%;
                justify-content: center;
                display: inline-block;
                margin-bottom: 1%;
            }
            input{
                font-family: "Trebuchet MS", Helvetica, sans-serif;
                margin-bottom: 2.5%;
            }
            .inputs{
                display: inline-flex;
                margin-top:3vw;
            }
            #Spacer{
                width: 10%;
            }
            
            .back{
                width:5%;
                position: absolute;
                right: 5%;
                top: 5vw;

            }
            .back *{
                max-width: 100%;
                height:min-content;
            }

        </style>
    </head>
    <body>
    <div class="title">
    <h1>ADD SKILL OR PROJECT</h1>
    <a href="\.." class="back"><img src="back button.png" alt=""></a>  
  </div>
        <div class=Text>
            Please add Skills on the right and add Programs on the left
        </div>
        <form class = 'centerForms' action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
            <div class="inputs">
            <div id="Skill"> 
            <label for="Skill" >Skill:</label><br>
            <input type="text" id="Skill" name="Skill">
            </div>
            <div id="Spacer"></div>
            <div id="Program">
            <label for="program">Program:</label><br>
            <input type="text" id="program" name="program">
            </div>
            </div>
                <br>
            <input class="buttons centerButtons" type="submit" value="Submit">
        </form>


    </body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rolecall";


$Skills='';
$Program='';


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['Skill'])) {
    $Skills = $_POST['Skill'];
}

if (isset($_POST['program'])) {
    $Program = $_POST['program'];
}

$Skill_info = "INSERT INTO skills (`ID`, `Skill`) VALUES (0,'$Skills')"; 
$Program_info = "INSERT INTO program (`ID`, `Program`) VALUES (0,'$Program')"; 

if($Skills!=''){
if ($conn->query($Skill_info) === TRUE) {
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
if($Program!=''){
  if ($conn->query($Program_info) === TRUE) {
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
  
  $conn->close();
?>