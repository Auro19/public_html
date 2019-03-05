// Ajax javascript file

// Setup variables for browser checking
var browser = navigator.appName;
var isopera = false;
if ( navigator.userAgent.indexOf( 'Opera' ) >= 0 ) {
  isopera = true;
}
var ismac = false;
if ( navigator.platform.indexOf( 'Macintosh' ) >= 0 ) {
  ismac = true;
}
var isie = false;
if ( browser.indexOf( 'Explorer' ) >= 0 ) {
  isie = true;
}

// Returns an AJAX request object
function makeObject(){
  var x;
  if(browser == "Microsoft Internet Explorer" && !isopera && !ismac ){
    x = new ActiveXObject("Microsoft.XMLHTTP");
  }else{
    x = new XMLHttpRequest();
  }
  return x;
}


// Create the AJAX request object.
xreq = makeObject();

// A method to call our ajax server side script using get method.
// First argument is the task to tell ajax to run, second arguments is
// a string with get arguments to send with the script.
function ajaxGet(task, args, func){
  xreq.open('get', 'index2.php?option=com_jambook&task='+task+args);
  xreq.onreadystatechange = func;
  xreq.send('');
}

// A function to handle the data returned by the ajax server side script.
// Results are printed in the html element named 'ajax_div'
function parseData(){
  if(xreq.readyState == 1){
    document.getElementById('ajax_div').innerHTML = 'Handling request...';
  }
  if(xreq.readyState == 4){
    var result = xreq.responseText;
    document.getElementById('ajax_div').innerHTML = result;
  }
}

// A function that does nothing
function noopFunc() {
  return true;
}

// Save screen resolution
function saveResolution( func ) {
  var sres = checkResolution();
  var wdim = checkWindowDimensions();
  ajaxGet('savescreenresolution', '&sres=' + sres + '&wdim=' + wdim, func);
}

// Save the screen resolution for this IP:
//saveResolution( noopFunc );

ajaxitemid = 0;
function listItemAjax( id, task ) {
    var f = document.adminForm;
    cb = eval( 'f.' + id );
    if (cb) {
        for (i = 0; true; i++) {
            cbx = eval('f.cb'+i);
            if (!cbx) break;
            cbx.checked = false;
        } // for
        cb.checked = true;
        f.boxchecked.value = 1;
	ajaxitemid = cb.value;
        if ( task == 'pubunpub' && xreq ) {
            itemtask = eval( 'f.pub' + ajaxitemid );
            ajaxGet(itemtask.value, '&nohtml=1&pid[0]='+cb.value, switchImageAjax );
            if ( itemtask.value == 'publish' )
                itemtask.value = 'unpublish';
            else
                itemtask.value = 'publish';
        } else {
            submitbutton(task);
        }
    }
    return false;
}

function switchImageAjax( ) {
    if ( xreq.readyState == 4 ) {
        var result = xreq.responseText;
	document.getElementById( 'itemimg' + ajaxitemid ).src = 'images/'+result+'.png';
        //alert( 'itemimg'+ajaxitemid + ' ' + 'images/'+ result +'.png' );
        //MM_swapImage( 'itemimg'+ajaxitemid, '', 'images/'+ result +'.png' );
    }
}
