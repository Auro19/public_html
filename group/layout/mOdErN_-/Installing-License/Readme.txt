// PHProjekt Theme System
// Copyright ©2003, ©2004, ©2005 by Mark Coudriet

// This program is free software; you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License, or
// (at your option) any later version.

// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, 
// Boston, MA 02111-1307, USA.

// You can contact Mark Coudriet by email 
// at ipsymon@yahoo.com
/* 
-----------------------------------------------
  REQUIREMENTS
----------------------------------------------- */
Requirements for PHProjekt:
PHProjekt 4.x

/* 
-----------------------------------------------
  INSTALLATION
----------------------------------------------- */
Back-up all of your files!!!
Replace the appropriate files according to their directory.

PHProjekt:
1) Copy the mOdErN theme into the layout folder.
2) a. Either manually edit the lib.inc.php file
   b. or rename your current lib.inc.php file & copy the one provided into your lib directory.
3) If you use the CMS by Mario Valdez, do the same as above with the cm_lib.inc.php file.


/* 
-----------------------------------------------
  CONFIGURATIONS
----------------------------------------------- */

Chat Invitations:
To enable chat invites you must have the chat module enabled, the user must also have a "ROLE" in which chat is
enabled, & the PHProjekt Chat folder must have Read, Write, & Modify permissions.
You can tell that you set the permissions correctly if there is a file created in
the PHProjekt Chat folder entitled list.txt.
IMPORTANT!!! - If you have never assigned a role to your user(i.e. the user role is blank)
CHAT WILL NOT WORK!!!
If you want to disable chat invites, look for the variable $chatinv in Compact.php.
Change the value to 1.

To change the anchor target, modify this variable in Compact.php
// target for href's
$target = "\"_top\"";


