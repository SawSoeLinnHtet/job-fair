let menu = document.querySelector(".menu")
let sideBar = document.querySelector("#sidebar")
let mainContent = document.querySelector("#home-wrap")

menu.onclick = () => {
  console.log("hello")
  sideBar.classList.toggle("active")
  mainContent.classList.toggle("active")
}

let nav_btn = document.querySelector(".nav-btn")
let menu_btn = document.querySelector(".menu-btn")
let cancel_btn = document.querySelector(".cancel-btn")

nav_btn.onclick = () => {
  let nav_menu = document.querySelector(".nav-menu")
  menu_btn.classList.toggle("fade")
  cancel_btn.classList.toggle("fade")
  nav_menu.classList.toggle("active")
}

