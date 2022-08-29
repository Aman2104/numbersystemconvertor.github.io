<?php
    $var1 ="";
    $s ="";
    $e ="";
    $answer ="";
    if(isset($_POST['getval'])){
        $var1=$_POST['getval'];
        $x= (int)$var1;
        $y = $var1- $x;
        $y = round($y, 5);
        
        $s = $_POST['getfrom'];
        $e = $_POST['getto'];
        $resultDec=0;
        $resultDecAct=0;
        $sample=0;
        $floatresult=0;

        if($s<11){
            $i=0;
            while ($x>=1) {
                $resultDec =  $resultDec + ($x%10)*pow($s, $i);
                ++$i;
                $x = $x/10;
            }
            while($resultDec>=1){
                $sample = $sample*10 + ($resultDec%$e);
                $resultDec = $resultDec /$e;
            }
            while($sample>=1){
                $resultDecAct = $resultDecAct*10 + ($sample%10);
                $sample = $sample /10;
            }
            $i=-5;
            $z1=0;
            $y = $y * 100000;
            while($i<=(-1)){
                $floatresult =  $floatresult + ($y %10)*pow($s, $i);
                $y = $y /10;
                
                $i++;
            }
            
            $floatresultAct=0;
            $i=0;
            $a = $floatresult;
            while($i<5){
                $a = $a * $e;
                $floatresultAct = $floatresultAct *10 + (int)$a;
                $a = $a - (int)$a;
                $i++;
            }
            if($floatresultAct>100000){
                $floatresultAct = $floatresultAct/1000000;
            }
            
            else if($floatresultAct>10000){
                $floatresultAct = $floatresultAct/100000;
            }
            else if($floatresultAct>1000){
                $floatresultAct = $floatresultAct/10000;
            }
            else if($floatresultAct>100){
                $floatresultAct = $floatresultAct/1000;
            }
            else if($floatresultAct>10){
                $floatresultAct = $floatresultAct/100;
            }
            else if($floatresultAct>1){
                $floatresultAct = $floatresultAct/10;
            } 
            $answer = $floatresultAct + $resultDecAct;
        }

        
        
    }
    ?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css? <?php echo time(); ?>">
</head>

<body>
    <div class="box">
    <header class="container heading">
        <h1>Number System Convertor</h1>
    </header>

    <div class="container">
        <form action="index.php" method="post">
            <select name="getfrom" class="option" >
                <option value=""> <?php echo ($s!="")?$s:"Enter base of your number";?></option>
                <?php
                for ($i=2; $i <= 10; $i++) { 
                    echo "<option value='$i'> $i</option>";
                }
                ?>
            </select>
            <select name="getto" class="option">
            <option value=""> <?php echo ($e!="")?$e:'Enter base of Output number';?></option>
                <?php
                for ($i=2; $i <= 10; $i++) { 
                    echo "<option value='$i'> $i</option>";
                }
                ?>
            </select>
            <input value="<?= $var1?>" type="text" class="val" name="getval" placeholder="Enter Number">
            <button class="btn">Submit</button>
        </form>
        <div class="output">
            <input type="text" class="answer1" value="<?= $answer?>"  placeholder="Your Result will appear here" >
        </div>
    </div>
</div>
</body>

</html>