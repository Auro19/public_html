<html>
  <head>
    <style>
    .item {
      float:none;
      clear:both;
      margin-top:1em;  
    }
  </style>
  </head>
  <body>
    <h2>My recent status updates</h2>
<?php
//include class
    include_once 'Services/Twitter.php';
    try {
// initialize service object
// perform login
      $service = new Services_Twitter('A_Nameless_Wolf', 'kol222maam');
// get status updates posted by logged-in user
// display as list
      $response = $service->statuses->user_timeline();  
      if (count($response->status) > 0) {
        foreach ($response->status as $status) {
          echo '<div class="item">';
          echo $status->text . '<br/>';
          echo 'By: <em>' . $status->user->screen_name . '</em> on ' . $status->created_at . '</div>';
        }
      }
// perform logout
      $service->account->end_session();
    } catch (Exception $e) { 
      die('ERROR: ' . $e->getMessage());
    }
?>
  </body>
</html>