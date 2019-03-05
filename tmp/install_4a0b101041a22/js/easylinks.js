<<<<<<< .mine
window.addEvent("domready", function(){
	var amount = $ES("table.adminlist tbody tr td").length / $ES("table.adminlist tbody tr").length;
	//
	if(amount != 1)
	{
		//
		if(amount == 7) // Photoslide and Tabs Manager groups management
		{
			var coll = new Array();
			//
			$ES("table.adminlist tbody td").each(function(el,i){
				if((i+1)%7 == 4) coll.push(el);
			});
			//
			$ES("table.adminlist thead tr th")[6].remove();
			//
			var j = 0;
			//
			$ES("table.adminlist tbody tr td").each(function(el,i){
				if((i+1)%7 == 0){
					$E('a',el).innerHTML = "<img src=\"components/com_gk2_photoslide/configuration/extensions/ext_easylinks/images/preview.png\" style=\"vertical-align: middle;margin-left: 10px;cursor: pointer;\" alt=\"Settings\" />";
					coll[j].innerHTML += el.innerHTML;
					el.remove();
					coll[j].innerHTML += "<img src=\"components/com_gk2_photoslide/configuration/extensions/ext_easylinks/images/edit.png\" style=\"vertical-align: middle;margin-left: 10px;cursor: pointer;\" alt=\"Edit\" onclick=\"$$('.inputs').removeProperty('checked');$('cb"+j+"').checked='checked';isChecked($('cb"+j+"').checked);submitbutton('edit_group');\" />";
					j++;	
				}
			});
		}
		else if(amount == 9) // Photoslide slide management
		{
			var coll = new Array();
			//
			$ES("table.adminlist tbody td").each(function(el,i){
				if((i+1)%9 == 4) coll.push(el);
			});
			//
			$ES("table.adminlist thead tr th")[7].remove();
			$ES("table.adminlist thead tr th")[6].remove();
			//
			var j = 0;
			//
			$ES("table.adminlist tbody tr td").each(function(el,i){
				if((i+1)%9 == 7){
					$E('a',el).innerHTML = "<img src=\"components/com_gk2_photoslide/configuration/extensions/ext_easylinks/images/image.png\" style=\"vertical-align: middle;margin-left: 10px;cursor: pointer;\" alt=\"Preview\" />";
					coll[j].innerHTML += el.innerHTML;
					el.remove();
				}
				
				if((i+1)%9 == 8){
					$E('a',el).innerHTML = "<img src=\"components/com_gk2_photoslide/configuration/extensions/ext_easylinks/images/preview.png\" style=\"vertical-align: middle;margin-left: 10px;cursor: pointer;\" alt=\"Settings\" />";
					coll[j].innerHTML += el.innerHTML;
					el.remove();
					j++;					
				}	
			});				
		}
	}
});=======
window.addEvent("domready", function(){
	var amount = $ES("table.adminlist tbody tr td").length / $ES("table.adminlist tbody tr").length;
	//
	if(amount != 1)
	{
		//
		if(amount == 7) // Photoslide and Tabs Manager groups management
		{
			var coll = new Array();
			//
			$ES("table.adminlist tbody td").each(function(el,i){
				if((i+1)%7 == 4) coll.push(el);
			});
			//
			$ES("table.adminlist thead tr th")[6].remove();
			//
			var j = 0;
			//
			$ES("table.adminlist tbody tr td").each(function(el,i){
				if((i+1)%7 == 0){
					$E('a',el).innerHTML = "<img src=\"components/com_gk2_photoslide/configuration/extensions/ext_easylinks/images/preview.png\" style=\"vertical-align: middle;margin-left: 10px;cursor: pointer;\" alt=\"Settings\" />";
					coll[j].innerHTML += el.innerHTML;
					el.remove();
					coll[j].innerHTML += "<img src=\"components/com_gk2_photoslide/configuration/extensions/ext_easylinks/images/edit.png\" style=\"vertical-align: middle;margin-left: 10px;cursor: pointer;\" alt=\"Edit\" onclick=\"$$('.inputs').removeProperty('checked');$('cb"+j+"').checked='checked';isChecked($('cb"+j+"').checked);submitbutton('edit_group');\" />";
					j++;	
				}
			});
		}
		else if(amount == 8) // Tabs Manager tabs management
		{
			var coll = new Array();
			//
			$ES("table.adminlist tbody td").each(function(el,i){
				if((i+1)%9 == 4) coll.push(el);
			});
			//
			$ES("table.adminlist thead tr th")[7].remove();
			//
			var j = 0;
			//
			$ES("table.adminlist tbody tr td").each(function(el,i){
				if((i+1)%9 == 7){
					$E('a',el).innerHTML = "<img src=\"components/com_gk2_photoslide/configuration/extensions/ext_easylinks/images/preview.png\" style=\"vertical-align: middle;margin-left: 10px;cursor: pointer;\" alt=\"Settings\" />";
					coll[j].innerHTML += el.innerHTML;
					el.remove();
				}	
			});					
		}
	}
});>>>>>>> .r15
