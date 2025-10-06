// Dark mode toggle
const darkToggle = document.createElement('button');
darkToggle.textContent = '🌙 Dark Mode';
darkToggle.className = 'btn btn-primary';
darkToggle.style.position = 'fixed';
darkToggle.style.bottom = '24px';
darkToggle.style.right = '24px';
darkToggle.style.zIndex = '1000';
darkToggle.style.boxShadow = '0 4px 16px rgba(44,62,80,0.18)';
darkToggle.style.opacity = '0.92';
darkToggle.style.borderRadius = '50px';
darkToggle.style.padding = '0.7rem 1.5rem';
darkToggle.style.fontSize = '1.1rem';
darkToggle.style.transition = 'background 0.3s, color 0.3s';
document.body.appendChild(darkToggle);

function setDarkButtonStyle(isDark) {
  if (isDark) {
    darkToggle.style.background = '#23272f';
    darkToggle.style.color = '#ffe066';
    darkToggle.textContent = '☀️ Light Mode';
    darkToggle.style.border = '1.5px solid #ffe066';
  } else {
    darkToggle.style.background = '#ffe066';
    darkToggle.style.color = '#23272f';
    darkToggle.textContent = '🌙 Dark Mode';
    darkToggle.style.border = '1.5px solid #23272f';
  }
}
setDarkButtonStyle(document.body.classList.contains('dark-mode'));

darkToggle.addEventListener('click', () => {
  document.body.classList.toggle('dark-mode');
  setDarkButtonStyle(document.body.classList.contains('dark-mode'));
});

// Newsletter form interaction
const newsletterForm = document.querySelector('#newsletter form');
if (newsletterForm) {
  newsletterForm.addEventListener('submit', function(e) {
    e.preventDefault();
    // Remove previous notification if any
    const prevNotif = newsletterForm.querySelector('.notif');
    if (prevNotif) prevNotif.remove();

    const notif = document.createElement('div');
    notif.className = 'notif';
    notif.textContent = '🎉 Terima kasih telah berlangganan!';
    notif.style.marginTop = '1rem';
    notif.style.background = document.body.classList.contains('dark-mode') ? '#23272f' : '#d4edda';
    notif.style.color = document.body.classList.contains('dark-mode') ? '#ffe066' : '#155724';
    notif.style.padding = '0.85rem 1.2rem';
    notif.style.borderRadius = '12px';
    notif.style.fontWeight = 'bold';
    notif.style.textAlign = 'center';
    notif.style.fontSize = '1.08rem';
    notif.style.boxShadow = '0 2px 12px rgba(44,62,80,0.13)';
    notif.style.letterSpacing = '0.5px';
    notif.style.transition = 'background 0.3s, color 0.3s';

    newsletterForm.appendChild(notif);

    newsletterForm.reset();
    setTimeout(() => notif.remove(), 3000);
  });

  // Update notif color on dark mode toggle
  const observer = new MutationObserver(() => {
    const notif = newsletterForm.querySelector('.notif');
    if (notif) {
      notif.style.background = document.body.classList.contains('dark-mode') ? '#23272f' : '#d4edda';
      notif.style.color = document.body.classList.contains('dark-mode') ? '#ffe066' : '#155724';
    }
  });
  observer.observe(document.body, { attributes: true, attributeFilter: ['class'] });
}