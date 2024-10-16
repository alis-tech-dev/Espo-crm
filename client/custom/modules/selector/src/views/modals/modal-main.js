import Projector from "./modal-projectors.js";
import DATA, {LOAD_LENGTH_ADD, LOAD_WIDTH_ADD, TEXT} from "./settings.js";

function showInfo() {
    alert(TEXT);
}
export function calculate() {
    clearResultsTable();
    const data = submitInput();
    const load = [];
    load.push(parseFloat(data.liftLength) + LOAD_LENGTH_ADD);
    load.push(parseFloat(data.liftWidth) + LOAD_WIDTH_ADD);
    load.push(parseFloat(data.liftHeight));
    load.push(parseFloat(data.liftLiftingHeight));

    data.load = load;

    const inputHeight = parseFloat(data.height);
    Projector.realSize = parseFloat(data.realSize);
    Projector.spotIlluminance = parseFloat(data.spotIlluminance);
    Projector.color = data.color;
    Projector.gap = parseFloat(data.gap);
    Projector.triangleSide = parseFloat(data.triangleSide);
    Projector.load = data.load;
    Projector.glassSizeRound = parseFloat(data.glassSizeRound);
    Projector.glassSizeTriangle = parseFloat(data.glassSizeTriangle);
    Projector.customGlassRound = data.customGlassRound;
    Projector.customGlassTriangle = data.customGlassTriangle;
    Projector.zebraLength = (parseFloat(data.zebraLength));
    Projector.zebraWidth = (parseFloat(data.zebraWidth));
    Projector.zebra = data.zebra
    Projector.input = data.inputType



    const projectors = DATA.map(args => new Projector(...args));

    let result = [];
    projectors.forEach(char => {

        if (char.name.startsWith('3')) {
            Projector.height = inputHeight - 500;
        } else {
            Projector.height = inputHeight - 300;
        }

        let values = [char.name, char.lens, Projector.spotIlluminance, char.spotlightBright];
        let glassSize = char.getGlassSymbolSize();

        if (Projector.customGlassRound) {
            if (Projector.glassSizeRound <= char.glassSize) {
                let size = char.getRealSize(Projector.height, Projector.glassSizeRound);
                let sizeText = `~ ${size} mm`;
                values.push(char.price, sizeText);
                if (char.spotlightBright < Projector.spotIlluminance / 2) {
                    char.resultColor = "red";
                } else {
                    char.resultColor = "white";
                }
                values.push(char.resultColor);
            } else {
                return;
            }
        } else if (Projector.customGlassTriangle) {
            let maxGlassSymbolSize = Math.round(char.glassSize * 0.84);
            if (Projector.glassSizeTriangle <= maxGlassSymbolSize) {
                let size = char.getRealSize(Projector.height, Projector.glassSizeTriangle);
                let triangleSide = Math.round((size / 2) * Math.sqrt(3));
                let sizeText = `~ 3 * ${triangleSide} mm`;
                values.push(char.price, sizeText);
                if (char.spotlightBright < Projector.spotIlluminance / 2) {
                    char.resultColor = "red";
                } else {
                    char.resultColor = "white";
                }
                values.push(char.resultColor);
            } else {
                return;
            }

        } else if (glassSize && data.inputType === "round" && Projector.realSize) {
            if (char.getRoundSymbolToGlass()) {
                let sizeText = `~ ${glassSize} mm`;
                values.push(char.price, sizeText);
                if (char.spotlightBright < Projector.spotIlluminance / 2) {
                    char.resultColor = "red";
                } else {
                    char.resultColor = "white";
                }
                values.push(char.resultColor);
            } else {
                return;
            }
        } else if (char.triangle && data.inputType === "triangle" && Projector.triangleSide) {
            let sizeText = `~ ${char.triangle} * ${char.triangle} * ${char.triangle} mm`;
            values.push(char.price, sizeText);
                if (char.spotlightBright < Projector.spotIlluminance / 2) {
                    char.resultColor = "red";
                } else {
                    char.resultColor = "white";
                }
                values.push(char.resultColor);
        } else if (data.zebra && data.inputType === "zebra") {
            let size = char.getZebraSizeList(data.zebra);
            if (size) {
                let sizeText = `${size[2]} PJ * ${size[0]} x ${size[1]} mm`;
                values.push(char.price * size[2], sizeText);
                if (char.spotlightBright < Projector.spotIlluminance / 2) {
                    char.resultColor = "red";
                } else {
                    char.resultColor = "white";
                }
                values.push(char.resultColor);
            } else {
                return;
            }
        } else if (data.inputType === "lift") {
            if (char.getLiftGlassSize()) {
                let text = char.getLiftGlassSize();
                let distance = "";
                if (text[3] > 1) {
                    distance += `, dist: ${text[2]} cm`;
                }
                let sizeText = `${text[3]} * ${text[0]}(l) x ${text[1]}(w) mm${distance}`;
                values.push(char.price * text[3], sizeText);
                if (char.spotlightBright < Projector.spotIlluminance / 2) {
                    char.resultColor = "red";
                } else {
                    char.resultColor = "white";
                }
                values.push(char.resultColor);
            } else {
                return;
            }
        } else {
            return;
        }
        result.push(values);
    });
    result.sort((a, b) => b[3] - a[3]);

    const resultBody = document.getElementById('result-body');
    const tableHeaders = document.querySelectorAll('.result-th');
    let sortOrder = {};

    tableHeaders.forEach((header, index) => {
        header.addEventListener('mousedown', () => {
            header.classList.add('active-header');
        });

        header.addEventListener('mouseup', () => {
            header.classList.remove('active-header');
        });

        header.addEventListener('click', () => {
            clearResultsTable();
            const isNumericColumn = !isNaN(parseFloat(result[0][index]));
            const currentSortOrder = sortOrder[index] || 'asc';

            result.sort((a, b) => {
                const parseValue = (value) => {
                    if (value.includes("~")) {
                        return parseFloat(value.replace(/[^\d.-]/g, ''));
                    } else if (value.includes("PJ")) {
                        const match = value.match(/(\d+(\.\d+)?) PJ \* (\d+(\.\d+)?) x (\d+(\.\d+)?)/);
                        return match ? parseFloat(match[1]) : 0;
                    } else if (value.includes("*") && value.includes("~")) {
                        const match = value.match(/~ (\d+(\.\d+)?) \* (\d+(\.\d+)?) \* (\d+(\.\d+)?)/);
                        return match ? parseFloat(match[1]) : 0;
                    } else if (value.includes("(l)") && value.includes("(w)")) {
                        const match = value.match(/(\d+(\.\d+)?)\s*\*\s*(\d+(\.\d+)?)\(l\)\s*x\s*(\d+(\.\d+)?)\(w\)/);
                        return match ? parseFloat(match[1]) : 0;
                    } else if (value.includes("dist:")) {
                        const match = value.match(/dist:\s*(\d+(\.\d+)?)/);
                        return match ? parseFloat(match[1]) : 0;
                    } else {
                        return 0;
                    }
                };
                if (index === 5) {
                    const valueA = parseValue(a[index]);
                    const valueB = parseValue(b[index]);
                    return currentSortOrder === 'asc' ? valueA - valueB : valueB - valueA;
                } else {
                    if (isNumericColumn) {
                        return currentSortOrder === 'asc' ? parseFloat(a[index]) - parseFloat(b[index]) : parseFloat(b[index]) - parseFloat(a[index]);
                    } else {
                        return currentSortOrder === 'asc' ? a[index].localeCompare(b[index]) : b[index].localeCompare(a[index]);
                    }
                }
            });

            sortOrder[index] = currentSortOrder === 'asc' ? 'desc' : 'asc';
            result.forEach(item => {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${item[0]}</td>
                    <td>${item[1]}</td>
                    <td>${item[2]}</td>
                    <td>${item[3]}</td>
                    <td>${item[4]}</td>
                    <td>${item[5]}</td>
                    <td><button class="save-button-modal" id="${item[0]}-${item[1]}">Save</button></td>
                `;
                if (item[6] === "red") {
                    newRow.classList.add('red-row');
                } else if (item[5][0] === "1") {
                    newRow.classList.add('green-row');
                }
                resultBody.appendChild(newRow);
            });


        });
    });

    result.sort((a, b) => b[3] - a[3]);

    result.forEach(item => {
        const newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td>${item[0]}</td>
            <td>${item[1]}</td>
            <td>${item[2]}</td>
            <td>${item[3]}</td>
            <td>${item[4]}</td>
            <td>${item[5]}</td>
            <td><button class="save-button-modal" id="${item[0]}-${item[1]}">Save</button></td>
        `;
        if (item[6] === "red") {
            newRow.classList.add('red-row');
        } else if (item[5][0] === "1" && item[5][1] === " ") {
            newRow.classList.add('green-row');
        }
        resultBody.appendChild(newRow);
    });
}

window.showInfo = showInfo;
window.calculate = calculate;
