import heroImage from '../assets/hero-image.png';
import useParallax from "../hooks/useParallax";

const stats = [
  { icon: '📁', label: 'Projects Completed', value: '15+', color: 'purple' },
  { icon: '🏆', label: 'Certificates Earned', value: '9', color: 'yellow' },
  { icon: '💻', label: 'Year Coding', value: '5', color: 'green' },
  { icon: '💛', label: 'Hours Volunteering', value: '480', color: 'pink' },
];

function Hero() {
   useParallax();
  return (
    
    <section className="hero" id="home">
      <div className="hero-left">
        <span className="hero-greeting">hi there! 👋 i'm</span>
        <h1 className="hero-name">
          John Kenneth
          <br />
          <span className="highlight-name">Araojo</span>
        </h1>
        <p className="hero-role">
          Computer Science Graduate
          <span>•</span>
          Web Developer
          <span>•</span>
          QA Enthusiast
        </p>
        <p className="hero-text">
          I build thoughtful digital experiences with clean code, responsive layouts,
          and attention to detail.
        </p>
        <div className="hero-actions">
          <a href="#projects" className="btn btn-primary">
            View My Work →
          </a>
          <a href={`${import.meta.env.BASE_URL}resume.pdf`} className="btn btn-secondary" target="_blank" rel="noopener noreferrer">
            Download Resume
          </a>
        </div>
      </div>

      <div className="hero-right">
        <div className="hero-photo-stack">
          <div className="polaroid" data-speed="12">
            <div className="tape tape-left" />
            <div className="tape tape-right" />
            <img src={heroImage} alt="John Kenneth Araojo" className="hero-image" />
          </div>
          <div className="sticky-note" data-speed="8">
            <p>
              always learning
              <br />
              always building ♡
            </p>
          </div>
        </div>
        <div className="doodle-star hero-doodle-star1" data-speed="30">✦</div>
        <div className="doodle-star hero-doodle-star2" data-speed="25">★</div>
        <div className="hero-doodle-arrow" data-speed="15">↻</div>
      </div>

      <div className="stats-bar">
        {stats.map((stat) => (
          <div key={stat.label} className="stat-card">
            <div className={`stat-icon ${stat.color}`}>{stat.icon}</div>
            <div className="stat-info">
              <strong>{stat.value}</strong>
              <span>{stat.label}</span>
            </div>
          </div>
        ))}
      </div>
    </section>
  );
}

export default Hero;
