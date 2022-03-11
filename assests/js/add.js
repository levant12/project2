const saveBtn = document.getElementById("save-btn");
const prodType = document.getElementById("productType");
const formChildNodes = document.getElementById("addProduct").childNodes;

// set dropdown menu default value
$(document).ready(function () {
  $("#productType").val("dvd");
});

// change form according to dropdown menu
const products = {
  furniture: {
    value: "furniture",
    elementId: "fInfo",
    descriptionId: "height width lenght",
  },
  book: {
    value: "book",
    elementId: "bInfo",
    descriptionId: "weight",
  },
  dvd: {
    value: "dvd",
    elementId: "dInfo",
    descriptionId: "size",
  },
};

const changeForm = () => {
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

// validate description
const checkDescr = (ids) => {
  for (let i = 0; i < ids.length; i++) {
    if (document.getElementById(ids[i]).value === "") {
      return true;
    }
  }
  return false;
};

const emptyInput = () => {
  // get elements from html
  const sku = document.getElementById("sku");
  const name = document.getElementById("name");
  const price = document.getElementById("price");
  const type = prodType.options[prodType.selectedIndex].value;
  const productValueObject = products[type];
  const ids = productValueObject.descriptionId.split(" ");
  if (
    sku.value === "" ||
    name.value === "" ||
    price.value === "" ||
    checkDescr(ids)
  ) {
    return true;
  }
  return false;
};

const invalidSKU = () => {
  const sku = document.getElementById("sku");
  var format = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
  if (format.test(sku.value)) return true;
  return false;
};

// validate input
saveBtn.addEventListener("click", function (e) {
  if (emptyInput()) {
    e.preventDefault();
    // create new label for warning text
    var label = document.createElement("label");
    label.htmlFor = "warning";
    label.innerHTML = "Please fill every field";
    label.classList.add("warning");
    // check if user is already warned
    if (
      formChildNodes[formChildNodes.length - 1].tagName != "LABEL" ||
      formChildNodes[formChildNodes.length - 1].textContent ===
        "Please provide SKU without symbols"
    ) {
      document
        .getElementById("addProduct")
        .replaceChild(label, formChildNodes[formChildNodes.length - 1]);
    }
  } else if (invalidSKU()) {
    e.preventDefault();
    // create new label for warning text
    var label = document.createElement("label");
    label.htmlFor = "warning";
    label.innerHTML = "Please provide SKU without symbols";
    label.classList.add("warning");
    // check if user is already warned
    if (
      formChildNodes[formChildNodes.length - 1].tagName != "LABEL" ||
      formChildNodes[formChildNodes.length - 1].textContent ===
        "Please fill every field"
    ) {
      document
        .getElementById("addProduct")
        .replaceChild(label, formChildNodes[formChildNodes.length - 1]);
    }
  }
});
