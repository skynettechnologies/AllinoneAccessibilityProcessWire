setTimeout(function (){

    var iDiv = document.createElement("div");
    iDiv.id = 'licenseKeymsg';
    document.querySelector('#wrap_Inputfield_license_key .InputfieldContent').append(iDiv);

    var lk = document.getElementById("Inputfield_license_key").value;
    var server_name = window.location.hostname;
    async function licenseKey() {

        var formdata = new FormData();
        formdata.append("token", lk);
        formdata.append("SERVER_NAME", server_name);

        var requestOptions = {
            method: 'POST',
            body: formdata,
        };
        let response_v = await fetch("https://www.skynettechnologies.com/add-ons/license-api.php", requestOptions)
        return await response_v.json();
    }
    licenseKey().then(function (locale) {
        license_key_valid = locale.valid;
        if (license_key_valid == 1) {
            console.log("valid key called");
            document.getElementById("keyInvalidmsg").style.display = "none";
            document.getElementById("upgrade_message").style.display = "none";
            document.getElementById("Inputfield_aioa_icon_size").style.display = "";
            document.getElementById("wrap_Inputfield_aioa_icon_size").style.display = "";
            document.getElementById("wrap_Inputfield_aioa_icon_type").style.display = "";
            document.getElementById("Inputfield_aioa_icon_type").style.display = "";
        }
        else {
            console.log("in valid key called");
            document.getElementById("Inputfield_aioa_icon_size").style.display = "none";
            document.getElementById("wrap_Inputfield_aioa_icon_size").style.display = "none";
            document.getElementById("wrap_Inputfield_aioa_icon_type").style.display = "none";
            document.getElementById("Inputfield_aioa_icon_type").style.display = "none";
            var domain_name = window.location.hostname;

            document.getElementById("licenseKeymsg").innerHTML = '<p id="error_message" style="color: red">Key Is Invalid</p><p id="upgrade_message">Please <a href=\'https://www.skynettechnologies.com/add-ons/cart/?add-to-cart=116&variation_id=117&variation_id=117&quantity=1&utm_source="+domain_name+"&utm_medium=getgrav-extension&utm_campaign=purchase-plan\' target=\'_blank\'>Upgrade</a> to full version of All in One Accessibility Pro.</p>';
            console.log("this is final license key",lk);
            if(lk == ''){
                console.log("final called");
                document.getElementById("licenseKeymsg").innerHTML = '<p id="upgrade_message">Please <a href=\'https://www.skynettechnologies.com/add-ons/cart/?add-to-cart=116&variation_id=117&variation_id=117&quantity=1&utm_source="+domain_name+"&utm_medium=getgrav-extension&utm_campaign=purchase-plan\' target=\'_blank\'>Upgrade</a> to full version of All in One Accessibility Pro.</p>';
            }

            // if(lk != ''){
            //     console.log("print..........");
            //
            //     document.getElementById("licenseKeymsg").innerHTML = '<p id="error_message" style="color: red">Key Is Invalid</p><p id="upgrade_message">Please <a href=\'https://www.skynettechnologies.com/add-ons/cart/?add-to-cart=116&variation_id=117&variation_id=117&quantity=1&utm_source="+domain_name+"&utm_medium=getgrav-extension&utm_campaign=purchase-plan\' target=\'_blank\'>Upgrade </a>to full version of All in One Accessibility Pro.</p>';
            // }else{
            //     console.log("this is else part called");
            //     document.getElementById("licenseKeymsg").innerHTML = '<p id="error_message" style="color: red">Key Is Invalid</p> <br> <p id="upgrade_message">Please <a href=\'https://www.skynettechnologies.com/add-ons/cart/?add-to-cart=116&variation_id=117&variation_id=117&quantity=1&utm_source="+domain_name+"&utm_medium=getgrav-extension&utm_campaign=purchase-plan\' target=\'_blank\'>Upgrade </a>to full version of All in One Accessibility Pro.</p>';
            // }
        }
    })
    console.log("this is license key",lk);

    document.getElementById("Inputfield_license_key").onkeyup = function() {myFunction()};

    function myFunction() {
        let x = document.getElementById("Inputfield_license_key").value;

        console.log("this is license key",x);
        var server_name = window.location.hostname;
        async function licenseKey() {

            var formdata = new FormData();
            formdata.append("token", x);
            formdata.append("SERVER_NAME", server_name);

            var requestOptions = {
                method: 'POST',
                body: formdata,
            };

            let response_v = await fetch("https://www.skynettechnologies.com/add-ons/license-api.php", requestOptions)
            return await response_v.json();
        }
        licenseKey().then(function (locale) {
            license_key_valid = locale.valid;
            if (license_key_valid == 1) {
                console.log("valid key called");
                // document.getElementById("keyInvalidmsg").style.display = "none";
                document.getElementById("upgrade_message").style.display = "none";
                document.getElementById("Inputfield_aioa_icon_size").style.display = "";
                document.getElementById("wrap_Inputfield_aioa_icon_size").style.display = "";
                document.getElementById("wrap_Inputfield_aioa_icon_type").style.display = "";
                document.getElementById("Inputfield_aioa_icon_type").style.display = "";
                document.getElementById("error_message").style.display = "none";

            }
            else {
                console.log("in valid key called");
                document.getElementById("Inputfield_aioa_icon_size").style.display = "none";
                document.getElementById("wrap_Inputfield_aioa_icon_size").style.display = "none";
                document.getElementById("wrap_Inputfield_aioa_icon_type").style.display = "none";
                document.getElementById("Inputfield_aioa_icon_type").style.display = "none";
                var domain_name = window.location.hostname;
                document.getElementById("licenseKeymsg").innerHTML = '<p id="error_message" style="color: red">Key Is Invalid</p><p id="upgrade_message">Please <a href=\'https://www.skynettechnologies.com/add-ons/cart/?add-to-cart=116&variation_id=117&variation_id=117&quantity=1&utm_source="+domain_name+"&utm_medium=getgrav-extension&utm_campaign=purchase-plan\' target=\'_blank\'>Upgrade</a> to full version of All in One Accessibility Pro.</p>';
                console.log("this is final license key",x);
                if(x == ''){
                    console.log("final called");
                    document.getElementById("licenseKeymsg").innerHTML = '<p id="upgrade_message">Please <a href=\'https://www.skynettechnologies.com/add-ons/cart/?add-to-cart=116&variation_id=117&variation_id=117&quantity=1&utm_source="+domain_name+"&utm_medium=getgrav-extension&utm_campaign=purchase-plan\' target=\'_blank\'>Upgrade</a> to full version of All in One Accessibility Pro.</p>';
                }
                // if(lk != ''){
                //     console.log("print..........");
                //     document.getElementById("licenseKeymsg").innerHTML = '<p id="error_message" style="color: red">Key Is Invalid</p><p id="upgrade_message">Please <a href=\'https://www.skynettechnologies.com/add-ons/cart/?add-to-cart=116&variation_id=117&variation_id=117&quantity=1&utm_source="+domain_name+"&utm_medium=getgrav-extension&utm_campaign=purchase-plan\' target=\'_blank\'>Upgrade</a>to full version of All in One Accessibility Pro.</p>';
                // }
                // else{
                //     console.log("this is else part called");
                //     document.getElementById("licenseKeymsg").innerHTML = '<p id="error_message" style="color: red">Key Is Invalid</p> <br> <p id="upgrade_message">Please <a style="color: black"  href=\'https://www.skynettechnologies.com/add-ons/cart/?add-to-cart=116&variation_id=117&variation_id=117&quantity=1&utm_source="+domain_name+"&utm_medium=getgrav-extension&utm_campaign=purchase-plan\' target=\'_blank\'>Upgrade </a>to full version of All in One Accessibility Pro.</p>';
                // }
            }
        })
    }
},500)