<?php

//   require_once( "woo/base/Registry.php" );
//   require_once( "woo_base_Registry.php" );
//   require_once( "woo_base_RequestRegistry.php" );
   $request = woo_base_RequestRegistry::getRequest();
   var_dump($request);

?>

<html>
  <head>
     <title>Добавление заведения</title>
  </head>

  <body>
     <h1>Добавление заведения</h1>

     <table>
       <tr>
         <td>
<?php
print $request->getFeedbackString("</td></tr><tr><td>");
?>
         </td>
       </tr>
     </table>

   <form action="AddVenue.php" method="get">
      <input type="hidden" name="submitted" value="yes"/>
      <input type="text" name="venue_name" />
   </form>
  </body>
</html>
