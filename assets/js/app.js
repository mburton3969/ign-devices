//Globals
var cur_nav = 0;
var nav_order = [
  'categoryDiv',
  'typeDiv',
  'submitDiv'
];

//Functions



function submit_donation(){
  var form = document.querySelector('form');
  var url = 'assets/php/request-handler.php';
  var params = new FormData(form);
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {//Call a function when the state changes.
      if(xhr.readyState == 4 && xhr.status == 200) {
          //Do Something...
        console.log('Done');
      }
  }
  xhr.open('POST', url, true);
  //Send the proper header information along with the request
  //xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.send(params); 
}


//Navigation Functions

function render_nav(card,nid){
  if(!card){
    card = document.getElementById('categoryDiv');
  }
  var nav = card.querySelector('.uk-dotnav');
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
    a.setAttribute('href','Javascript: nav_to('+ni+');');
    a.innerHTML = n;
    li.appendChild(a);
    nav.appendChild(li);
    ni++;
  });
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