
  function liveSearch() {
    var searchQuery = document.getElementById('searchBar').value;

    // Check if search input is not empty
    if (searchQuery.length > 0) {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          document.getElementById('searchResults').innerHTML = xhr.responseText;
        }
      };
      xhr.open("GET", "search.php?query=" + searchQuery, true);
      xhr.send();
    } else {
      // Clear search results if input is empty
      document.getElementById('searchResults').innerHTML = "";
    }
  }

