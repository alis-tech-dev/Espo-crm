export class Projector {
    constructor(name, lens, price, angle, glassDistance, lightArea, illuminate, glassSize) {
        this.name = name;
        this.lens = lens;
        this.price = price;
        this.angle = angle;
        this.glassDistance = glassDistance;
        this.lightArea = lightArea;
        this.illuminate = illuminate;
        this.glassSize = glassSize;

        this.liftHeight = null;
        this.resultColor = null;
    }

    static height = null;
    static realSize = null;
    static spotIlluminance = null;
    static color = null;
    static gap = null;
    static triangleSide = null;
    static load = null;
    static glassSizeRound = null;
    static glassSizeTriangle = null;
    static customGlassRound = false;
    static customGlassTriangle = false;
    static zebra = null
    static zebraLength = null;
    static zebraWidth = null;
    static input = null;

    toString() {
        return `Name: ${this.name}, Lens: ${this.lens}, Glass size: ${this.glassSize}, Price: ${this.price}`;
    }

    getRealSize(height = null, glassSize = null) {
        const realHeight = height || Projector.height;
        const glass = glassSize || this.glassSize;
        return parseFloat((glass * (this.angle * (realHeight / 1000) + this.glassDistance)).toFixed(0));
    }

    getColors() {
        if (Projector.height) {
            const white = this.lightArea * Math.pow((Projector.height / 1000), this.illuminate);
            const yellow = white * 0.85;
            const blue = white * 0.11;
            const red = white * 0.07;
            const colors = { white, yellow, blue, red };
            for (let key in colors) {
                colors[key] = Math.round(colors[key]);
            }
            return colors;
        }
    }

    get spotlightBright() {
        if (Projector.color && Projector.spotIlluminance) {
            return this.getColors()[Projector.color];
        }
    }

    getRoundSymbolToGlass() {
        return this.getGlassSymbolSize() <= this.glassSize;
    }

    get triangle() {
        const glassSize = this.getGlassSymbolSize(Projector.triangleSide);
        if (glassSize) {
            const triangleSide = (this.glassSize / 2) * Math.sqrt(3);
            return glassSize < triangleSide ? glassSize : null;
        }
    }

    getGlassSymbolSize(realSize = null) {
        let height = Projector.height;
        if (Projector.input === "lift") {
            height = this.topLoadHeight
        }
        const radians = this.angle * (height / 1000) + this.glassDistance;
        if (realSize) {
            return parseFloat((realSize / radians).toFixed(1));
        } else if (Projector.realSize) {
            return parseFloat((Projector.realSize / radians).toFixed(1));
        }
    }

    getZebraToGlass() {
        return Math.hypot(this.zebraLength, this.zebraWidth) < this.getRealSize();
    }

    getRectangle(rectangle = null) {
        const rect = rectangle || [this.zebraLength, this.zebraWidth];
        return rect.map(size => this.getGlassSymbolSize(size));
    }

    getZebraSizeList(zebra) {
        this.zebraWidth = zebra[1];

        for (let index = 1; index < 1000; index++) {
            this.zebraLength = zebra[0] / index;
            if (Projector.gap) {
                this.zebraLength -= (Projector.gap / index) * (index - 1);
            }
            if (this.getZebraToGlass()) {
                if (this.getRectangle()) {
                    return this.getRectangle().concat(index);
                }
            }
        }
    }

    get topLoadHeight() {
        let height = 0
        if (Projector.load) {
            height =  Projector.height - (Projector.load[2] + Projector.load[3]);
        } else {
        height = Projector.height;
        }
        return height
    }

    getLift(lengthDivider, widthDivider) {
        const loadLength = Projector.load[0] / lengthDivider;
        const loadWidth = Projector.load[1] / widthDivider;
        const diameter = Math.hypot(loadLength, loadWidth);
        return diameter < this.getRealSize(this.topLoadHeight);
    }

    getLiftGlassSize() {
        for (let count = 1; count <= 4; count++) {
            if (count === 3) {
                count += 1;
            }
            if (count === 1) {
                this.liftHeight = Projector.height;
            } else {
                const diameter = this.getRealSize();
                const radius = diameter / 2;
                const side = Math.hypot(Projector.height, radius);
                const bigSide = side * 2;
                this.liftHeight = Math.round(Math.sqrt(Math.pow(bigSide, 2) - Math.pow(diameter, 2)));

            }

            const result = this.getLoadGlassSize(count);
            if (result) {
                return result;
            }
        }
    }
    getLoadGlassSize(quantity) {
    let lengthDivider = 1;
    let widthDivider = 1;
    if (quantity === 2) {
        lengthDivider += 1;
    } else if (quantity === 4) {
        lengthDivider += 1;
        widthDivider += 1;
    }
    if (this.getLift(lengthDivider, widthDivider)) {
        let glassSymbol = this.getRectangle([Projector.load[0], Projector.load[1]]);
        const dividers = [lengthDivider, widthDivider];
        glassSymbol = glassSymbol.map((symbol, index) => parseFloat((symbol / dividers[index]).toFixed(1)));
        if (this.glassSize > Math.hypot(glassSymbol[0], glassSymbol[1])) {
            return glassSymbol.concat([parseFloat((this.getRealSize() / 20).toFixed(1)), quantity]);
        }
    }
}
}
export default Projector;



