<?php
$not=FALSE;
$ip="255.155.155.133";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $ip=$_POST['ip4'];
    $ch="$ip.";
$sum='';
$a=[];
$binValue='';
function binary_IPv4($n,$dot,$binValue)
{
   
    $a = [ 128, 64, 32, 16, 8, 4, 2, 1];
    $b = [ 0, 0, 0, 0, 0, 0, 0, 0];
    $size = 8;
    for ($i = 0; $i < $size; $i++)
    {
        if ($n > $a[$i] || $n == $a[$i])
        {
            $n -= $a[$i];
            $b[$i] = 1;
        }
    }
    for ($i = 0; $i < $size; $i++)
    $binValue.=$b[$i];

    if($dot<=3)
    {
        $binValue.=" ";
        $binValue.=".";
        $binValue.=" ";
    }

    return $binValue;

    
}


// echo "<br>Bianry form IPv4 address :> ";
$c=0;
for ($j = 0; $j < strlen($ch); $j++)
{
    $c++;
    for ($i = $j; $ch[$i] != '.'; $i++)
    {
        $sum.=$ch[$i];
    }
    $binValue=binary_IPv4($sum,$c,$binValue);
    // echo $binValue;
    
    array_push($a,$sum);
    $j = $i;
    $sum='';
}

// echo "<br>";

$aip=$a[0];
$bip=$a[1];
$cip=$a[2];
$dip=$a[3];

    if($aip>=0 && $aip<=127)
	{
		$class="This is Class A IP";
		$subnet="255.0.0.0";
		$netId="$aip";
		$hostId="$bip.$cip.$dip";
	}
    else if($aip>=128 && $aip<=191)
	{
		$class="This is Class B IP";
		$subnet="255.255.0.0";
		$netId="$aip.$bip";
		$hostId="$cip.$dip";
	}
    else if($aip>=192 && $aip<=223)
	{
		$class="This is Class C IP";
		$subnet="255.255.255.0 ";
		$netId="$aip.$bip.$cip";
		$hostId="$dip";
	}
    else if($aip>=224 && $aip<=239)
	{
		$class="This is Class D IP";
	}
	else if($aip>=240 && $aip<=255)
	{
		$class="This is Class E IP";
	}
    $not=TRUE;
}

?> 

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>IPv4 | SC</title>
</head>

<body>
    <?php  include 'navbar.php';?>
    <?php
    if($not==TRUE)
    {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>IPv4 Details is!</strong> <br>Bianry form IPv4 address :> '.$binValue.' <br> '.$class.' <br> Subnet Musk is : '. $subnet.' <br> Net Id Is : '.$netId.' <br> Host id is '.$hostId.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }


    ?>



    <div class="container my-5">
        <form action="index.php" method="post">
            <div class="mb-3">
                <label class="form-label">Enter Ipv-4 Address </label>
                <input type="text" name="ip4" class="form-control" required>
                <div class="form-text">We'll never use Ipv-6.</div>
            </div>
            <div class="mb-3">
                <input type="submit" value="Submit" >
            </div>

        </form>


    </div>


    <?php  include 'footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html>