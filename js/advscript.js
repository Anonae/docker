//const CryptoJS = require("crypto-js");
var crypto = {};
crypto.encode = function(msg, key, cb) {
  if (!msg || !key) return false;
  var encrypted = CryptoJS.AES.encrypt(msg, key);
  if (cb) cb(encrypted.toString());
  return encrypted.toString();
};

crypto.decode = function(msg, key, cb) {
  if (!msg || !key) return false;
  var decrypted;
  try {
    decrypted = CryptoJS.AES.decrypt(msg, key);
    decrypted = decrypted.toString(CryptoJS.enc.Utf8);
  } catch (e) {
    decrypted = false;
  }
  if (cb) cb(decrypted);
  return decrypted;

};

function addCommas(NumberStr) {
  if (!NumberStr) return '';
  NumberStr += '';
  var NumberData = NumberStr.split('.');
  var Number1 = NumberData[0];

  var Number2 = NumberData.length > 1 ? '.' + NumberData[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(Number1)) {
    Number1 = Number1.replace(rgx, '$1' + ',' + '$2');
  }
  if (Number2.length > 3) Number2 = Number2[0] + Number2[1] + Number2[2];
  return Number1 + Number2;
}
var exceptionfeild = [];

function COPYOBJ(fromobj, toobj) {
  var temp = Object.getOwnPropertyNames(fromobj);

  for (var x = 0; x < temp.length; x++) {
    if (typeof(fromobj[temp[x]]) == 'string' || typeof(fromobj[temp[x]]) == 'number' || typeof(fromobj[temp[x]]) == 'boolean' || Array.isArray(fromobj[temp[x]])) {
      if (exceptionfeild.indexOf(temp[x]) !== -1) continue; // Exception Value feild
      toobj[temp[x]] = fromobj[temp[x]];
    }
  }
}
// To use function
//      <table id='obj2use'><tr class='row_tablecontent' style='display:none'><td class='datasetname_id'> this is id value </td></tr></table>
//
function tablerow(objtable, datasetname, tabledata, template, update) { // Do each row
  if (!datasetname) datasetname = '';

  var TR;
  if (!update) { // New Record

    TR = objtable.find('.row_tablecontent')
      .last();

    objtable.append(template); // Append invisible Template for next record
    TR.attr("data-id", tabledata._id); // assign Data To TR tag   attribute  data-id=1.2.3...
  } else {
    var nameofrow = "[data-id=" + tabledata._id + "]";
    TR = objtable.find(nameofrow)
      .first();
  }


  setdatabyclass(TR, datasetname, tabledata);

  //TR.show('slow');
  return TR;
};

function setdatabyclass(objjquery, datasetname, objdata) {
  if (!objdata || objdata == null) return;
  if (!datasetname) datasetname = '';

  if (Number(objdata._id) > 0) objdata.id = Number(objdata._id);
  if (objdata.id > 0) objjquery.attr("data-id", objdata.id);
  var propname = Object.getOwnPropertyNames(objdata);

  for (var x = 0; x < propname.length; x++) {
    var relateobj;

    if (propname[x] == '_id') {
      relateobj = objjquery.find('.' + datasetname + propname[x]);
    } else {
      // GET relate OBject
      relateobj = objjquery.find('.' + datasetname + '_' + propname[x]);

    }

    for (var y = 0; y < relateobj.length; y++) {
      var jqobj = relateobj[y]; // Change To JQuery OBJECT

      if (jqobj.nodeName == 'SELECT' || jqobj.nodeName == 'BUTTON' || jqobj.nodeName == 'INPUT') { // Select Box
        $(jqobj)
          .val(objdata[propname[x]]);
      } else if (jqobj.nodeName == 'CHECK') { // Checkbox ?? will do it later
        // console.log("FOUND CHECK")

      } else if (jqobj.nodeName == 'IMG') { // IMG SET SRC
        jqobj.src = objdata[propname[x]];

      } else { // Other object
        if (propname[x] == 'lastupdate') {
          $(jqobj)
            .html(moment(objdata[propname[x]], "X")
              .format('D/M H:mm:ss'));
        } else {
          $(jqobj)
            .val(objdata[propname[x]]);
          $(jqobj)
            .html(objdata[propname[x]]);
        }
      }

    }
  }
}
///// URL FUNCTION

