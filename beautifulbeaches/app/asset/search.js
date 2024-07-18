document.getElementById('search-btn').addEventListener('click', search);

document.getElementById('search-input').addEventListener('keypress', function(event) {
  if (event.key === 'Enter') {
    search();
  }
});

document.getElementById('clear-btn').addEventListener('click', function() {
  document.getElementById('search-input').value = '';
  var items = document.querySelectorAll('.gallery-item');

  items.forEach(function(item) {
    item.style.display = '';
  });
});

function search() {
  var query = document.getElementById('search-input').value.toLowerCase();
  var items = document.querySelectorAll('.gallery-item');
  var titles = document.querySelectorAll('.slider-title');
  var locations = document.querySelectorAll('.slider-text');

  items.forEach(function(item, index) {
    if (titles[index].textContent.toLowerCase().includes(query) || 
        locations[index].textContent.toLowerCase().includes(query)) {
      item.style.display = '';
    } else {
      item.style.display = 'none';
    }
  });
}