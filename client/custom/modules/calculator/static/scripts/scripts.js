

document.querySelectorAll('input[name="input-type"]').forEach(radio => {
    radio.addEventListener('change', toggleParameters);
});
document.getElementById('add-gap').addEventListener('change', toggleGapEntry);
document.getElementById('custom-glass-round').addEventListener('change', toggleRoundGlassEntry);
document.getElementById('custom-glass-triangle').addEventListener('change', toggleTriangleGlassEntry);

function toggleParameters() {
    const inputType = document.querySelector('input[name="input-type"]:checked').value;
    document.getElementById('zebra-parameters').style.display = inputType === 'zebra' ? 'block' : 'none';
    document.getElementById('round-parameters').style.display = inputType === 'round' ? 'block' : 'none';
    document.getElementById('triangle-parameters').style.display = inputType === 'triangle' ? 'block' : 'none';
    document.getElementById('lift-parameters').style.display = inputType === 'lift' ? 'block' : 'none';

    toggleRoundGlassEntry();
    toggleTriangleGlassEntry();
}

function toggleGapEntry() {
    document.getElementById('gap-size').disabled = !document.getElementById('add-gap').checked;
}

function toggleRoundGlassEntry() {
    const roundCustom = document.getElementById('custom-glass-round');
    const roundSymbol = document.getElementById('round-symbol');
    roundSymbol.disabled = roundCustom.checked;
    document.getElementById('glass-size-round').disabled = !roundCustom.checked;
}

function toggleTriangleGlassEntry() {
    const triangleCustom = document.getElementById('custom-glass-triangle');
    const triangleSide = document.getElementById('triangle-side');
    triangleSide.disabled = triangleCustom.checked;
    document.getElementById('glass-size-triangle').disabled = !triangleCustom.checked;
}

function validateNumberInput(id) {
    const input = document.getElementById(id);
    if (!input.value.trim()) {
        console.log(`${id} is empty.`);
        displayFloatingErrorMessage('Please enter valid' + input.labels[0].innerText.toLowerCase());
        input.classList.add('error');
        return false;
    }
    const value = parseFloat(input.value);
    if (isNaN(value) || value <= 0) {
        console.log(`${id} is not a positive number.`);
        displayFloatingErrorMessage(input.labels[0].innerText + ' must be a positive number');
        input.classList.add('error');
        return false;
    }
    input.classList.remove('error');
    return true;
}

function validateSelectInput(id) {
    const select = document.getElementById(id);
    if (!select.value.trim()) {
        console.log(`${id} is not selected.`);
        displayFloatingErrorMessage('Please select a ' + select.labels[0].innerText.toLowerCase());
        return false;
    }
    return true;
}
function validateColorPicker() {
    const colorRadios = document.querySelectorAll('input[name="color-picker"]');
    let isColorSelected = false;

    colorRadios.forEach(radio => {
        if (radio.checked) {
            isColorSelected = true;
        }
    });

    if (!isColorSelected) {
        console.log("No color selected.");
        displayFloatingErrorMessage('Please select a color');
        return false;
    }

    return true;
}


function validateRadioInput(name) {
    const radioButtons = document.querySelectorAll(`input[name="${name}"]`);
    let checked = false;
    radioButtons.forEach(button => {
        if (button.checked) {
            checked = true;
        }
    });
    if (!checked) {
        console.log(`No ${name} radio button selected.`);
        displayFloatingErrorMessage('Please select an ' + name.toLowerCase());
        return false;
    }
    return true;
}

function validateGapInput() {
    const addGapCheckbox = document.getElementById('add-gap');
    const gapSizeInput = document.getElementById('gap-size');

    if (addGapCheckbox.checked && !gapSizeInput.value.trim()) {
        displayFloatingErrorMessage('Please enter valid gap size');
        gapSizeInput.classList.add('error');
        return false;
    } else if (addGapCheckbox.checked && isNaN(gapSizeInput.value)) {
        displayFloatingErrorMessage('Gap size must be a number');
        gapSizeInput.classList.add('error');
        return false;
    }
    gapSizeInput.classList.remove('error');
    return true;
}

function validateGlassInput() {
    const glassCheckbox = document.getElementById('custom-glass-round');
    const glassSizeInput = document.getElementById('glass-size-round');

    if (glassCheckbox.checked && !glassSizeInput.value.trim()) {
        displayFloatingErrorMessage('Please enter valid glass size');
        glassSizeInput.classList.add('error');
        return false;
    } else if (glassCheckbox.checked && isNaN(glassSizeInput.value)) {
        displayFloatingErrorMessage('Glass size must be a number');
        glassSizeInput.classList.add('error');
        return false;
    }
    glassSizeInput.classList.remove('error');
    return true;
}

