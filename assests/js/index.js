// varieble to store checked boxes
var checked = [];

var slideIndex = 1;

// slide controller
function showSlide(n, slideNameAny) {
  const slide = (element) => {
    const slides = document.getElementsByClassName(element);

    if (n > slides.length) {
      slideIndex = 1;
    }

    if (n < 1) {
      slideIndex = slides.length;
    }

    for (let i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }

    slides[slideIndex - 1].style.display = "block";
  };

  if (slideNameAny && Array.isArray(slideNameAny)) {
    slideNameAny.forEach((element) => slide(element));
    return;
  }

  slide(slideNameAny);
}

function plusSlide(n, type) {
  showSlide((slideIndex += n), type);
}

// Slider for desktop version, Slider for mobile version, Slider for tablet version
showSlide(slideIndex, ["slidesD", "slidesT", "slidesM"]);

function deleteButtonClickEvent() {
  // store checked boxes (get checkboxes values)
  checked = [].slice
    .apply(document.querySelectorAll("input[type=checkbox]"))
    .filter((c) => c.checked)
    .map((c) => c.value);
  // send to php file
  $.ajax({
    url: "includes/deleteInc.php",
    method: "post",
    data: { checked },
    success: function (res) {
      console.log(res);
    },
  });
  console.log("done");
  // reset checkboxes and reload page
  $(":checkbox").prop("checked", false);
  location.reload();
}
