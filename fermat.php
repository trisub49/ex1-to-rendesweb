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
    
    echo 'Összesen '.countPrimes(1000000).'db találat.';

    function countPrimes($max) {
      $counter = 0;
      $primes = array();
      $maxPrime = 0;
      for($i = 1; $i < $max; $i ++) {
        if(gmp_nextprime($i) <= $max) {
          $i = gmp_nextprime($i);
          array_push($primes, $i);
          $maxPrime = $i;
        } else $i = $max;
      }
      for($a = 0; $a < count($primes); $a ++) {
        for($b = $a; $b < count($primes); $b ++) {
          $sum = floatval(pow($primes[$a], 3) + pow($primes[$b], 3));
          $c = floatval(pow($sum, 1/3));
          // echo $sum.' - '.$c.'<br>';
          if($sum > pow($maxPrime, 3)) {
            $a = count($primes);
            $b = count($primes);
          }
          if(floor($c) == $c && in_array($c, $primes)) {
            $counter ++;
          }
        }
      }
      return $counter;
    }
    ?>
</body>
</html>