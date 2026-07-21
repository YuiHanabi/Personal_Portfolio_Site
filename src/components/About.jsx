import site from '../projects/site.js';

function About() {
  return (
    <section className="about-section" id="about">
      <div className="section-heading">
        <span className="arrow-doodle">→</span>
        <h2>About Me</h2>
      </div>
      <p className="about-bio">
        I'm a {site.title.toLowerCase()} who enjoys turning ideas into polished,
        user-friendly web experiences. My focus is on thoughtful design,
        clean structure, and continuous learning.
      </p>
      <div className="about-details">
        <div className="about-detail">
          <div className="about-detail-icon">🎓</div>
          <div>
            <strong>Education</strong>
            {site.education}
          </div>
        </div>
        <div className="about-detail">
          <div className="about-detail-icon">📍</div>
          <div>
            <strong>Location</strong>
            {site.location}
          </div>
        </div>
        <div className="about-detail">
          <div className="about-detail-icon">💡</div>
          <div>
            <strong>Interests</strong>
            {site.interests}
          </div>
        </div>
      </div>
      <div className="about-doodle doodle-star">✨</div>
    </section>
  );
}

export default About;
