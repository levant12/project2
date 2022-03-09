// set dropdown menu default value
$(document).ready(function () {
  $("#productType").val("dvd");
});

// change form according to dropdown menu
const products = {
  furniture: {
    value: "furniture",
    elementId: "fInfo",
  },
  book: {
    value: "book",
    elementId: "bInfo",
  },
  dvd: {
    value: "dvd",
    elementId: "dInfo",
  },
};

const changeForm = () => {
  const prodType = document.getElementById("productType");
  const type = prodType.options[prodType.selectedIndex].value;

  // manipulate ui after
  for (const key in products) {
    const productValueObject = products[key];

    if (type === productValueObject.value) {
      document
        .getElementById(productValueObject.elementId)
        .classList?.remove("hidden");
    } else {
      document
        .getElementById(productValueObject.elementId)
        .classList?.add("hidden");
    }
  }
};
