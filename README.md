# lgtm-slack
_Does it look good to you?_

The fun bits for your very own LGTM slack app. Bring your own server.

# Setup
1. Drop this `index.php` file somewhere onto a web server running PHP and rename it if you want
2. Visit [api.slack.com/apps](https://api.slack.com/apps) and create a new app
3. Under "Add features and functionality" select "Slash Commands"
4. "Create New Command"
5. Set the command to whatever you want to use (like `/lgtm`)
6. For the request URL, enter your full URL including the trailing slash (sorry, I'm not fixing that). If you renamed the file from `index.php` you'll need to include the file name here, too. Make sure you use https if necessary.
7. Add whatever additional details you want and then hit "Save"

# Usage
In Slack, use your command plus the foreground and background emojis you want to use: `/lgtm foreground background`.

You can wrap your emoji in :colons: if you want (this will convert them to actual emoji in Slack and make it possible to use auto-complete!) or you can submit the emoji names without them. Both ways will work correctly. You're welcome.

If you want to see how a LGTM will look before you post it (how very meta), you can use "preview" at the end to see it as a private message in the channel: `/lgtm foreground background preview`.

If it looks good to you (:face_with_rolling_eyes:), you can just repost the same message without the "preview". Adding buttons to post the preview (like `/giphy` has) would make this much more complicated and I'm not going to bother with it. Just press the slash key and use the history function in Slack to get back to your last slash command quickly. You're an adult and typing's not that hard.

# Credit Where Due
This is based on the very excellent [LGTM generator](https://1000ch.github.io/lgtm-emoticon/) by Shogo Sensui. Find it here: https://github.com/1000ch/lgtm-emoticon.
