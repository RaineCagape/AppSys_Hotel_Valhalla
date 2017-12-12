<script>
var myIndex = 0,
    container = document.getElementsByClassName('story_image')[0];

carousel();

function carousel() {
  var i,
      el,
      x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.opacity = "0";
  }
  myIndex++;
  if (myIndex > x.length) {
    myIndex = 1
  }
  el = x[myIndex - 1];
  container.style.height = el.height + 'px';
  setTimeout(function() {
    el.style.opacity = "1";
    setTimeout(carousel, 3000);
  },500);
}
</script>