import site from '../projects/site.js';

function Contact() {
  return (
    <section className="contact-section" id="contact">
      <div className="contact-doodle">let's chat! ✉</div>
      <div className="contact-sticky">
        <h2>Let's Work Together!</h2>
        <p>
          Whether you're looking for a frontend developer, collaborator, intern,
          or simply want to chat — I'd love to hear from you.
        </p>
        <div className="contact-buttons">
          <a href={`mailto:${site.email}`} className="btn btn-primary">
            Send Me a Message →
          </a>
        </div>
        <div className="contact-socials">
          <a href={`mailto:${site.email}`} className="contact-social-link">
            <span className="contact-social-icon">✉</span>
            {site.email}
          </a>
          <a href={site.linkedin} target="_blank" rel="noreferrer" className="contact-social-link">
            <span className="contact-social-icon">in</span>
            LinkedIn
          </a>
          <a href={site.github} target="_blank" rel="noreferrer" className="contact-social-link">
            <span className="contact-social-icon">⌥</span>
            GitHub
          </a>
        </div>
      </div>
    </section>
  );
}

export default Contact;
