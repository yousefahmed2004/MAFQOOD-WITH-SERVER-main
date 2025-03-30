const express = require('express');
const path = require('path');
const bodyParser = require('body-parser');
const mysql = require('mysql');
const cors = require('cors');

const phpExpress = require('php-express')({
  binPath: 'C:\\laragon\\bin\\php\\php-8.1.10-Win32-vs16-x64\\php.exe'
});

const app = express();
const port = 3000;

app.use(cors());
app.use(express.json());
app.use(bodyParser.urlencoded({ extended: true }));

app.use('/public', express.static(path.join(__dirname, 'public')));

app.set('views', path.join(__dirname));
app.engine('php', phpExpress.engine);
app.set('view engine', 'php');

const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'children_db'
});

db.connect((err) => {
  if (err) {
    console.error('Error connecting to MySQL:', err);
    return;
  }
  console.log('Connected to MySQL');
});

app.get('/', (req, res) => {
  res.render('index.php');
});

app.get('/search', (req, res) => {
  res.render('search-image.php');
});

app.get('/missing', (req, res) => {
  res.render('missing-person.php');
});

app.get('/found', (req, res) => {
  res.render('found-person.php');
});

app.get('/login', (req, res) => {
  res.render('login.php');
});

app.get('/signup', (req, res) => {
  res.render('signup.php');
});

app.post('/signup', (req, res) => {
  const { fname, lname, email, pass, passConfirm } = req.body;
  const errorFields = [];

  if (!fname) errorFields.push('fname');
  if (!lname) errorFields.push('lname');
  if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) errorFields.push('email');
  if (!pass || pass.length <= 5) errorFields.push('pass');
  if (pass !== passConfirm) errorFields.push('passConfirm');

  if (errorFields.length > 0) {
    res.render('signup.php', { errorFields });
    return;
  }

  const hashedPass = require('crypto').createHash('sha1').update(pass).digest('hex');
  const sqlCheckExist = 'SELECT email FROM users WHERE email = ?';

  db.query(sqlCheckExist, [email], (err, result) => {
    if (err) {
      console.error('Error checking existing user:', err);
      res.status(500).send('Server error');
      return;
    }

    if (result.length > 0) {
      errorFields.push('exist');
      res.render('signup.php', { errorFields });
      return;
    }

    const sqlInsert = 'INSERT INTO users (fname, lname, email, pass, is_admin) VALUES (?, ?, ?, ?, 0)';
    db.query(sqlInsert, [fname, lname, email, hashedPass], (err, result) => {
      if (err) {
        console.error('Error inserting data:', err);
        res.status(500).send('Server error');
        return;
      }
      res.redirect('/login');
    });
  });
});

app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
