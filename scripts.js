document.addEventListener("DOMContentLoaded", function() {
    flatpickr("#reisezeitraum", {
        mode: "range",
        dateFormat: "Y-m-d"
    });

    const form = document.getElementById("urlaubsdatenForm");

    form.addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    form.querySelectorAll("input[required], select[required], textarea[required]").forEach(input => {
        input.addEventListener("input", function() {
            validateField(input);
        });
    });
});

function validateField(field) {
    const errorMessage = field.parentNode.querySelector(".error-message");

    if (!field.checkValidity()) {
        field.classList.add("invalid");
        errorMessage.textContent = field.validationMessage;
    } else {
        field.classList.remove("invalid");
        errorMessage.textContent = "";
    }
}

function validateForm() {
    let valid = true;

    document.querySelectorAll("input[required], select[required], textarea[required]").forEach(field => {
        validateField(field);
        if (!field.checkValidity()) {
            valid = false;
        }
    });

    return valid;
}

function addChild() {
    const container = document.getElementById("kinder-container");
    const childCount = container.querySelectorAll(".kind").length + 1;

    const childDiv = document.createElement("div");
    childDiv.classList.add("kind", "form-group");
    childDiv.innerHTML = `
        <label for="kind_name_${childCount}">Name des Kindes *</label>
        <input type="text" id="kind_name_${childCount}" name="kind_name[]" required>
        <span class="error-message"></span>
        <label>Geburtstag *</label>
        <div class="birthdate-selects">
            <select name="kind_geburtstag_tag[]" required>
                ${[...Array(31)].map((_, i) => `<option value="${i + 1}">${i + 1}</option>`).join('')}
            </select>
            <select name="kind_geburtstag_monat[]" required>
                ${[...Array(12)].map((_, i) => `<option value="${i + 1}">${i + 1}</option>`).join('')}
            </select>
            <select name="kind_geburtstag_jahr[]" required>
                ${[...Array(new Date().getFullYear() - 1899)].map((_, i) => `<option value="${new Date().getFullYear() - i}">${new Date().getFullYear() - i}</option>`).join('')}
            </select>
            <span class="error-message"></span>
        </div>
    `;
    container.appendChild(childDiv);
}
