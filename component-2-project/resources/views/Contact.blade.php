<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - Educational Administrative Site</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Header -->
  <header>
    <div class="container header-container">
      <div class="logo">
        <h1>EduAdministrative</h1>
      </div>
      <nav>
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/students">Students</a></li>
          <li><a href="/staff">Staff</a></li>
          <li><a href="/courses">Courses</a></li>
          <li><a href="/About">About</a></li>
          <li><a href="/Contact">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="hero contact-hero">
    <div class="hero-content">
      <h2>Contact Educational Administrative Site</h2>
      <p>We’d love to hear from you! Reach out for support, inquiries, or feedback.</p>
    </div>
  </section>

  <!-- Contact Info Section -->
  <section class="contact-info">
    <div class="container grid-3">
      <div class="info-box">
        <h3>Address</h3>
        <p>123 Hattiban, Knowledge City, Country</p>
      </div>
      <div class="info-box">
        <h3>Email</h3>
        <p>info@education.com</p>
      </div>
      <div class="info-box">
        <h3>Phone</h3>
        <p>+123 456 7890</p>
      </div>
    </div>
  </section>

  <!-- Contact Form Section -->
  <section class="contact-form-section">
    <div class="container">
      <h2>Send Us a Message</h2>
      <form class="contact-form" action="#" method="POST">
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" placeholder="Your full name" required>
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" placeholder="Your email" required>
        </div>
        <div class="form-group">
          <label for="subject">Subject</label>
          <input type="text" id="subject" name="subject" placeholder="Subject" required>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="6" placeholder="Type your message..." required></textarea>
        </div>
        <button type="submit" class="btn">Send Message
