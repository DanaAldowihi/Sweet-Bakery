// Manar Alzahrani - admin.php 
// for account box and edit form pop up window
let navbar = document.querySelector('.headertop .navbartop');
let accountBox = document.querySelector('.headertop .account-boxtop');

document.querySelector('#user-btn').onclick = () =>{
   accountBox.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   accountBox.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
};

document.querySelector('#close-edit').onclick = () =>{
   document.querySelector('.edit-form-container').style.display = 'none';
   window.location.href = 'admin.php';
};