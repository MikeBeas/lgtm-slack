const template = `
:BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND:
:BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::BACKGROUND::FOREGROUND::FOREGROUND::FOREGROUND::FOREGROUND::BACKGROUND::FOREGROUND::FOREGROUND::FOREGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND:
:BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::FOREGROUND::FOREGROUND::BACKGROUND::FOREGROUND::FOREGROUND::BACKGROUND:
:BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::FOREGROUND::FOREGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::FOREGROUND::BACKGROUND::FOREGROUND::BACKGROUND:
:BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND:
:BACKGROUND::FOREGROUND::FOREGROUND::FOREGROUND::BACKGROUND::FOREGROUND::FOREGROUND::FOREGROUND::FOREGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND::BACKGROUND::BACKGROUND::FOREGROUND::BACKGROUND:
:BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND::BACKGROUND:
`

const lgtm = (app) => {
  app.post("/", (req, res) => {
    const { text } = req.body;
    const response = {
      response_type: "ephemeral",
      text: "This is designed to work with a Slack slash command."
    }

    if (!text) return res.send(response);

    const init = text.split(" ");
    const parts = [];
    for (const i of init) {
      if (i !== "") parts.push(i);
    }

    if (!parts[0] || !parts[1]) return res.send({
      response_type: "ephemeral",
      text: "Looks like you missed an emoji."
    })

    let type = "in_channel";
    if (parts[2] && parts[2] === "preview") type = "ephemeral";

    const fore = parts[0].replace(/:/g, "");
    const back = parts[1].replace(/:/g, "");

    res.send({
      response_type: type,
      text: template.trim().replace(/FOREGROUND/g, fore).replace(/BACKGROUND/g, back)
    })

  });
}

module.exports = lgtm;