function Projects({ projects }) {
  return (
    <section className="projects-section" id="projects">
      <div className="projects-header">
        <h2>Featured Projects</h2>
        <p className="projects-subtitle">
          Some of the projects I've worked on while learning frontend development
          and software engineering.
        </p>
      </div>
      <div className="doodle-star projects-doodle">★</div>
      <div className="projects-grid">
        {projects.map((project) => (
          <article key={project.title} className="project-card">
            <div className="project-image">
              <div className="browser-bar">
                <span />
                <span />
                <span />
              </div>
              <div className="project-preview">
                <h4>{project.title}</h4>
                <p>Website Preview</p>
              </div>
            </div>
            <div className="project-body">
              <h3>{project.title}</h3>
              <p>{project.description}</p>
              <div className="tech-stack">
                {project.tech.map((t) => (
                  <span key={t}>{t}</span>
                ))}
              </div>
              <div className="project-buttons">
                <a href={project.link} target="_blank" rel="noreferrer" className="btn-small">
                  GitHub
                </a>
                <a href={project.link} target="_blank" rel="noreferrer" className="btn-small outline">
                  Live Demo
                </a>
              </div>
            </div>
          </article>
        ))}
      </div>
    </section>
  );
}

export default Projects;
