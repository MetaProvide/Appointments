const delay = (delayInms) => {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve(2);
    }, delayInms);
  });
};

const showCopyPubUrl = async (copyOk) => {
  const pubUrlCopiedLabel = document.getElementById("pubUrlLabel");
  pubUrlCopiedLabel.innerText = copyOk ? "Copied" : "Error";
  pubUrlCopiedLabel.style.display = "unset";
  await delay(3000);
  pubUrlCopiedLabel.style.display = "none";
};

const showCopyEmbUrl = async (copyOk) => {
  const embedUrlCopiedLabel = document.getElementById("embedUrlLabel");
  embedUrlCopiedLabel.innerText = copyOk ? "Copied" : "Error";
  embedUrlCopiedLabel.style.display = "unset";
  await delay(3000);
  embedUrlCopiedLabel.style.display = "none";
};

const copyToClipboard = async (text) => {
  if (navigator.clipboard) {
    navigator.clipboard.writeText(text).then(
      () => {
        return true;
      },
      (err) => {
        alert("copy error: " + err);
        return false;
      }
    );
  } else {
    // fallback
    let textArea = document.createElement("textarea");
    textArea.value = text;

    // Avoid scrolling to bottom
    textArea.style.top = "0";
    textArea.style.left = "0";
    textArea.style.position = "fixed";

    textArea.style.width = "2em";
    textArea.style.height = "2em";

    textArea.style.padding = 0;

    textArea.style.border = "none";
    textArea.style.outline = "none";
    textArea.style.boxShadow = "none";

    textArea.style.background = "transparent";

    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();

    let copyOK;
    try {
      copyOK = document.execCommand("copy");
    } catch (err) {
      console.error("copy error:", err);
      copyOK = false;
    }
    document.body.removeChild(textArea);
    return copyOK;
  }
};

document.getElementById("appointments-save-settings").onclick = function () {
  const name = document.getElementById("name");
  const phone = document.getElementById("phone");
  const email = document.getElementById("email");
  const prepTime = document.getElementById("prepTime");

  const savedLabel = document.getElementById("saved");

  const emailFormat =
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  const phoneFormat = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;
  var invalid = false;
  const dafeaultBorderColor = name.style.borderColor;

  savedLabel.style.display = "none";

  if (!email.value.match(emailFormat)) {
    invalid = true;
    email.style.borderColor = "red";
  } else {
    email.style.borderColor = dafeaultBorderColor;
  }

  if (!phone.value.match(phoneFormat)) {
    invalid = true;
    phone.style.borderColor = "red";
  } else {
    phone.style.borderColor = dafeaultBorderColor;
  }

  if (!invalid) {
    const payload = {
      a: "set_uci",
      d: `{\"organization\":\"${name.value}\",\"email\":\"${email.value}\",\"address\":\" \",\"phone\":\"${phone.value}\",\"confirmedRdrUrl\":\"\",\"confirmedRdrId\":false,\"confirmedRdrData\":false}`,
      p: "p0",
      prepTime: prepTime.value,
    };

    $.post(OC.generateUrl("apps/appointments/state"), payload)
      .done(async function () {
        savedLabel.style.display = "unset";
        await delay(3000);
        savedLabel.style.display = "none";
      })
      .fail(function () {
        alert("Error Saving");
      });
  }
};
document.getElementById("copyPubUrl").onclick = function () {
  const pubUrl = document.getElementById("pubUrl").href;
  const copyOk = copyToClipboard(pubUrl);
  showCopyPubUrl(copyOk);
};

document.getElementById("copyEmbUrl").onclick = function () {
  const embedUrl = document.getElementById("embedUrl").href;
  const copyOk = copyToClipboard(embedUrl);
  showCopyEmbUrl(copyOk);
};
