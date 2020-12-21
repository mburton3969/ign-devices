//Globals
var currentHost = window.location.host;
var cur_nav = 0;
var nav_order = [
  'Intro',
  'Device Type',
  'Device Brand',
  'Device Model',
  'Device Condition',
  'Address',
  'Submit'
];
/*var nav_order = [
  'introDiv',
  'categoryDiv',
  'typeDiv',
  'modelDiv',
  'conditionDiv',
  'addressDiv',
  'submitDiv'
];*/

//Functions
function get_manufacturers(category){
  if(category === ''){
    notify('Please Select A Device Type!','danger','top-right');
    return;
  }
  if(category === 'Other'){
    reject_device();
    return;
  }
  nav_next();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
         // Typical action to be performed when the document is ready:
         var r = JSON.parse(this.responseText);
        if(r.response === 'GOOD'){
          var type_input = document.getElementById('device_brand');
          type_input.innerHTML = '';
          var opt = document.createElement('option');
          opt.value = '';
          opt.innerHTML = 'Please Select Manufacturer';
          type_input.appendChild(opt);
          r.brands.forEach(function(b){
            var opt = document.createElement('option');
            opt.value = b;
            opt.innerHTML = b;
            type_input.appendChild(opt);
          });
          var opt = document.createElement('option');
          opt.value = 'Other';
          opt.innerHTML = 'Other';
          type_input.appendChild(opt);
          console.log('Brands Loaded');
        }else{
          console.error(r.message);
        }
      }
  };
  xhttp.open("GET", "assets/php/fetch-info.php?mode=manufacturers&category="+category, true);
  xhttp.send();
}


function get_models(brand){
  var category = document.getElementById('device_category').value;
  if(brand === ''){
    notify('Please Select A Device Model!','danger','top-right');
    return;
  }
  if(brand === 'Other'){
    reject_device();
    return;
  }
  nav_next();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
         // Typical action to be performed when the document is ready:
         var r = JSON.parse(this.responseText);
        if(r.response === 'GOOD'){
          var type_input = document.getElementById('device_model');
          type_input.innerHTML = '';
          var opt = document.createElement('option');
          opt.value = '';
          opt.innerHTML = 'Please Select Model';
          type_input.appendChild(opt);
          r.models.forEach(function(m){
            var opt = document.createElement('option');
            opt.value = m;
            opt.innerHTML = m;
            type_input.appendChild(opt);
          });
          var opt = document.createElement('option');
          opt.value = 'Other';
          opt.innerHTML = 'Other';
          type_input.appendChild(opt);
          console.log('Models Loaded');
        }else{
          console.error(r.message);
        }
      }
  };
  xhttp.open("GET", "assets/php/fetch-info.php?mode=models&category="+category+"&brand="+brand, true);
  xhttp.send();
}


function prep_review(){
  //Review Box
  var rb = document.getElementById('review_box');
  //Device Details
  var device_category = document.getElementById('device_category').value;
  var device_brand = document.getElementById('device_brand').value;
  var device_model = document.getElementById('device_model').value;
  var device_condition = document.getElementById('device_condition').value;
  //Address Details
  var fname = document.getElementById('first_name').value;
  var lname = document.getElementById('last_name').value;
  var email = document.getElementById('email').value;
  var street_address = document.getElementById('street_address').value;
  var street_address_2 = document.getElementById('street_address_2').value;
  var city = document.getElementById('city').value;
  var state = document.getElementById('state').value;
  var zip = document.getElementById('zip').value;
  var phone = document.getElementById('phone').value;
  var alt_phone = document.getElementById('alt_phone').value;
  //Validate Address Info
  var form = document.querySelector('form');
  var valid = form.checkValidity();
  if(valid){
    console.log('Form Validated');
    nav_next();
  }else{
    form.reportValidity();
    return;
  }
  //Build the Review Box Contents
  var content = `
  <h3>Device Details:</h3>
  <p>
    Brand: ${device_brand}<br>
    Model: ${device_model}<br>
    Good Condition?: ${device_condition}
  </p>
  <h3>Contact Details</h3>
  <p>
    ${fname} ${lname}<br>
    ${email}<br>
    ${street_address} ${street_address_2}<br>
    ${city}, ${state} ${zip}<br>
    Phone: ${phone} | Alt Phone: ${alt_phone}
  </p>
  `;
  rb.innerHTML = content;
  console.log('Review Box Content Loaded');
}

