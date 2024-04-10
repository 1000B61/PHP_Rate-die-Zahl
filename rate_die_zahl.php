<?php 
$durch=0;
$done=false;
if(isset($_POST["start"]))
{
    if(is_numeric($_POST["grenze"])&&is_int($_POST["grenze"]+0)&&$_POST["grenze"]>0)
    {
        $ziel=rand(0,$_POST["grenze"]-1);
        $durch++;
    }
} else if (isset($_POST["guess"]))
    {
        if($_POST["zahl"]==$_POST["ziel"])
        { 
            $done=true;
            $durch=$_POST["durch"];
            $ziel=$_POST["ziel"];
        } else 
        {  
            $done=$_POST["fertig"];
            $ziel=$_POST["ziel"];
            $durch=$_POST["durch"];
            $durch++;
        }
    }
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate die Zahl</title>
</head>
<body>
<?php 
if($durch==0){
?>
<p>Aus wie vielen positiven Ganzzahlen soll ich wählen?</p>
<form action="aufgabe14_2.php" method="POST">
<input type="text" name="grenze">
<input type="submit" name="start" value="Start">
</form>
<?php } else if (!$done) {?>
<p>Rate die positive Ganzzahl! Dies ist Dein <?php echo $durch ?>. Versuch</p>
<?php if(isset($_POST["zahl"])&&is_numeric($_POST["zahl"])&&is_int($_POST["zahl"]+0)&&($_POST["zahl"]>=0)){
    if($_POST["zahl"]>$_POST["ziel"]){?>
    <p>Deine Zahl ist größer als meine.</p>
<?php }else if($_POST["zahl"]<$_POST["ziel"]){?>
    <p>Deine Zahl ist kleiner als meine.</p> <?php }} ?>
<?php if(isset($_POST["zahl"])&&(!is_numeric($_POST["zahl"])||!($_POST["zahl"]>=0)||!is_int($_POST["zahl"]+0))) {?>
<p><?php echo $_POST["zahl"]; ?> ist keine positive Ganzzahl!</p>
<?php } ?>
<form action="aufgabe14_2.php" method="POST">
<input type="text" name="zahl">
<input type="submit" name="guess" value="Vermutung">
<input type="hidden" name="ziel" value="<?php echo $ziel; ?>">
<input type="hidden" name="durch" value="<?php echo $durch; ?>">
<input type="hidden" name="fertig" value="<?php echo $done; ?>">
</form>
<?php } else {?>    
<h2>Glückwunsch</h2><p>, die Zahl war: <?php echo $ziel; ?>. Du hast <?php echo $durch ?>. <?php if($durch>1) {?>Versuche<?php }else {?>Versuch<?php } ?> gebraucht.</p>
<a href="aufgabe14_2.php">Nochmal</a>
<?php } ?>
</body>
</html>