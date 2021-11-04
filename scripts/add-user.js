var submitFunction;

function loadUsers() {
  var users = localStorage.getItem('users');
  if (users === undefined || users === null || users === "") {
    users = [];
  } else {
    users = JSON.parse(users);
  }
  return users;
}

function getUserById(userId) {
  if (userId === null || userId < 0 )
    return null;
  var users = loadUsers();
  return users[+userId];
}

function addUser(event) {
  event.preventDefault();
  const formData = new FormData(document.getElementById('add-user-form'));
  var users = loadUsers();

  user = {};

  for (var pair of formData.entries()) {
    user[pair[0]] = pair[1];
  }
  users.push(user);
  localStorage.setItem('users', JSON.stringify(users));
  window.location.href = '/';
}

function editUser(event, userId) {
  event.preventDefault();
  const formData = new FormData(document.getElementById('add-user-form'));
  var users = loadUsers();
  user = {};
  for (var pair of formData.entries()) {
    user[pair[0]] = pair[1];
  }
  users.splice(userId, 1, user);
  localStorage.setItem('users', JSON.stringify(users));
  window.location.href = '/liste-utilisateur.html';
}


function renderEditForm(user) {
  document.getElementById('form-firstname').value = user['firstname'];
  document.getElementById('form-lastname').value = user['lastname'];
  document.getElementById('form-email').value = user['email'];
  document.getElementById('form-title').innerText = "Editer un utilisateur:";
}

function getIdParam() {
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  return urlParams.get("id");
}

userId = getIdParam();
user = getUserById(userId);

if (getUserById(userId) === null || getUserById(userId) == undefined) {
  submitFunction = addUser;
} else {
  submitFunction = (event) => editUser(event,userId);
  renderEditForm(getUserById(userId));
}