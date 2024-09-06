<?php
    for($i=1; $i<=6; $i++)
        $dice[$i] = 0;

    for($i=1; $i<=6000000; $i++)
    {
        $rand = rand(1, 6);
        $dice[$rand] ++;
    }

    for($i=1; $i<=6; $i++)
    {
        echo "$i : $dice[$i]<br>";
    }
?>