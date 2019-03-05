    //=======================================================================

/**********************************************************************************
* Help Center Live! – http://www.helpcenterlive.com 				  			  *
* by Digital Frontiers, UTO 							  						  *
***********************************************************************************
* Software Version: Help Center Live! v 2.1.7 					  				  *
* Software by: Digital Frontiers, UTO (http://www.helpcenterlive.com) 		      *
* Copyright 2008 by: Digital Frontiers, UTO (http://www.helpcenterlive.com) 	  *
* Support, News, Updates at: http://www.helpcenterlive.com 			  			  *
***********************************************************************************
* This program is free software; you may redistribute it and/or modify it under   *
* the terms of the provided license as published by Digital Frontiers, UTO. 	  *
* 										  										  *
* This program is distributed in the hope that it is and will be useful, but 	  *
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY    *
* or FITNESS FOR A PARTICULAR PURPOSE. 						  					  *
* 										  										  *
* See the "license.txt" file for details of the Help Center Live! license. 	 	  *
* The latest version can always be found at http://www.helpcenterlive.com. 	 	  *
***********************************************************************************
* File Comments:																  *
* This file is used to track visitors using javascript							  *
**********************************************************************************/

    var RequestConnection1 = new Aardvark('RequestConnection1');

    function Request() {

        this.time = Misc.epoch();
        this.chatid = '<?php echo($chatid); ?>';

        this.check = function(variables)
        {
            var response = '';
            if (RequestConnection1.vars.request_<?php echo($chatid); ?>) {
                response = RequestConnection1.vars.request_<?php echo($chatid); ?>;
                this.time = Misc.epoch();
                var i = 0;
                var max = 0;
                var action = response.split('|');
                max = action.length - 1;
                for (i = 0; i < max; ++i) {
                    switch (action[i]) {
                    case 'accept':
<?php if (isset($_GET['opchat'])) { ?>
                        parent.window.location.href = '<?php echo($GLOBALS['conf']['url']); ?>/live/chat/main.php?opchat&chatid='+this.chatid+'&time='+this.time;
<?php } elseif (isset($_GET['initiate'])) { ?>
                        parent.window.location.href = '<?php echo($GLOBALS['conf']['url']); ?>/live/chat/main.php?initiate&chatid='+this.chatid+'&time='+this.time;
<?php } else { ?>
                        parent.window.location.href = '<?php echo($GLOBALS['conf']['url']); ?>/live/chat/main.php?chatid='+this.chatid+'&time='+this.time;
<?php } ?>
                        break;
                    case 'decline':
<?php if (isset($_GET['opchat'])) { ?>
                        parent.window.location.href = '<?php echo($GLOBALS['conf']['url']); ?>/live/divert.php?divert=busy&chatid='+this.chatid+'&time='+this.time;
<?php } elseif (isset($_GET['initiate'])) { ?>
                        parent.window.location.href = '<?php echo($GLOBALS['conf']['url']); ?>/live/divert.php?divert=busy&chatid='+this.chatid+'&time='+this.time;
<?php } else { ?>
                        parent.window.location.href = '<?php echo($GLOBALS['conf']['url']); ?>/live/divert.php?divert=busy&departmentid=<?php echo(addslashes($_GET['departmentid'])); ?>&chatid='+this.chatid+'&time='+this.time;
<?php } ?>
                        break;
                    }
                }
            }
            window.setTimeout('Request.refresh();', <?php echo($GLOBALS['conf']['chat_refresh']); ?>);
        }

        this.refresh = function()
        {
<?php if (isset($_GET['opchat'])) { ?>            RequestConnection1.add('opchat', '');<?php } ?>
            RequestConnection1.add('request', '');
            RequestConnection1.add('chatid', this.chatid);
            RequestConnection1.add('time', Misc.epoch());
            RequestConnection1.send('<?php echo($GLOBALS['conf']['url']); ?>/live/response.php', 'Request.check(variables)', 'reset');
        }

    }

    var Request = new Request();

    //=======================================================================