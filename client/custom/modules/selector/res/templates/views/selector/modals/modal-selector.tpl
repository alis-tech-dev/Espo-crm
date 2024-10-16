<div id="hello-world-modal" class="hello-world-modal">
    <div class="form-container">
        <div class="form-group">
            <label for="spot-illuminance">Spot Illuminance (lx):</label>
            <input type="number" id="spot-illuminance" required min="0" value="300">
            <div class="error-message" id="error-spot-illuminance">Please enter valid spot illuminance</div>
        </div>
        <div class="form-group">
            <label for="working-height">Working Height (mm):</label>
            <input type="number" id="working-height" required min="0" value="5000">
            <div class="error-message" id="error-working-height">Please enter valid working height</div>
        </div>
        <div class="form-group">
            <label>Color:</label>
            <div class="radio-group">
                <label for="color-red">
                    <input type="radio" id="color-red" name="color-picker" value="red">
                    <span class="color-picker red" data-tooltip="Red Color"></span>
                </label>

                <label for="color-blue">
                    <input type="radio" id="color-blue" name="color-picker" value="blue">
                    <span class="color-picker blue" data-tooltip="Blue Color"></span>
                </label>

                <label for="color-white">
                    <input type="radio" id="color-white" name="color-picker" value="white">
                    <span class="color-picker white" data-tooltip="White Color"></span>
                </label>

                <label for="color-yellow">
                    <input type="radio" id="color-yellow" name="color-picker" value="yellow">
                    <span class="color-picker yellow" data-tooltip="Yellow Color"></span>
                </label>
            </div>

            <div class="error-message" id="error-color">Please select a color</div>
        </div>
        <div class="form-group">
            <label>Symbol Type:</label>
            <div class="radio-group">
                <label for="zebra" title="zebra">
                    <input type="radio" id="zebra" name="input-type" value="zebra">
                    <img src="/client/custom/modules/calculator/static/images/zebra.png" alt="Zebra">
                </label>

                <label for="round" title="round">
                    <input type="radio" id="round" name="input-type" value="round">
                    <img src="/client/custom/modules/calculator/static/images/round.png" alt="Round">
                </label>

                <label for="triangle" title="triangle">
                    <input type="radio" id="triangle" name="input-type" value="triangle">
                    <img src="/client/custom/modules/calculator/static/images/triangle_n.png" alt="Triangle">
                </label>

                <label for="lift" title="lift">
                    <input type="radio" id="lift" name="input-type" value="lift">
                    <img src="/client/custom/modules/calculator/static/images/crane.png" alt="Lift">
                </label>
            </div>
            <div class="error-message" id="error-input-type">Please select an input type</div>
        </div>
        <div id="zebra-parameters" class="form-group">
            <label for="zebra-length">Length (mm):</label>
            <input type="number" id="zebra-length" class="error" min="0">
            <div class="error-message" id="error-zebra-length">Please enter valid zebra length</div>
            <label for="zebra-width">Width (mm):</label>
            <input type="number" id="zebra-width" class="error" min="0">
            <div class="error-message" id="error-zebra-width">Please enter valid zebra width</div>
            <div class="checkbox-group">
                <label><input type="checkbox" id="add-gap"> Gap</label>
                <input type="number" id="gap-size" placeholder="Gap (mm)" disabled min="0">
                <div class="error-message" id="error-gap-size">Please enter valid gap parameter</div>
            </div>
        </div>
        <div id="round-parameters" class="form-group" style="display: none;">
            <label for="round-symbol">Real Symbol Diameter (mm):</label>
            <input type="number" id="round-symbol" class="error" min="0">
            <div class="error-message" id="error-round-symbol">Please enter valid real symbol diameter</div>
            <div class="checkbox-group">
                <label><input type="checkbox" id="custom-glass-round"> Custom Glass Size</label>
                <input type="number" id="glass-size-round" placeholder="Glass Size (mm)" disabled min="0">
                <div class="error-message" id="error-glass-size-round">Please enter valid glass size</div>
            </div>
        </div>
        <div id="triangle-parameters" class="form-group" style="display: none;">
            <label for="triangle-side">Triangle Side (mm):</label>
            <input type="number" id="triangle-side" class="error" min="0">
            <div class="error-message" id="error-triangle-side">Please enter valid triangle side</div>
            <div class="checkbox-group">
                <label><input type="checkbox" id="custom-glass-triangle"> Custom Glass Size</label>
                <input type="number" id="glass-size-triangle" placeholder="Glass Size (mm)" disabled min="0">
                <div class="error-message" id="error-glass-size-triangle">Please enter valid glass size</div>
            </div>
        </div>
        <div id="lift-parameters" class="form-group" style="display: none;">
            <label for="lift-length">Length (mm):</label>
            <input type="number" id="lift-length" class="error" min="0">
            <div class="error-message" id="error-lift-length">Please enter valid lift length</div>
            <label for="lift-width">Width (mm):</label>
            <input type="number" id="lift-width" class="error" min="0">
            <div class="error-message" id="error-lift-width">Please enter valid lift width</div>
            <label for="lift-height">Height (mm):</label>
            <input type="number" id="lift-height" class="error" min="0">
            <div class="error-message" id="error-lift-height">Please enter valid lift height</div>
            <label for="lift-capacity">Lifting height (mm):</label>
            <input type="number" id="lift-capacity" class="error" min="0">
            <div class="error-message" id="error-lift-capacity">Please enter valid lift capacity</div>
        </div>
        <div class="button-group">
            <button class="green-button">Submit</button>
            <button class="blue-button">Info</button>
            <button class="red-button">Reset</button>

        </div>
    </div>
    <div class="results-container">
        <table>
            <thead>
            <tr>
                <th class="result-th">Projector ▼</th>
                <th class="result-th">Lens ▼</th>
                <th class="result-th">Illuminance (LUX)</th>
                <th class="result-th">Symbol (LUX) ▼</th>
                <th class="result-th">Price, € ▼</th>
                <th class="result-th">Symbol Size ▼</th>
                <th class="save-option">Save option</th>
            </tr>
            </thead>
            <tbody id="result-body">

            </tbody>
        </table>
    </div>

    <div class="floating-error" id="floating-error"></div>
