import './styles/globals.css';
import './styles/about.css';
import './styles/animations.css';
import './styles/certificates.css';
import './styles/contact.css';
import './styles/footer.css';
import './styles/hero.css';
import './styles/navbar.css';
import './styles/projects.css';
import './styles/skills.css';
import './styles/stickyNote.css';
import './styles/Blobs.css';
import './styles/dots.css';
import './styles/grid.css';
import Navbar from './components/Navbar.jsx';
import Hero from './components/Hero.jsx';
import About from './components/About.jsx';
import Skills from './components/Skills.jsx';
import Projects from './components/Projects.jsx';
import Certificates from './components/Certificates.jsx';
import Contact from './components/Contact.jsx';
import Footer from './components/Footer.jsx';
import PageDoodles from './components/PageDoodles.jsx';
import PaperTexture from './components/effects/PaperTexture.jsx';
import Aurora from './components/effects/Aurora.jsx';
import MouseGlow from './components/effects/MouseGlow.jsx';
import Dust from './components/effects/Dust.jsx';
import projects from './projects/projects.js';
import certificates from './projects/certificates.js';
import socials from './projects/socials.js';
import Timeline from './components/Timeline.jsx';
import './styles/timeline.css';
import './styles/responsive.css';

function App() {
  return (
    <>
      
      <PaperTexture />
      <Aurora />
      <Dust />
      <MouseGlow />

      <div className="page-shell">
        <PageDoodles />
        <Navbar />

        <main>
          <Hero />
          <div className="two-col">
            <About />
            <Skills />
          </div>
          <Timeline />
          <Projects projects={projects} />
          <Certificates certificates={certificates} />
          <Contact />
        </main>

        <Footer socials={socials} />
      </div>
    </>
  );
}

export default App;
