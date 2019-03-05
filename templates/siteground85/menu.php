<div id="menucenter">
		<table cellpadding="0" cellspacing="0">
			<tr>
					<td class="menu_m">
						<div id="topnavi">
							<ul>
							<?php
								$item_id = mysql_escape_string( $_GET['Itemid'] );
								$qry = "SELECT id, name, link FROM #__menu WHERE menutype='mainmenu' and parent='0' AND access<='$gid' AND sublevel='0' AND published='1' ORDER BY ordering LIMIT 5";
								$database->setQuery($qry);
								$rows = $database->loadObjectList();
								foreach($rows as $row) {
									echo "<li><a href='$row->link&Itemid=$row->id' ".( $row->id == $item_id ? "class='current'" : "" )." ><span>$row->name</span></a></li>";
								}
							?>			
							</ul>
						</div>					
					</td>			
			</tr>
		</table>	
</div>