function validateGlassTriangleInput() {
    const glassCheckbox = document.getElementById('custom-glass-triangle');
    const glassSizeInput = document.getElementById('glass-size-triangle');

    if (glassCheckbox.checked && !glassSizeInput.value.trim()) {
        displayFloatingErrorMessage('Please enter valid glass size');
        glassSizeInput.classList.add('error');
        return false;
    } else if (glassCheckbox.checked && isNaN(glassSizeInput.value)) {
        displayFloatingErrorMessage('Glass size must be a number');
        glassSizeInput.classList.add('error');
        return false;
    }
    glassSizeInput.classList.remove('error');
    return true;
}

function clearInactiveFields() {
    if (document.getElementById('zebra-parameters').style.display !== 'block') {
        document.getElementById('zebra-length').value = '';
        document.getElementById('zebra-width').value = '';
        document.getElementById('add-gap').checked = false;
        document.getElementById('gap-size').value = '';
    } else {
        if (!document.getElementById('add-gap').checked) {
            document.getElementById('gap-size').value = '';
        }
    }

    if (document.getElementById('round-parameters').style.display !== 'block') {
        document.getElementById('round-symbol').value = '';
        document.getElementById('custom-glass-round').checked = false;
        document.getElementById('glass-size-round').value = '';
    } else {
        if (!document.getElementById('custom-glass-round').checked) {
            document.getElementById('glass-size-round').value = '';
        } else {
            document.getElementById('round-symbol').value = '';
        }
    }

    if (document.getElementById('triangle-parameters').style.display !== 'block') {
        document.getElementById('triangle-side').value = '';
        document.getElementById('custom-glass-triangle').checked = false;
        document.getElementById('glass-size-triangle').value = '';
    } else {
        if (!document.getElementById('custom-glass-triangle').checked) {
            document.getElementById('glass-size-triangle').value = '';
        } else {
            document.getElementById('triangle-side').value = '';
        }
    }

    if (document.getElementById('lift-parameters').style.display !== 'block') {
        document.getElementById('lift-length').value = '';
        document.getElementById('lift-width').value = '';
        document.getElementById('lift-height').value = '';
        document.getElementById('lift-capacity').value = '';
    }
}

function clearErrorMessages() {
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(message => {
        message.style.display = 'none';
    });

    const errorFields = document.querySelectorAll('.error');
    errorFields.forEach(field => {
        field.classList.remove('error');
    });
}

function displayFloatingErrorMessage(message) {
    const floatingError = document.getElementById('floating-error');
    floatingError.innerText = message;
    floatingError.style.display = 'block';
    setTimeout(() => {
        floatingError.style.display = 'none';
    }, 3000);
}

function showFloatingMessage(message, color) {
    const floatingError = document.getElementById('floating-error');
    floatingError.innerText = message;
    floatingError.style.backgroundColor = color;
    floatingError.style.display = 'block';
    setTimeout(() => {
        floatingError.style.display = 'none';
    }, 3000);
}

function clearResultsTable() {
    const resultBody = document.getElementById('result-body');
    resultBody.innerHTML = '';
}

function resetEntries() {
    clearResultsTable();
    document.getElementById('spot-illuminance').value = '';
    document.getElementById('working-height').value = '';
    document.querySelectorAll('input[name="color-picker"]').forEach(radio => {
        radio.checked = false;
    });
    document.querySelectorAll('input[name="input-type"]').forEach(radio => {
        radio.checked = false;
    });
    document.getElementById('zebra-length').value = '';
    document.getElementById('zebra-width').value = '';
    document.getElementById('round-symbol').value = '';
    document.getElementById('triangle-side').value = '';
    document.getElementById('lift-length').value = '';
    document.getElementById('lift-width').value = '';
    document.getElementById('lift-height').value = '';
    document.getElementById('lift-capacity').value = '';

    document.getElementById('add-gap').checked = false;
    document.getElementById('custom-glass-round').checked = false;
    document.getElementById('glass-size-round').value = '';
    document.getElementById('custom-glass-triangle').checked = false;
    document.getElementById('glass-size-triangle').value = '';
    document.getElementById('result-body').innerHTML = '';

    clearErrorMessages();
}

