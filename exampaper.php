<?php
        include 'connection.php';



$sql = "SELECT *  FROM englishquestionstable";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

      while($row = $result->fetch_assoc()) {

      $questionnum=$row["originalnum"];
      $question=$row["equestion"];
      $option1=$row["eoption1"];
      $option2=$row["eoption2"] ;
      $option3=$row["eoption3"];
      $option4=$row["eoption4"];


      $option11=str_replace(' ', '', $option1);
      $option22=str_replace(' ', '', $option2);
      $option33=str_replace(' ', '', $option3);
      $option44=str_replace(' ', '', $option4);


        if ($questionnum>=0) {
          $lala="lala";

    $button= $lala."button".$row["originalnum"];
   $name=$lala.$row["originalnum"];
    echo "<form action='exampaper.php' method='post'>";
   echo  $questionnum.'.'."\"".$question."\""."<br>";
 echo  "<input type='radio' name=$name value=$option11>" . $option1."<br>";
 echo  "<input type='radio' name=$name value=$option22>" . $option2."<br>";
 echo  "<input type='radio' name=$name value=$option33>" . $option3."<br>";
echo   "<input type='radio' name=$name value=$option44>" . $option4."<br>";
echo   "<input type='submit' name=$button value='submit'>"."<br>"."<br>";
echo "</form>";
} //echo question paper




 }

      } // If no. of rows ends



     if ($_SERVER['REQUEST_METHOD'] === 'POST')

      {


       $buttonsubmit="lalabutton";
       $namesubmit="lala";
 $j=1;

 while($j <= 29 )
      {



    $buttonactualsubmit=$buttonsubmit.$j;
    $nameactualsubmit=$namesubmit.$j;

     if(  isset($_POST["$buttonactualsubmit"]) && isset($_POST["$nameactualsubmit"]) )
     {


       $correctoption=$_POST["$nameactualsubmit"];


           $sql = "UPDATE englishquestionstable SET user_answer='$correctoption' WHERE originalnum=$j";


    $result = $conn->query($sql);
     }    // if isset button actual
       $j++;
      }  // while loop
      }  //dollar server ends 



       ?>