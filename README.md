# lgtm-slack
_Does it look good to you?_

The fun bits for your very own LGTM slack app. Bring your own server. PHP and NodeJS versions are provided.

![](https://raw.githubusercontent.com/MikeBeas/lgtm-slack/master/screenshot.png)

# PHP Setup
1. Drop this `index.php` file somewhere onto a web server running PHP and rename it if you want
2. Visit [api.slack.com/apps](https://api.slack.com/apps) and create a new app
3. Under "Add features and functionality" select "Slash Commands"
4. "Create New Command"
5. Set the command to whatever you want to use to trigger the functionality in Slack (like `/lgtm`)
6. For the request URL, enter your full URL including the trailing slash (sorry, I'm not fixing that). If you renamed the file from `index.php` you'll need to include the file name here, too. Make sure you use https if necessary.
7. Add whatever additional details you want and then hit "Save"

# Node Setup
1. To run locally, cd into the `node` folder
2. Optionally, set up a `PORT` environment variable to change what port the app runs on; default is 3000
3. run `npm i` to install the dependencies
3. Run `npm run dev` to run the app locally in development mode; this will automatically restart the app when you change any of its files
4. You can customize the endpoint for the app by changing the `/` on line 12 of `lgtmSlack.js` to whatever route you want, such as `/lgtm-slack`; by default you only need to post to the root of your domain (such as `localhost:3000/`)
5. To test, you can use an app like Postman to make a request to your API; to match the way Slack will send a message to your API, set your method to `POST`, your body type to `x-www-form-urlencoded` and include one item in your body with the key `value` and the body in the format `firstEmoji secondEmoji preview` with `preview` being optional to change from in-channel responses to ephemeral
6. To deploy, use your favorite Node app deployment workflow (such as Heroku, AWS Elastic Beanstalk, etc.), using `npm run start` as your startup script (your deployment solution might default to this since it's pretty common); sorry, I won't be providing any tutorials for this because there are a ton already out there and they vary depending on where you're deploying

# Slack App Setup (for PHP and Node)
1. Visit [api.slack.com/apps](https://api.slack.com/apps) and create a new app
2. Under "Add features and functionality" select "Slash Commands"
3. "Create New Command"
4. Set the command to whatever you want to use (like `/lgtm`)
5. For the request URL, enter the URL to your endpoint (including the trailing slash for the PHP version; sorry, I'm not fixing that). If you used the PHP version and renamed the file from `index.php` you'll need to include the file name here, too. Make sure you use https if necessary.
6. Add whatever additional details you want and then hit "Save"

# Usage
In Slack, use your command plus the foreground and background emojis you want to use: `/lgtm foreground background`.

You can wrap your emoji in :colons: if you want (this will convert them to actual emoji in Slack and make it possible to use auto-complete!) or you can submit the emoji names without them. Both ways will work correctly. You're welcome.

If you want to see how a LGTM will look before you post it (how very meta), you can use "preview" at the end to see it as a private message in the channel: `/lgtm foreground background preview`.

If it looks good to you (:face_with_rolling_eyes:), you can just repost the same message without the "preview". Adding buttons to post the preview (like `/giphy` has) would make this much more complicated and I'm not going to bother with it. Just press the slash key and use the history function in Slack to get back to your last slash command quickly. You're an adult and typing's not that hard.

# Credit Where Due
This is based on the very excellent [LGTM generator](https://1000ch.github.io/lgtm-emoticon/) by Shogo Sensui. Find it here: https://github.com/1000ch/lgtm-emoticon.
