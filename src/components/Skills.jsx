import site from '../projects/site.js';

const skillIcons = [
  { name: 'HTML', icon: '🌐' },
  { name: 'CSS', icon: '🎨' },
  { name: 'JavaScript', icon: '⚡' },
  { name: 'React', icon: '⚛️' },
  { name: 'Node.js', icon: '🟢' },
  { name: 'Figma', icon: '🎯' },
  { name: 'Git', icon: '🔀' },
  { name: 'Vite', icon: '⚡' },
];

function Skills() {
  return (
    <section className="skills-section" id="skills">
      <div className="section-heading">
        <span className="arrow-doodle">→</span>
        <h2>Skills & Technologies</h2>
      </div>
      <div className="skills-grid">
        {skillIcons.map((skill) => (
          <div key={skill.name} className="skill-tile wiggle-hover">
            <span className="skill-tile-icon">{skill.icon}</span>
            <span>{skill.name}</span>
          </div>
        ))}
      </div>
      <div className="skills-note">
        <p>Currently learning: {site.learning}</p>
        <p className="status">Status: {site.status}</p>
      </div>
    </section>
  );
}

export default Skills;