function submit_donation(){
  var form = document.querySelector('form');
  if(currentHost === 'devices.ignition633.org'){
    var url = '//toolbox.ignition633.org/device_donation/request?apiKey=mths3969';
  }else{
    var url = '//beta-toolbox.ignition633.org/device_donation/request?apiKey=mths3969';
  }
  var params = new FormData(form);
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {//Call a function when the state changes.
      if(xhr.readyState == 4 && xhr.status == 200) {
          //Do Something...
        var r = JSON.parse(this.responseText);
        if(r.response === 'GOOD'){
          accept_device();
          console.log('Done');
        }else{
          notify(r.message,'danger','top-right',5000);
        }
      }
  }
  xhr.open('POST', url, true);
  xhr.send(params); 
}


//Navigation Functions
function render_nav(card,nid){
  if(!card){
    card = document.getElementById('introDiv');
  }
  var nav = card.querySelector('.uk-dotnav');
  if(nav){
    nav.innerHTML = '';
    var ni = 0;
    nav_order.forEach(function(n){
      var li = document.createElement('li');
      if(!nid && ni === 0){
        li.setAttribute('class','uk-active');
      }else if(nid === ni){
        li.setAttribute('class','uk-active');
      }
      var a = document.createElement('a');
      if(ni <= cur_nav){
        a.setAttribute('href','Javascript: nav_to('+ni+');');
      }
      a.setAttribute('uk-tooltip',n)
      li.appendChild(a);
      nav.appendChild(li);
      ni++;
    });
  }
  console.log('Navigation Render Complete');
}

render_nav(); 


function nav_to(nid){
  cur_nav = nid;
  var cards = document.querySelectorAll('.main-card');
  cards.forEach(function(c){
    c.style.display = 'none';
  });
  cards[nid].style.display = 'flow-root';
  render_nav(cards[nid],nid);
}

function nav_next(){
  var next = cur_nav + 1;
  nav_to(next);
}

function nav_prev(){
  var prev = cur_nav - 1;
  nav_to(prev);
}

function accept_device(){
  var cards = document.querySelectorAll('.main-card');
  cards.forEach(function(c){
    c.style.display = 'none';
  });
  document.getElementById('acceptDiv').style.display = 'flow-root';
}

function reject_device(){
  var cards = document.querySelectorAll('.main-card');
  cards.forEach(function(c){
    c.style.display = 'none';
  });
  document.getElementById('rejectDiv').style.display = 'flow-root';
}


//Notifications
function notify(message,status='success',position='top-right',timeout=5000){
  UIkit.notification({
      message: message,
      status: status,
      pos: position,
      timeout: timeout
  });
}


//Shipping Toggle Functions
function drop_off(){
  var street_address = document.getElementById('street_address');
  street_address.value = 'Drop-Off';
  street_address.style.display = 'none';
  var street_address_2 = document.getElementById('street_address_2');
  street_address_2.value = 'Drop-Off';
  street_address_2.style.display = 'none';
  var city = document.getElementById('city');
  city.value = 'Drop-Off';
  city.style.display = 'none';
  var state = document.getElementById('state');
  state.value = 'Drop-Off';
  state.style.display = 'none';
  var zip = document.getElementById('zip');
  zip.value = 'Drop-Off';
  zip.style.display = 'none';
  document.getElementById('address_title').innerHTML = 'Who should we send the donation receipt to?';
  var link = document.getElementById('shipping_toggle');
  link.innerHTML = 'I want to ship my device to you.';
  link.href = 'Javascript: ship_it();';
}


function ship_it(){
  var street_address = document.getElementById('street_address');
  street_address.value = '';
  street_address.style.display = 'inline';
  var street_address_2 = document.getElementById('street_address_2');
  street_address_2.value = '';
  street_address_2.style.display = 'inline';
  var city = document.getElementById('city');
  city.value = '';
  city.style.display = 'inline';
  var state = document.getElementById('state');
  state.value = '';
  state.style.display = 'inline';
  var zip = document.getElementById('zip');
  zip.value = '';
  zip.style.display = 'inline';
  document.getElementById('address_title').innerHTML = 'Where should we send the pre-paid shipping label?';
  var link = document.getElementById('shipping_toggle');
  link.innerHTML = 'I want to drop my device off in person.';
  link.href = 'Javascript: drop_off();';
}