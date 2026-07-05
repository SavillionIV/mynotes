const searchBar = document.getElementById('searchBar');
const resultsList = document.getElementById('resultsList');
const listItems = resultsList.getElementsByTagName('li');

searchBar.addEventListener('keyup', () => {
  const query = searchBar.value.toLowerCase();

  for (let i = 0; i < listItems.length; i++) {
    const itemText = listItems[i].textContent.toLowerCase();
    listItems[i].style.display = itemText.includes(query) ? '' : 'none';
  }
});