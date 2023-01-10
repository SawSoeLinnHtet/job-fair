let menu = document.querySelector(".menu")
let sideBar = document.querySelector(".sidebar")
let mainContent = document.querySelector(".main-content")

menu.onclick = () => {
  sideBar.classList.toggle("active")
  mainContent.classList.toggle("active")
}

$(document).ready(function() {
  $('.dropbtn').click(function () {
    $(this).siblings('.dropdown-content').toggleClass('dropon');
    that = this
    setTimeout(function () {
      $(that).siblings('.dropdown-content').removeClass('dropon')
    }, 5000);
  });

  $('.previous-btn').click(function () {
    console.log("hello")
    window.history.go(-1);
    return false;
  })
})

