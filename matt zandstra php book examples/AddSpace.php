<?php
   require_once( "woo/view/ViewHelper.php" );
   $request = VH::getRequest();
   $venue = $request->getObject('venue');
?>

<html>
   <head>
      <title>Добавьте место к заведению '<?php echo $venue->getName() ?>' </title>
   </head>

   <body>
   <h1> Добавьте место к заведению '<?php print $venue->getName() ?>'</h1>
      <table>
        <tr>
          <td>
<?php print $request->getFeedbackString("</td></tr><tr><td>"); ?>
         </td>
       </tr>
      </table>

   <form method="post">
     <input type="text"
       value="<?php echo $request->getProperty( 'space_name' ) ?>" 
        name="space_name"/>

     <input type="hidden" name="venue_id" 
       value="<?php echo $venue->getId() ?>" />

     <input type="submit" value="submit" />
   </form>
   </body>
</html>
