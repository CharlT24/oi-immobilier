<?php
/* Template Name: Contactez-Nous */
get_header(); ?>

<style>
section.contact {
  max-width: 800px;
  margin: auto;
  padding: 4rem 1.5rem;
  font-family: -apple-system, BlinkMacSystemFont, sans-serif;
  text-align: center;
}
.contact h1 {
  font-size: 2.5rem;
  font-weight: 700;
  margin-bottom: 1rem;
}
.contact p {
  font-size: 1.2rem;
  color: #555;
  margin-bottom: 2rem;
}
.contact form {
  display: grid;
  gap: 1rem;
  margin-bottom: 2rem;
}
.contact input, .contact textarea {
  width: 100%;
  padding: 1rem;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-size: 1rem;
}
.contact button {
  background-color: #f97316;
  color: white;
  padding: 1rem 2rem;
  border: none;
  border-radius: 8px;
  font-size: 1.1rem;
  cursor: pointer;
  transition: background-color 0.3s;
}
.contact button:hover {
  background-color: #ea6c0f;
}
.contact .social-links {
  margin-top: 2rem;
}
.contact .social-links a {
  margin: 0 1rem;
  font-size: 1.5rem;
  color: #555;
  transition: color 0.3s;
}
.contact .social-links a:hover {
  color: #f97316;
}
</style>

<section class="contact">
  <h1>Contactez-Nous</h1>
  <p>Vous avez des questions ou souhaitez en savoir plus sur nos services ? Remplissez le formulaire ci-dessous et notre équipe vous répondra dans les plus brefs délais.</p>

  <form action="#" method="post">
    <input type="text" name="nom" placeholder="Votre nom" required>
    <input type="email" name="email" placeholder="Votre email" required>
    <textarea name="message" placeholder="Votre message..." required></textarea>
    <button type="submit">Envoyer</button>
  </form>

  <div class="social-links">
    <p>Suivez-nous sur nos réseaux sociaux :</p>
    <a href="#" target="_blank" id="facebook-link">Facebook</a>
    <a href="#" target="_blank" id="instagram-link">Instagram</a>
  </div>
</section>

<?php get_footer(); ?>
