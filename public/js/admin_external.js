let menu = document.querySelector(".menu")
let sideBar = document.querySelector(".sidebar")
let mainContent = document.querySelector(".main-content")

menu.onclick = () => {
  sideBar.classList.toggle("active")
  mainContent.classList.toggle("active")
}