function showInfo() {
    alert('Information button clicked');
}

function submitInput() {
    clearErrorMessages();
    clearInactiveFields();
    let valid = true;
    let errors = [];
    if (!validateNumberInput('spot-illuminance')) {
        valid = false;
        errors.push('spot-illuminance');
    }
    if (!validateNumberInput('working-height')) {
        valid = false;
        errors.push('working-height');
    }
    if (!validateColorPicker()) {
        valid = false;

    }
    if (!validateRadioInput('input-type')) {
        valid = false;
        errors.push('input-type');
    }

    if (document.getElementById('zebra-parameters').style.display === 'block') {
        if (!validateNumberInput('zebra-length')) {
            valid = false;
            errors.push('zebra-length');
        }
        if (!validateNumberInput('zebra-width')) {
            valid = false;
            errors.push('zebra-width');
        }
        if (!validateGapInput()) {
            valid = false;
        }
    }
    if (document.getElementById('round-parameters').style.display === 'block') {
        if (!document.getElementById('custom-glass-round').checked) {
            if (!validateNumberInput('round-symbol')) {
                valid = false;
                errors.push('round-symbol');
            }
        }
        if (!validateGlassInput()) {
            valid = false;
        }
    }

    if (document.getElementById('triangle-parameters').style.display === 'block') {
        if (!document.getElementById('custom-glass-triangle').checked) {
            if (!validateNumberInput('triangle-side')) {
                valid = false;
                errors.push('triangle-side');
            }
        }
        if (!validateGlassTriangleInput()) {
            valid = false;
        }
    }

    if (document.getElementById('lift-parameters').style.display === 'block') {
        if (!validateNumberInput('lift-length')) {
            valid = false;
            errors.push('lift-length');
        }
        if (!validateNumberInput('lift-width')) {
            valid = false;
            errors.push('lift-width');
        }
        if (!validateNumberInput('lift-height')) {
            valid = false;
            errors.push('lift-height');
        }
        if (!validateNumberInput('lift-capacity')) {
            valid = false;
            errors.push('lift-capacity');
        }
    }

    if (valid) {
        const data = {};
        const resultBody = document.getElementById('result-body');
        const newRow = document.createElement('tr');
        const selectedColor = document.querySelector('input[name="color-picker"]:checked');
        const colorValue = selectedColor ? selectedColor.value : 'N/A';

        const inputType = document.querySelectorAll('input[name="input-type"]');
        inputType.forEach(radio => {
            if (radio.checked) {
                data.inputType = radio.value;
            }
        });
        let zebra = [];

        data.spotIlluminance = getValueOrDefault('spot-illuminance');
        data.height = getValueOrDefault('working-height');
        data.color = colorValue;

        data.zebraLength = getValueOrDefault('zebra-length');
        data.zebraWidth = getValueOrDefault('zebra-width');
        data.addGap = document.getElementById('add-gap').checked;
        data.gap = data.addGap ? getValueOrDefault('gap-size') : 'None';
        zebra.push(parseFloat(data.zebraLength));
        zebra.push(parseFloat(data.zebraWidth));
        data.zebra = zebra;

        data.realSize = getValueOrDefault('round-symbol');
        data.customGlassRound = document.getElementById('custom-glass-round').checked;
        data.glassSizeRound = data.customGlassRound ? getValueOrDefault('glass-size-round') : 'None';


        data.triangleSide = getValueOrDefault('triangle-side');
        data.customGlassTriangle = document.getElementById('custom-glass-triangle').checked;
        data.glassSizeTriangle = data.customGlassTriangle ? getValueOrDefault('glass-size-triangle') : 'None';

        data.liftLength = getValueOrDefault('lift-length');
        data.liftWidth = getValueOrDefault('lift-width');
        data.liftHeight = getValueOrDefault('lift-height');
        data.liftLiftingHeight = getValueOrDefault('lift-capacity');


        return data;

    } else {
        if (errors.length > 0) {
            const errorElement = document.getElementById(errors[0]);
            if (errorElement && errorElement.labels && errorElement.labels.length > 0) {
                displayFloatingErrorMessage('Please enter valid ' + errorElement.labels[0].innerText.toLowerCase());
                errorElement.classList.add('error');
            }
        }
    }
}

function getValueOrDefault(id) {
    const element = document.getElementById(id);
    return element ? (element.value.trim() !== '' ? element.value : 'None') : 'None';
}

window.showInfo = showInfo;
window.resetEntries = resetEntries;
