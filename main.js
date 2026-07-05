const searchInput = document.querySelector('#siteSearch');
if (searchInput) {
  searchInput.addEventListener('input', () => {
    const term = searchInput.value.toLowerCase();
    document.querySelectorAll('main section, aside').forEach(section => {
      section.style.display = section.textContent.toLowerCase().includes(term) ? '' : 'none';
    });
  });
}
