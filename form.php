<head>
    <!-- Hello -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="logic.js"></script>
    <title>Document</title>
</head>
<body onload="removeDupes();checkCompatability();">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rolecall";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$skill=$_REQUEST['skill'];
if($skill!=" "){
$sql = "SELECT * FROM personal_analysis WHERE Skills LIKE '%$skill%' OR Program LIKE '%$skill%'";
$result = $conn->query($sql);
}else{
  $result=null;
}
if ($result->num_rows > 0) {
  // output data of each row
  $i=0;
  while($row = $result->fetch_assoc()) {
    $i++;
    echo "<div class='employee' id='e$i' onclick='select(this.id)'>
    <section>
        <img src='avatar.png' alt='Avatar'>
        <h1 class='name'>" . $row["Ename"] ."</h1>
    </section>
    <section class='employee-content'>
        <div class='skills'>
            <h1>Skills</h1>";

    $str_arr = explode (",", $row["Skills"]);
    $str_arr2 = explode (",", $row["slevel"]); 
    $str_arr3 = explode (",", $row["Program"]);
    $str_arr4 = explode (",", $row["plevel"]); 
    foreach($str_arr as $level){
    echo "<h2 class='skill-content'> ".$level."</h2>";
    }
    echo  "</div>
    <div class='sLevel'>
    <h1>Level</h1>";
    foreach($str_arr2 as $level){
      echo "<h2 class='skill-content'> ".$level."</h2>";
    }

    
    echo "</div>
    <div class='Programs'>
    <h1>Programs</h1>";
    foreach($str_arr3 as $level){
      echo "<h2 class='skill-content'> ".$level."</h2>";
      }
      echo  "</div>";
      echo "<div>
      <h1>Level</h1>";
      foreach($str_arr4 as $level){
        echo "<h2 class='skill-content'> ".$level."</h2>";
      }

  echo "</div>
    <div class='personality'>
    <div class='personality-tab'>
        <h2 class='personality-content'>Colour</h2>
        <h3 class='personality-content'>". $row['Colour'] ."</h3>
        <img class='personality-content' src='check.png' alt='Option'>
    </div>
    <div class='personality-tab'>
        <h2 class='personality-content'>Brigs</h2>
        <h3 class='personality-content'>". $row['MBTI'] ."</h3>
        <img class='personality-content' src='check.png' alt='Option'>
    </div>
    <div class='personality-tab'>
        <h2 class='personality-content'>Work</h2>
        <h3 class='personality-content'>". $row['Work'] ."</h3>
    </div>
</div>
</section>
</div>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</body>