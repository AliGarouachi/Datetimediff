<script type="text/javascript">
  function testdateformat(datetimestring) {
    var valid = false;
    var datetimearray=datetimestring.split(" ",2);
    var datestring=datetimearray[0];
    var datearray=datestring.split("-",3);
    var Y=datearray[0];
    var m=datearray[1];
    var d=datearray[2];
    var timestring=datetimearray[1];
    var timearray=timestring.split(':',3);
    var H=timearray[0];
    var i=timearray[1];
    var s=timearray[2];
    var numbers = /^[0-9]+$/;
    if(!Y.match(numbers))
    {
      alert("invalid year");
      valid=false;
    }
    else if((!m.match(numbers))||(parseInt(m)>12)||(parseInt(m)<1))
    {
      alert("invalid month");
      valid=false;
    }

    else if((!d.match(numbers))||(parseInt(d)>31)||(parseInt(d)<1))
    {
      alert("invalid day");
      valid=false;
    }

    else if((!H.match(numbers))||(parseInt(H)>23)||(parseInt(H)<0))
    {
      alert("invalid hours");
      valid=false;
    }

    else if((!i.match(numbers))||(parseInt(i)>59)||(parseInt(i)<0))
    {
      alert("invalid minute");
      valid=false;
    }

    else if((!s.match(numbers))||(parseInt(s)>59)||(parseInt(s)<0))
    {
      alert("invalid seconds");
      valid=false;
    }
    else {
      console.log('minute seconds!');
      valid=true;
    }
    if(valid)
      alert('données valide');
    document.getElementById('sub').disabled = !valid;
  }
</script>
<?php
if(empty($_POST))
 {
   ?>
   <form action=" <?php $_SERVER['PHP_SELF'] ?>" method="post">
     <input #date1 required type="text" name="date1" value="" placeholder="Entrer la première date" onchange="testdateformat(date1.value)">
     <input #date2 required type="text" name="date2" value="" placeholder="Entrer la deuxième date" onchange="testdateformat(date2.value)">
     <button id='sub' type="submit" name="button">calculer diff en minute</button>
   </form>
   <?php
   }
   else {

      $date1 = $_POST["date1"];
      $date2 = $_POST["date2"];
      $date1InTimestamp = strtotime($date1);
      $date2InTimestamp = strtotime($date2);
      $differenceInTimestampBetweenDate1andDate2 = abs($date1InTimestamp - $date2InTimestamp);
      $differenceBetweenDate1andDate2InMinute=(float)$differenceInTimestampBetweenDate1andDate2/60;
      echo "avec la virgule des secondes ".$differenceBetweenDate1andDate2InMinute;
      echo "<br>";
      echo "avec arrondi :". round($differenceBetweenDate1andDate2InMinute/60);
      echo "<br>";
      echo "avec en ignorant après la virgule :". floor($differenceBetweenDate1andDate2InMinute/60);

   }
    ?>
