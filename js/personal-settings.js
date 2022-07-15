import axios from '@nextcloud/axios'

window.addEventListener("DOMContentLoaded", function () {
	document.getElementById('appointments-save-settings').onclick = function () {

        var xhr = new XMLHttpRequest();

        const name = document.getElementById('name').value;
        const phone = document.getElementById('phone').value;
        const email = document.getElementById('email').value;
        
        const payload = {
            "a": "set_uci",
            "d": `{\"organization\":\"${name}\",\"email\":\"${email}\",\"address\":\"Test heaven\",\"phone\":\"${phone}\",\"confirmedRdrUrl\":\"\",\"confirmedRdrId\":false,\"confirmedRdrData\":false}`,
            "p": "p0"
        }

        // xhr.open('POST', OC.generateUrl('apps/appointments/state'), true);
        // xhr.setRequestHeader('Content-Type', 'application/json');
        // xhr.send(payload);

        
        $.post( OC.generateUrl('apps/appointments/state'),payload)
        
    }
})


