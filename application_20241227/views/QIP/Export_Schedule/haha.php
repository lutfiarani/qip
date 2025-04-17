<html>
<body>
<table align="left" border="1" cellpadding="3" cellspacing="0">
<?php // $b = 30;
// for($j=1;$j<=$b/10;$j++)
// {
//  echo "<tr>";

// //for ($j=1;$j<=10;$j++)
// for ($no = 1, $i=10, $a=1; $i<=30, $a<=10  ; $i++, $a++)
//   {
//   //echo "<td>$i * $j = ".$i*$j."</td>";
  
//   echo "<td>".$a."</td>";
//   echo "<td>".$i."</td>";
  
  
  
//   }
//   //echo "<td>".$j."</td>";
  
//   echo "</tr>";
// }

$b=30;
 for ($no = 1, $i=1, $a=10; $i<=10, $a<=$b  ; $i++, $a++) { ?>
 
    <tr>
        <td> <?php echo $no; ?></td>
        <td><?php echo $i; ?></td>
        <td><?php echo $a; ?></td>
    </tr>

<?php $no++; } ?>

</table>
</body>
</html>