//Firsttime Calll
var url = window.location.href;
var querysplit = url.split('/');
var yearpage = querysplit[3];
var mainview = querysplit[4];
var subview = querysplit[5];
var detailofview = querysplit[6];

var starturl = '/' + mainview;
if (subview) starturl += '/' + subview;
if (detailofview) starturl += '/' + detailofview;

/*
if(detailofview.indexOf('?') !== -1){
    detailofview  = detailofview.split('?');
    detailofview  = detailofview[1];
}
*/
// anyquery ..
function getQueryVal(name, urlsearch) {
  urlsearch = url;
  name = name.replace(/[\[]/, '\\[')
    .replace(/[\]]/, '\\]');
  var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
  var results = regex.exec(urlsearch);
  return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
};



var allpage_register = [];

function onPageshow(anycondition, fnc2set) {

  if (anycondition.indexOf('/') !== 0) { // First String is '/'  not found at first position
    anycondition = '/' + anycondition;
  }
  var url = anycondition;
  var querysplit = url.split('/');
  //var subyearpage = querysplit[3];
  var submainview = querysplit[1];
  var subsubview = querysplit[2];
  var detailofview = querysplit[3];


  var registerurl = '/' + submainview;
  if (subsubview) registerurl += '/' + subsubview;
  if (detailofview) {
    if (detailofview.indexOf('?') !== -1) {
      detailofview = detailofview.split('?');
      detailofview = detailofview[1];
    }
    registerurl += '/' + detailofview;
  }

  for (var x = 0; x < allpage_register.length; x++) {
    if (allpage_register[x].condition == registerurl) {
      allpage_register[x].fnc = fnc2set;
      return; // found old one.
    }

  }
  //console.log("Register Page " + registerurl);
  // not found then register new
  allpage_register.push({
    condition: registerurl,
    fnc: fnc2set
  });
}

function triggerPageshow(anycondition) { // Register function
  $('.mainpage')
    .hide(); // Main Class of DIV View 2 Hide
  if (anycondition.indexOf('/') !== 0) { // First String is '/'  not found at first position
    anycondition = '/' + anycondition;
  }
  var querysplit = anycondition.split('/');
  var submainview = querysplit[1];
  var subsubview = querysplit[2];
  var detailofview = querysplit[3];
  if (!submainview) return;
  var con2check = '/' + submainview;
  if (subsubview) con2check += '/' + subsubview;
  if (detailofview) con2check += '/' + detailofview;
  for (var x = 0; x < allpage_register.length; x++) {
    // console.log("TESTING " + allpage_register[x].condition);
    if (con2check.indexOf(allpage_register[x].condition) == 0) { // Found 1 post
      try {
        var fnc = allpage_register[x].fnc;
        fnc(detailofview);
      } catch (e) {
        console.log(e);
      }
    }
  }
}

function go2View(anyinternalurl, titlename) {
  console.log("go2View :" + anyinternalurl);
  var url = anyinternalurl;
  if (anyinternalurl.indexOf('./') === 0) { // First Start is short
    var detailofview = anyinternalurl.substr(2);
    var subyearpage = yearpage;
    var submainview = mainview;
    var subsubview = subview;
    //  console.log("Short Hand");

  } else if (anyinternalurl.indexOf('/') == 0) { // First String is '/'
    var querysplit = url.split('/');
    //var subyearpage = querysplit[3];
    var submainview = querysplit[1];
    var subsubview = querysplit[2];
    var detailofview = querysplit[3];
  } else {
    var querysplit = url.split('/');
    //var subyearpage = querysplit[3];
    var submainview = querysplit[0];
    var subsubview = querysplit[1];
    var detailofview = querysplit[2];
  }

  var registerurl = '/' + yearpage + '/' + submainview;
  if (subsubview) registerurl += '/' + subsubview;
  if (detailofview) {
    registerurl += '/' + detailofview;
    if (detailofview.indexOf('?') !== -1) {
      detailofview = detailofview.split('?');
      detailofview = detailofview[1];
    }
  }


  if (!titlename) titlename = subview + '/' + detailofview;

  window.history.pushState({
    callpath: anyinternalurl
  }, titlename, registerurl);

  // $('#view_timer_manage').show(); // Class or ID of DIV 2 Show;
  //  console.log("TRIGGER " + anyinternalurl);
  triggerPageshow(anyinternalurl);

  return false; // Must Return False everytime prevent page reload
}


