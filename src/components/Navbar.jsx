import { useEffect, useState } from 'react';
import site from '../projects/site.js';

const navItems = [
  { href: '#about', label: 'About' },
  { href: '#skills', label: 'Skills' },
  { href: '#timeline', label: 'Timeline' },
  { href: '#projects', label: 'Projects' },
  { href: '#certificates', label: 'Certificates' },
];

function Navbar() {
  const [open, setOpen] = useState(false);

  const closeMenu = () => setOpen(false);

  useEffect(() => {
    document.body.style.overflow = open ? 'hidden' : '';
    return () => {
      document.body.style.overflow = '';
    };
  }, [open]);

  return (
    <header className="topbar">
      <a href="#home" className="brand" onClick={closeMenu}>
        <div className="brand-mark">A</div>
        <span>{site.shortName} Portfolio</span>
      </a>

      <button
        type="button"
        className="nav-toggle"
        aria-expanded={open}
        aria-controls="site-nav"
        aria-label={open ? 'Close menu' : 'Open menu'}
        onClick={() => setOpen((value) => !value)}
      >
        <span />
        <span />
        <span />
      </button>

      <nav id="site-nav" className={`nav-links ${open ? 'is-open' : ''}`}>
        {navItems.map((item) => (
          <a key={item.href} href={item.href} onClick={closeMenu}>
            {item.label}
          </a>
        ))}
        <a href="#contact" className="nav-cta" onClick={closeMenu}>
          Let's Talk
        </a>
      </nav>
    </header>
  );
}

export default Navbar;
