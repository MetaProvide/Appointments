window.addEventListener("DOMContentLoaded", function () {
	document.getElementById('appointments-save-settings').onclick = function () {

        const name = document.getElementById('name')
        const phone = document.getElementById('phone')
        const email = document.getElementById('email')

        const savedlabel = document.getElementById('saved')

        const emailFormat =  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
        const phoneFormat = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g
        var invalid = false
        const dafeaultBorderColor = name.style.borderColor

        savedlabel.style.display = "none"

        if(!email.value.match(emailFormat)) {
            invalid = true;
            email.style.borderColor = "red"
        } else{            
            email.style.borderColor = dafeaultBorderColor
        }

        if(!phone.value.match(phoneFormat)) {
            invalid = true;
            phone.style.borderColor = "red"
        } else{            
            phone.style.borderColor = dafeaultBorderColor
        }

        if(!invalid){
            const payload = {
                "a": "set_uci",
                "d": `{\"organization\":\"${name.value}\",\"email\":\"${email.value}\",\"address\":\"Test heaven\",\"phone\":\"${phone.value}\",\"confirmedRdrUrl\":\"\",\"confirmedRdrId\":false,\"confirmedRdrData\":false}`,
                "p": "p0"
            }

            $.post( OC.generateUrl('apps/appointments/state'),payload)
            .done(function(){
                savedlabel.style.display = "unset"
            })
            .fail(function() {
                alert( "Error Saving" )
            })
        }
        
    }
})


