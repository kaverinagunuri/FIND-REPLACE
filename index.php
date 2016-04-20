<?php 
if(isset($_POST['find'],$_POST['replace'],$_POST['find'])===true)
{
  if(empty($_POST['find'])===FALSE)
  {
      $find=explode(',',$_POST['find']);
      array_walk($find, 'addDelimiter');
      //print_r($find);
      
  }
  $replace=(empty($_POST['replace'])==false)?  preg_split('/,\s+/', $_POST['replace']):"";
  $text=(empty($find)===FALSE&& empty($replace)===FALSE)?  preg_replace($find, $replace, $_POST['text']):'';
  
}
function addDelimiter(&$in)
{
   $in='/'.trim($in).'/'; 
}


?>
<html>
    <head>
        <title>
            Find and Replace
        </title>
    </head>
    <body>
        <form action="" method="post">
            <input type="text" name="find" placeholder="words,to,find"/>
            <input type="text" name="replace" placeholder="replace,text,here"/><br>
            <p><textarea name="text" rows="10" cols="30"><?php echo(empty($_POST['text'])===FALSE)?$text:'' ?></textarea></p>
            <input type="submit" value="submit" name="submit"/>
        </form>
    </body>
</html>