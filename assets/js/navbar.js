const toggleButton = document.getElementById('toggle-button');
const navList = document.getElementById('nav');

const hide = () => {
  navList.classList.remove('active');
}

toggleButton.addEventListener('click', event => {
  event.stopPropagation()
  navList.classList.toggle('active');
})

const handleClosure = event => !navList.contains(event.target) && hide()

window.addEventListener('click', handleClosure)
window.addEventListener('focusin', handleClosure)