var searchField = document.getElementById("search");
  searchField.addEventListener("keydown", busquedaCambio);
  var datalist = document.getElementById("result");
  function busquedaCambio(event) {
    if (event.key == "Enter") {
      var option = document.getElementsByClassName("datalistOption")[0];
      document.getElementById("type").value = option.getAttribute("data-type");
      document.getElementById("id").value = option.getAttribute("data-id");
    } else {
      fetch(`/search?query=${event.target.value}&id=$`, {
        method: "GET"
      }).then(response => response.json()).then(json => {
        datalist.innerHTML = ""
        json.albums.forEach(element => {
          var option = document.createElement("option");
          option.className = "datalistOption"
          option.setAttribute("data-id", element.id);
          option.setAttribute("data-type", "albums");
          option.text = element.name;
          datalist.appendChild(option);
        })
        json.artists.forEach(element => {
          var option = document.createElement("option");
          option.className = "datalistOption"
          option.setAttribute("data-id", element.id);
          option.setAttribute("data-type", "artists");
          option.text = element.name;
          datalist.appendChild(option);
        })
        json.genre.forEach(element => {
          var option = document.createElement("option");
          option.className = "datalistOption"
          option.setAttribute("data-id", element.id);
          option.setAttribute("data-type", "genres");
          option.text = element.name;
          datalist.appendChild(option);
        })
      })
    }
  }
  function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
  }