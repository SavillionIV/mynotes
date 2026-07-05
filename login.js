 <script>
// Get the modal
var modal = document.getElementById('id01');

//cancel button
document.querySelector('.cancelbtn').addEventListener('click', () => {
    window.location.href = 'index.html'; // or any page you'd like
});

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script> 