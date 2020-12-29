const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');

const dotenv = require('dotenv');
dotenv.config();

const app = express();
const port = process.env.PORT ?? 3000;

app.use(bodyParser.text());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(cors());

require('./lgtmSlack')(app);

app.listen(port, () => {
  console.log(`Server started on port ${port}`);
});