import site from '../projects/site.js';

function Footer({ socials }) {
  return (
    <footer className="footer">
      <div className="footer-left">
        <h3>{site.name}</h3>
        <p>{site.title} • Web Developer</p>
      </div>
      <div className="footer-right">
        {socials.map((social) => (
          <a key={social.label} href={social.href} target="_blank" rel="noreferrer">
            {social.label}
          </a>
        ))}
      </div>
    </footer>
  );
}

export default Footer;
