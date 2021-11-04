function loadUsers() {
  var users = localStorage.getItem('users');
  if (users === undefined || users === null || users === "") {
    users = [];
  } else {
    users = JSON.parse(users);
  }
  return users;
}

function renderRow(template,  tbody, user, index) {
  var clone = document.importNode(template.content, true);
  var tds = clone.querySelectorAll("td");
  tds[0].textContent = index;
  tds[1].textContent = user['firstname'];
  tds[2].textContent = user['lastname'];
  tds[3].textContent = user['email'];
  tbody.appendChild(clone);
}

function deleteUser(event) {
    parentTr = event.target.parentElement.parentElement;
    var elementId = parentTr.querySelector("td").innerText;
    users = loadUsers();
    if (elementId > -1) {
      users.splice(elementId, 1);
    }
    localStorage.setItem('users', JSON.stringify(users));
    location.reload();
}

function editUser(event) {
  parentTr = event.target.parentElement.parentElement;
  var elementId = parentTr.querySelector("td").innerText;
  window.location.href = '/ajouter-utilisateur.html?id='+elementId;
}


var template = document.getElementById("user-list-row");
var tbody = document.querySelector("tbody");
var users = loadUsers();
users.forEach( (user,i) => renderRow(template, tbody, user,i));
