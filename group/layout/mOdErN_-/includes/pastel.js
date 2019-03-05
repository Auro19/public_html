/* Dynamic Pastel Background
// Copyright ©2005 by Mark Coudriet

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

random_num = (Math.round((Math.random()*9)+1))
document.write(random_num + "<br>");
document.write(Pastel());*/

var random_num = (Math.round((Math.random()*5)+1));

var newImage = "url('../layout/Mark_-/img/p"+random_num+".gif')";


//document.write(newImage + "<br>");

document.body.style.backgroundImage = newImage;

document.body.style.backgroundColor="rgb("+Pastel()+")";

function Pastel() {
    var limit = 255 * .9;
    var r, g, b;
    while(1) {
        r = 255 * Math.random();
        g = 255 * Math.random();
        b = 255 * Math.random();
        if ((r > limit || g > limit || b > limit) && r > 160 && g > 160 && b > 160) break;
    }
    return Math.round(r) + "," + Math.round(g) + "," + Math.round(b);
 }

