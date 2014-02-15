var resultsContent;
var selectsContent;

function downloadResults( id ) {
  window.location="download.php?id=" + id;
}

function stateChanged() {

  if ( resultsContent.readyState == 4 ) {
    document.getElementById( "results_display" ).innerHTML=resultsContent.responseText;
  }

  if ( ( selectsContent.readyState == 4 ) && ( reloadSelects ) ) {
    document.getElementById( "selects_display" ).innerHTML=selectsContent.responseText;
    reloadSelects = false;
  }
}

function getXmlHttpObject() {

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    return new XMLHttpRequest();
  }
  if (window.ActiveXObject) {
    // code for IE6, IE5
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
  return null;
}
   
var eventId = 0;
var sortIn = "category";
var sortBy = "pax_time";
//var excludeTos = 0;

var classes = new Array();
var categories = new Array();
var operator = "and";

var reloadSelects = false;

function updateClass( element ) {

  classes = new Array();

  if ( element.options[ 0 ].selected ) {

    for ( var i=1; i < element.options.length; i++) {
      element.options[i].selected = false;
    }

  } else {
  
    element.options[ 0 ].selected = false;

    var count = 0;
    for ( var i=1; i < element.options.length; i++) {
      if ( element.options[i].selected ) {
        classes[count++] = element.options[i].value;
      }
    }
  }
  
  updateResults();
}

function updateCategory( element ) {

  categories = new Array();

  if ( element.options[ 0 ].selected ) {

    for ( var i=1; i < element.options.length; i++) {
      element.options[i].selected = false;
    }

  } else {
  
    element.options[ 0 ].selected = false;

    var count = 0;
    for ( var i=1; i < element.options.length; i++) {
      if ( element.options[i].selected ) {
        categories[count++] = element.options[i].value;
      }
    }
  }
  
  updateResults();
}

function resetSorting( element ) {
//  excludeTos = 0;
  sortIn = "category";
  sortBy = "pax_time";
  reloadSelects = true;  

  classes = new Array();
  categories = new Array();
  operator = "and";

//  document.results_form.exclude_tos.checked = false;
  document.results_form.sort_by.selectedIndex = 0;
  document.results_form.sort_in.selectedIndex = 0;  

  if ( eventId != 0 ) {
    updateResults();
  }
}

function updateOperator( newOperator ) {

  operator = newOperator;
  updateResults();
}

function startOver( form ) {

  eventId = 0;
//  excludeTos = 0;
  sortIn = "category";
  sortBy = "pax_time";

  classes = new Array();
  categories = new Array();

//  document.results_form.exclude_tos.checked = false;
  document.results_form.id.selectedIndex = 0;
  document.results_form.sort_by.selectedIndex = 0;
  document.results_form.sort_in.selectedIndex = 0;   

  document.results_form.reset_sorting.disabled = false;
  document.results_form.sort_by.disabled = false;
  document.results_form.sort_in.disabled = false;

  document.getElementById( "results_display" ).innerHTML="";
  document.getElementById( "selects_display" ).innerHTML="";

}
    
function updateEvent( newEventId ) {

  if ( newEventId != 0 ) {
    reloadSelects = true;
    eventId = newEventId;

    if ( eventId.substring( 0, eventId.indexOf( '_' ) ) == "series" ) {
      document.results_form.reset_sorting.disabled = true;
      document.results_form.sort_by.disabled = true;
      document.results_form.sort_in.disabled = true;
    } else {
      document.results_form.reset_sorting.disabled = false;
      document.results_form.sort_by.disabled = false;
      document.results_form.sort_in.disabled = false;
    }

    classes = new Array();
    categories = new Array();

    var selectsUrl="getSelects.php";
    selectsUrl=selectsUrl+"?id="+eventId;

    selectsContent = getXmlHttpObject();
    selectsContent.onreadystatechange=stateChanged;
    selectsContent.open("GET",selectsUrl,true);
    selectsContent.send(null);  

    updateResults();
    
  }
}

function updateExcludeTos( newExcludeTos ) {
//  excludeTos = newExcludeTos;
  updateResults();
}

function updateSortBy( newSortBy ) {
  sortBy = newSortBy;
  updateResults();
}

function updateSortIn( newSortIn ) {
  sortIn = newSortIn;
  updateResults();
}

function updateResults() {

  if ( eventId == 0 ) {
    alert( "Please select an event to view results." );
  } else {

    resultsContent = getXmlHttpObject();    
    if (resultsContent==null) {
      alert ("Browser does not support HTTP Request");
      return;
    }

    var resultsUrl="getResults.php";
    resultsUrl=resultsUrl+"?id="+eventId;
    resultsUrl=resultsUrl+"&sort_by="+sortBy;
    resultsUrl=resultsUrl+"&sort_in="+sortIn;
//    resultsUrl=resultsUrl+"&exclude_tos="+excludeTos;

    if ( categories.length > 0 ) {
      resultsUrl=resultsUrl+"&category="+categories;
    }
    if ( classes.length > 0 ) {
      resultsUrl=resultsUrl+"&class="+classes;
    }

    if ( ( categories.length > 0 ) ||
         ( classes.length > 0 ) ) {
      resultsUrl=resultsUrl+"&operator="+operator;
    }
    
    resultsUrl=resultsUrl+"&sid="+Math.random();
    resultsContent.onreadystatechange=stateChanged;
    resultsContent.open("GET",resultsUrl,true);
    resultsContent.send(null);
  }
}