lottie.loadAnimation({
  container: document.getElementById('lottie-container'),
  renderer: 'svg',
  loop: true,
  autoplay: true,
  path: '../assets/book.json'
});

const passwordInput = document.getElementById('password');
const passwordToggle = document.getElementById('togglePassword');

passwordToggle.addEventListener('click', function() {
  const type=passwordInput.type==='password'?'text':'password';
  passwordInput.type=type;
  this.classList.toggle('fa-eye');
  this.classList.toggle('fa-eye-slash');
});