/// end URL FUNCTION
/// ####### AJAX LOGIN SYSTEM PART

$(document)
  .ajaxSuccess(function(event, xhr, settings) {
    var temp = xhr.responseText;
    //  console.log(temp);
    if (temp.length < 100 && temp.indexOf('{"loginfail":') == 0) {

      console.log(temp);
      //if (temp.loginfail) { // force logout
      console.log("FOUND LOGIN FIAL");
      go2View('/cpanel/logout');
      return false;
      //}
    }
    if (xhr.responseText == 'forcelogout') {
      console.log("Session Timeout force .. Logout ..");
    }
    //if ( settings.url == "ajax/test.html" ) {
    // console.log( "Triggered ajaxSuccess handler. The Ajax response was: " +
    //      xhr.responseText );
    //}
  });

function checkloginsession(url, token) {
  var url = '/api/member/login';

  //return;
  $.post(url, {
    name: 'monai'
  }, function(data) {
    console.log('succes: ' + data);
  });
  /*
   $.ajax({
      url: '/login/logincheck',
      headers: {
          'Authorization-Token':'myToken',
      },
      method: 'POST',
      dataType: 'json',
      data: {name:'monai'},
      success: function(data){
        console.log('succes: '+data);
      }
    });
    */
}


//
function ajax_settoken(token) {
  //return;
  $.ajaxSetup({
    //  dataType: "json",
    headers: {
      'Authorization': 'Bearer ' + mytoken,
      //  "Access-Control-Request-Headers": "x-requested-with",
      //    'Access-Control-Allow-Origin':'*',
      //origin: "http://awsnode.monai.com:8888",
      //referer:"http://awsnode.monai.com:8888",


    }
  });
  // setup WS Member here!!
  connect_wssocket(mytoken);
  console.log("Headers set!");
}

window.onpopstate = function(e) {
  if (e.state && e.state.callpath) {
    //console.log("STATE CHANGE goto view " + e.state.callpath);
    triggerPageshow(e.state.callpath);
  }

};
if (starturl == '/undefined') {
  window.location.replace('/2019/home');
}
var mysessionid;
//
var socket;

function connect_wssocket(uniqueid) {
  mainconfig = { // url , password
    reconnection: true,
    path: '/webclient',
    reconnectionDelay: 10000,
    autoConnect: true,
    query: 'uniqueid=' + uniqueid + '&classtype=webclient',
    rejectUnauthorized: false, // Self Sign Pass throuth
    transports: ['websocket'],
    password: '1234'
    // secure: true			// FOR SSL

  };
  mainconfig.query += '&encodedid=' + encodeURIComponent(crypto.encode(uniqueid, mainconfig.password));
  url_for_connect = 'ws://www.kapookvending.com/';
  console.log("Socket io Connecting.." + url_for_connect + mainconfig.query);
  socket = io(url_for_connect, mainconfig);
  socket.on('error', function(err) {
    console.log("connect err", err);
  });
  socket.on("refresh", function(msg) {
    console.log('got msg', msg)
    window.location.replace('/2019/cpanel/home');
  });
  socket.on("console", console.log);
  socket.on('connect', function() {
    console.log("connect");
  });
  socket.on('event', console.log);
  socket.on('disconnect', (err) => {
    console.log("Error disconnect", err);
    /*
        if (whenOffline) {
          whenOffline();
        }
        */
  });
  /*
    setInterval(function() {
      console.log("emiting");
      socket.emit('logincheck', {
        msg: 'test'
      }, function(callmsg) {
        console.log("got response", callmsg);
      });
    }, 5000);*/
}




/*
console.log("Start url = " + starturl);
if (starturl) {
  window.history.replaceState({
    callpath: starturl
  }, undefined);
}
*/
