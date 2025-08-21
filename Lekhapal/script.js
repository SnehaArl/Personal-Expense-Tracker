 function openSidebar() {
  document.getElementById("aside").style.width = "70%";
      }

  function closeSidebar() {
  document.getElementById("aside").style.width = "0";
  }

  //validation for income form
document.getElementById("addIncomeForm").addEventListener("submit", function(e) {
    let isValid = true;
    let errors = [];

    // Amount check
    let amount = document.getElementById("income_amt").value.trim();
    if (amount === "" || !/^[0-9]+(\.[0-9]{1,2})?$/.test(amount)) {
        isValid = false;
        errors.push("Enter a valid income amount (numbers only, max 2 decimals).");
    }

    // Description check
    let description = document.getElementById("inc_description").value.trim();
    if (description === "") {
        isValid = false;
        errors.push("Income description cannot be empty.");
    }

    // Date check
    let today = new Date().toISOString().split("T")[0]; 
    let selectedDate = document.getElementById("date").value;
    if (selectedDate === "" || selectedDate < today) {
        isValid = false;
        errors.push("Income date cannot be in the past.");
    }

    if (!isValid) {
        e.preventDefault();
        alert(errors.join("\n"));
    }
});

document.getElementById("addExpenseForm").addEventListener("submit", function(e) {
    let isValid = true;
    let errors = [];

    // Amount check
    let amount = document.getElementById("expense_amt").value.trim();
    if (amount === "" || !/^[0-9]+(\.[0-9]{1,2})?$/.test(amount)) {
        isValid = false;
        errors.push("Enter a valid income amount (numbers only, max 2 decimals).");
    }

    // Description check
    let description = document.getElementById("exp_description").value.trim();
    if (description === "") {
        isValid = false;
        errors.push("Income description cannot be empty.");
    }

    // Date check
    let today = new Date().toISOString().split("T")[0]; 
    let selectedDate = document.getElementById("date").value;
    if (selectedDate === "" || selectedDate < today) {
        isValid = false;
        errors.push("Income date cannot be in the past.");
    }

    if (!isValid) {
        e.preventDefault();
        alert(errors.join("\n"));
    }
});

