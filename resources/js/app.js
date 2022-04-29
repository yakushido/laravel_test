require('./bootstrap');

const opinion = document.getElementById('opinion');
const omit = document.getElementById('opinion_omit');
const full = document.getElementById('opinion_full');

opinion.addEventListener('mouseover', () => {
  omit.classList.toggle('active');
  full.classList.toggle('active');
});

