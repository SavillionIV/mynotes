  <!-- Optional: Script to filter list -->
  <script>
    function myFunction() {
      let input = document.getElementById("mySearch");
      let filter = input.value.toUpperCase();
      let ul = document.getElementById("myMenu");
      let li = ul.getElementsByTagName("li");

      for (let i = 0; i < li.length; i++) {
        let a = li[i].getElementsByTagName("a")[0];
        let txtValue = a.textContent || a.innerText;
        li[i].style.display = txtValue.toUpperCase().indexOf(filter) > -1 ? "" : "none";
      }
    }
  </script>