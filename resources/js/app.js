// Minimal JS. Forms use native validation + server-side.
document.querySelectorAll('[data-mobile-menu-toggle]').forEach((btn) => {
  btn.addEventListener('click', () => {
    const panel = document.getElementById('mobile-menu');
    if (panel) panel.classList.toggle('hidden');
  });
});
