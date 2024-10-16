define(['views/fields/varchar'], Varchar => {

    return class extends Varchar{

        amount = this.model.get('grandTotalAmount');
        currency = this.model.get('grandTotalAmountCurrency');

        init() {

            super.init();

            if (this.model.isNew() && this.amount) {

                const asWords = this.amountToWords(this.amount, this.currency);

                this.model.set(this.name, asWords);
            }

        }

        amountToWords(amount, currency) {

            currency = this.model.get('grandTotalAmountCurrency');

            const intRegex = /^\d+$/;
            const floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;

            if (!amount) {
                this.uiError('enterAmount');
                return;
            } 
            
            if (!intRegex.test(amount) && !floatRegex.test(amount)) {
                this.uiError('theAmountMustBeNumeric');
                return;
            }
            
            if (this.roundFloat(parseFloat(amount), 2) >= 1000000000000.0) {
                this.uiError('theAmountMustNotExceedOneTrillion');
                return;
            }

            //////////////////////////////////////////////

            const number = this.roundFloat(parseFloat(amount), 2);
            let decimalWords = "";
            const desetine = String(amount).split(".")[1]
                ? parseInt((String(amount).split(".")[1] + "0000").substring(0, 2), 10)
                : 0;
            const value = Math.floor(number, true);
            const value_str = value + "";
            const cods = {
                "CZK": [
                  "korun českých",
                  "koruna česká",
                  "koruny české",
                  "haléřů",
                  "haléř",
                  "haléře",
                ],
                "EUR": ["euro", "euro", "eura", "centů", "cent", "centy"],
                "USD": [
                  "amerických dolarů",
                  "americký dolar",
                  "americké dolary",
                  "centů",
                  "cent",
                  "centy",
                ],
                "GBP": [
                  "britských liber",
                  "britská libra",
                  "britské libry",
                  "pencí",
                  "pence",
                  "pence",
                ],
            };
            let result = "";
            var codestr = cods[currency];

            var cstring = "";

            if (value < 0) {
                result = "";
            } else if (value == 0 && parseFloat(desetine) != 0) {
                result = "";
            } else if (value < 100) {
                cstring = codestr[0];
            if (value == 1) {
            cstring = codestr[1];
            } else if (value > 1 && value <= 4) {
            cstring = codestr[2];
            }
            result =
                this.jednotkyAdesitky(
                value_str.substring(value_str.length - 2, value_str.length),
                ), +
            " " +
            cstring;
            if (value == 1) {

                    if (currency == "CZK" || currency == "GBP") {
                        result = "jedna" + " " + cstring;
                    } else if (currency == "EUR") {
                        result = "jedno" + " " + cstring;
                    } else if (currency == "USD" || currency == "CHF") {
                        result = "jeden" + " " + cstring;
                    }

                } else if (value == 2 ) {

                    if (currency == "CZK" || currency == "EUR" || currency == "GBP") {
                        result = "dvě›" + " " + cstring;
                    } else if (currency == "USD" || currency == "CHF") {
                        result = "dva" + " " + cstring;
                    }

                }
            } else if (value < 1000) {
                result =
                    this.stovky_fn(
                    value_str.substring(value_str.length - 3, value_str.length),
                    ) +
                " " +
                codestr[0];
            } else if (value < 1000000) {
                result =
                    this.tisice_fn(
                    value_str.substring(value_str.length - 6, value_str.length),
                    ) +
                " " +
                codestr[0];
            } else if (value < 1000000000) {
                result =
                    miliony_fn(
                    value_str.substring(value_str.length - 9, value_str.length),
                    ) +
                " " +
                codestr[0];
            } else if (value < 1000000000000) {
                result =
                    miliardy_fn(
                    value_str.substring(value_str.length - 12, value_str.length),
                    ) +
                " " +
                codestr[0];
            } else {
                result = "";
            }
            if (desetine != 0) {
                decimalWords = 'a ' + this.jednotkyAdesitky(desetine, true);
                var cents = codestr[3];
                if (desetine == 1) {
                cents = codestr[4];
                } else if (desetine > 1 && desetine <= 4) {
                cents = codestr[5];
                }
                result = result + " " + decimalWords + " " + cents;
            }

            console.log("Částka: " + result);

            return result;

            

        }

        jednotkyAdesitky(value, men) {

            let value_str = value + "";

            let jednotky = [
                "nula",
                "jedna",
                "dva",
                "tři",
                "čtyři",
                "pět",
                "šest",
                "sedm",
                "osm",
                "devět",
                "deset",
                "jedenáct",
                "dvanáct",
                "třináct",
                "čtrnáct",
                "patnáct",
                "šestnáct",
                "sedmnáct",
                "osmnáct",
                "devatenáct",
              ];
              
              const desitky = [
                "nula",
                "deset",
                "dvacet",
                "třicet",
                "čtyřicet",
                "padesát",
                "šedesát",
                "sedmdesát",
                "osmdesát",
                "devadesát",
              ];

            if (men) {
                jednotky[1] = "jeden";
            }
            
            if (value == 0) {
              return jednotky[parseInt(value, 10)];
            }
            if (value < 20) {
              return jednotky[parseInt(value, 10)];
            }
            let value2 = value_str.substring(value_str.length - 2, 1);
            let value1 = value_str.substring(value_str.length - 1, value_str.length);
            if (value1 == 0) {
              return desitky[parseInt(value2, 10)];
            }
            return desitky[parseInt(value2, 10)] + " " + jednotky[parseInt(value1, 10)];
        }

        stovky_fn(value) {
            var value_str = value + "";
            var str = "";
             let jednotk = "jedno sto";
             let stovky = [
                "nula",
                "sto",
                "dvě stě",
                "tři sta",
                "čtyři sta",
                "pět set",
                "šest set",
                "sedm set",
                "osm set",
                "devět set",
              ];

            if (value < 100) {
              return this.jednotkyAdesitky(
                value_str.substring(value_str.length - 2, value_str.length),
                false,
              );
            }
            let value3 = value_str.substring(value_str.length - 3, 1);
            let value2 = value_str.substring(value_str.length - 2, value_str.length);
            if (value3 == 1) {
              str = jednotk;
            } else {
              str = stovky[parseInt(value3, 10)];
            }
            if (value2 != 0) str = str + " " + this.jednotkyAdesitky(value2, false);
            return str;
          }


          tisice_fn(value) {
            var value_str = value + "";
            var str = "";
              let jednotk = "jeden";
              let tisice = ["nula", "tisíc", "tisíce", "tisíc"];

            if (value < 1000) {
              return this.stovky_fn(
                value_str.substring(value_str.length - 3, value_str.length),
              );
            }
            if (value < 2000) {
              str = jednotk + " " + tisice[1];
            } else if (value < 5000) {
              str = this.stovky_fn(value_str.substring(0, value_str.length - 3));
              str = str + " " + tisice[2];
            } else {
              str = this.stovky_fn(value_str.substring(0, value_str.length - 3));
              str = str + " " + tisice[3];
            }
            if (value_str.substring(value_str.length - 3, value_str.length) != 0) {
              str =
                str +
                " " +
                this.stovky_fn(value_str.substring(value_str.length - 3, value_str.length));
            }
            return str;
          }

          miliony_fn(value) {
            var value_str = value + "";
            var str = "";
              jednotk = "jeden";
              let miliony = ["nula", "milion", "miliony", "milionů"];

            if (value < 1000000) {
              return this.tisice_fn(
                value_str.substring(value_str.length - 6, value_str.length),
              );
            }
            if (value < 2000000) {
              str = jednotk + " " + miliony[1];
            } else if (value < 5000000) {
              str = this.stovky_fn(value_str.substring(0, value_str.length - 6));
              str = str + " " + miliony[2];
            } else {
              str = this.stovky_fn(value_str.substring(0, value_str.length - 6));
              str = str + " " + miliony[3];
            }
            if (value_str.substring(value_str.length - 6, value_str.length) != 0) {
              str =
                str +
                " " +
                this.tisice_fn(value_str.substring(value_str.length - 6, value_str.length));
            }
            return str;
          }

          miliardy_fn(value) {
            var value_str = value + "";
            var str = "";
              let jednotk = "jedna";
              let miliarda = ["nula", "miliarda", "miliardy", "miliard"];

            if (value < 1000000000) {
              return this.miliony_fn(
                value_str.substring(value_str.length - 9, value_str.length),
              );
            }
            if (value < 2000000000) {
              str = jednotk + " " + miliarda[1];
            } else if (value == 2000000000) {
              str = "dvÄ›" + " " + miliarda[2];
            } else if (value < 5000000000) {
              str = this.stovky_fn(value_str.substring(0, value_str.length - 9));
              str = str + " " + miliarda[2];
            } else {
              str = this.tisice_fn(value_str.substring(0, value_str.length - 9));
              str = str + " " + miliarda[3];
            }
            if (value_str.substring(value_str.length - 9, value_str.length) != 0) {
              str =
                str +
                " " +
                this.miliony_fn(value_str.substring(value_str.length - 9, value_str.length));
            }
            return str;
          }


        roundFloat(x, n) {

            if (!parseInt(n, 10)) n = 0;

            if (!parseFloat(x)) return false;

            return Math.round(x * Math.pow(10, n)) / Math.pow(10, n);

        }

        uiError(message) {

            Espo.Ui.error(this.translate(message, 'messages'), true);
        
        }
    
    };

});
