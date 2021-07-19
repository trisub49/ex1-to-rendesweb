<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fermat Utolsó Teóriája</title>
</head>
<body>

  <?php
    ini_set('max_execution_time', '0');

    countCases(1000);
    
    function countCases($max) {
      $primes = array();
      $sum = 0;

      for($i = 1; $i < $max; $i ++) {
        if(gmp_nextprime($i) <= $max) {
          if(gmp_nextprime($i - 1) == $i) {
            array_push($primes, gmp_intval($i));
          } else {
            $i = gmp_nextprime($i);
            array_push($primes, gmp_intval($i));
          }
          $maxPrime = $i;
        } else $i = $max; 
      }

      for($i = 0; $i < count($primes); $i ++) {
        $sum += F($primes[$i]);
      }

      echo 'Összesen '.$sum.' lehetőség van '.$max.' (p) alatti prímszámok esetén.';
    }

    function F($p) {
      $counter = 0;
      for($a = 1; $a < $p; $a ++) {
        for($b = 1; $b < $p; $b ++) {
          for($c = 1; $c < $p; $c ++) {
            if((pow($a, 3) + pow($b, 3)) % $p == pow($c, 3) % $p) {
              $counter ++;
            }
          } 
        }
      }
      // echo 'F('.$p.')=+ '.$counter.'<br>';
      return $counter;
    }
  ?>
</body>
</html>